<?php

error_reporting(E_ALL);
$PHP_SELF = $_SERVER['PHP_SELF'];

if (isset($_POST['save'])){
	$mime_type = 'application/octetstream'; // force download
	header('Content-Type: '.$mime_type);
	header('Expires: '.gmdate('D, d M Y H:i:s').' GMT');
	header('Content-Disposition: attachment; filename="rttl.txt"');
	header('Pragma: no-cache');
	echo $_POST['rttl'];
	exit();
}
$file=(isset($_FILES['mid_upload'])&&$_FILES['mid_upload']['tmp_name']!='')?$_FILES['mid_upload']['tmp_name']:'';
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Midi2Rttl</title>
<style>
body {font-family:Verdana;font-size:11px;margin:5px;}
input {font-family:Verdana;font-size:11px}
</style>
</head>
<body>

<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" onsubmit="if (this.mid_upload.value==''){return true;alert('Please choose a mid-file to upload!');return false}">
<input type="hidden" name="MAX_FILE_SIZE" value="1048576"><!-- 1 MB -->
MIDI file (*.mid) to upload: <input type="file" name="mid_upload"> <input type="submit" value=" send ">
</form>
<br>
Notice: The MIDI to RTTL conversion only works for simple Midi files of type 0. Here some sample files:<br>
<ul>
<li><a href="sample_files/beethoven1.mid">beethoven1.mid</a>
<li><a href="sample_files/beethoven2.mid">beethoven2.mid</a>
<li><a href="sample_files/peter_wolf.mid">peter_wolf.mid</a>
<li><a href="sample_files/suite1.mid">suite1.mid</a>
<li><a href="sample_files/flute.mid">flute.mid</a>
</ul>
<?php

if ($file!=''){

	/****************************************************************************
	MIDI CLASS CODE
	****************************************************************************/
	require('./classes/midi_rttl.class.php');
	
	$fn = $_FILES['mid_upload']['name'];
	$bn = strtok($fn, '.');
	
	$midi = new MidiRttl();
	
	// TEST
	$midi->defaultDur = 8;
	$midi->defaultScale = 7;

	$midi->importMid($file);
?>
<hr>
RTTL converted from: <?=$fn?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<textarea name="rttl" style="width:90%" rows="4"><?=$midi->getRttl($bn)?></textarea><br>
<input type="submit" name="save" value="save">
</form>
<?php
}
?>
</body>
</html>