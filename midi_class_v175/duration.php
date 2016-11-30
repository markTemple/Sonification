<?php

error_reporting(E_ALL);
$PHP_SELF = $_SERVER['PHP_SELF'];
$file=(isset($_FILES['mid_upload'])&&$_FILES['mid_upload']['tmp_name']!='')?$_FILES['mid_upload']['tmp_name']:'';
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Duration</title>
<style>
body {font-family:arial;font-size:11px;margin:5px;}
input {font-family:arial;font-size:11px}
</style>
</head>
<body>

<form enctype="multipart/form-data" action="<?=$PHP_SELF?>" method="post" onsubmit="if (this.mid_upload.value==''){alert('Please choose a mid-file to upload!');return false}">
<input type="hidden" name="MAX_FILE_SIZE" value="1048576"><!-- 1 MB -->
MIDI file (*.mid) to upload: <input type="file" name="mid_upload">
<br><br>
<input type="submit" value=" send ">
</form>
<?php
if ($file!=''){
	/****************************************************************************
	MIDI CLASS CODE
	****************************************************************************/
	require('./classes/midi_duration.class.php');

	$midi = new MidiDuration();
	$midi->importMid($file);
 	echo 'Duration [sec]: '.$midi->getDuration();
	
#	$midi = new Midi();
#	$midi->importMid($file);
#	
#	$maxTime=0;
#	foreach ($midi->tracks as $track){
#		$msgStr = $track[count($track)-1];
#		list($time)=explode(" ", $msgStr);
#		$maxTime=max($maxTime,$time);
#	}
#	$duration=$maxTime * $midi->getTempo() / $midi->getTimebase() / 1000000;
#	echo "Duration [sec]: $duration"; // ergibt 69.0623480625 sec für bossa.mid
}
?>
</body>
</html>