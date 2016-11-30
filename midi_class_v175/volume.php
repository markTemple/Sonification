<?php

error_reporting(E_ALL);
$PHP_SELF = $_SERVER['PHP_SELF'];
$file=(isset($_FILES['mid_upload'])&&$_FILES['mid_upload']['tmp_name']!='')?$_FILES['mid_upload']['tmp_name']:'';
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Volume</title>
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

if ($file!=''){
	/****************************************************************************
	MIDI CLASS CODE
	****************************************************************************/
	require('./classes/midi_volume.class.php');
	
	$midi = new MidiVolume();
	$midi->importMid($file);
	
	// SHOW OLD VOLUMES
	echo '<b>Volumes before:</b><br>';	
	$volumes = $midi->getVolumes();
	echo '<table><tr><td>Channel&nbsp;&nbsp;</td><td>Volume</td></tr>';
	foreach ($volumes as $chan=>$vol)
		echo '<tr><td>'.$chan.'</td><td>'.$vol.'</td></tr>';
	echo '</table><br><br>';

	$midi->setChannelVolume(1, 30); // CHANGES VOLUME OF CHANNEL 1
	//$midi->setGlobalVolume(80);     // CHANGES VOLUME OF ALL CHANNELS
	
	// SHOW NEW VOLUMES
	echo '<b>Volumes after conversion:</b><br>';	
	$volumes = $midi->getVolumes();
	echo '<table><tr><td>Channel&nbsp;&nbsp;</td><td>Volume</td></tr>';
	foreach ($volumes as $chan=>$vol)
		echo '<tr><td>'.$chan.'</td><td>'.$vol.'</td></tr>';
	echo '</table>';
	
	$save_dir = 'tmp/';
	srand((double)microtime()*1000000);
	$file = $save_dir.rand().'.mid';

	$midi->saveMidFile($file);
	//$midi->playMidFile($file,1,1,0);
?>
	<br><br><input type="button" name="download" value="Save converted SMF (*.mid)" onClick="self.location.href='download.php?f=<?php echo urlencode($file)?>'">
<?php
}
?>
</body>
</html>