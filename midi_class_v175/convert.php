<?php

error_reporting(E_ALL);
$PHP_SELF = $_SERVER['PHP_SELF'];
$file=(isset($_FILES['mid_upload'])&&$_FILES['mid_upload']['tmp_name']!='')?$_FILES['mid_upload']['tmp_name']:'';
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>CONVERSION</title>
<style>
body {font-family:arial;font-size:11px;margin:5px;}
input {font-family:arial;font-size:11px}
td {font-family:arial;font-size:11px}
</style>
</head>
<body>

<form enctype="multipart/form-data" action="<?=$PHP_SELF?>" method="post" onsubmit="if (this.mid_upload.value==''){alert('Please choose a mid-file to upload!');return false}">
<input type="hidden" name="MAX_FILE_SIZE" value="1048576"><!-- 1 MB -->
MIDI file (*.mid) to upload: <input type="file" name="mid_upload">
<br>
<input type="submit" value=" send ">
</form>
<?php

// TEST:
// $midi = new MidiConversion();
// $midi->importMid($file);
// $midi->convertToType0();
// $midi->downloadMidFile('converted.mid');
// exit();

if ($file!=''){
	/****************************************************************************
	MIDI CLASS CODE
	****************************************************************************/
	require('./classes/midi_conversion.class.php');
	
	$midi = new MidiConversion();
	$midi->importMid($file);
	
	// SHOW OLD TYPE
	echo 'Old Midi-Type: '.$midi->type."<br>\n";	
	
	if ($midi->type==0) die('MIDI Type of file is already 0, nothing to do!');
	
	$midi->convertToType0();

	// SHOW NEW TYPE
	echo 'New Midi-Type: '.$midi->type."<br>\n"; //midi_new
	
	$save_dir = 'tmp/';
	srand((double)microtime()*1000000);
	$file = $save_dir.rand().'.mid';
	
	$midi->saveMidFile($file);
	$midi->playMidFile($file,1,1,0);
	
?>
	<br><br><input type="button" name="download" value="Save converted SMF (*.mid)" onClick="self.location.href='download.php?f=<?php echo urlencode($file)?>'">
<?php
}
?>
</body>
</html>