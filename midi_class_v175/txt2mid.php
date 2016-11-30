<?php

//added my mt
//$_POST["txt"] = unserialize( base64_decode($_POST["txt"]));


error_reporting(E_ALL);
$PHP_SELF = $_SERVER['PHP_SELF'];
$plug = isset($_POST['plug']) ? $_POST['plug'] : 'qt';
if (isset($_POST['txt'])){
	$txt = $_POST['txt'];
	if (get_magic_quotes_gpc()==1) $txt = stripslashes($txt);
}else $txt = 'track deleted by mt';
?>


<html>
<head>
</head>
<body>

<form action="<?=$PHP_SELF?>" method="post">
<textarea name="txt" cols=60 rows=30><?php echo $txt?></textarea>
<br>
<input type="radio" name="plug" value="bk"<?php echo $plug=='bk'?' checked':''?>>Beatnik
<input type="radio" name="plug" value="qt"<?php echo $plug=='qt'?' checked':''?>>QuickTime
<input type="radio" name="plug" value="wm"<?php echo $plug=='wm'?' checked':''?>>Windows Media
<input type="radio" name="plug" value=""<?php echo $plug==''?' checked':''?>>other (default Player)<br><br>
<input type="submit" value=" send ">
</form>
<br>
<?php
if (isset($_POST['txt'])){
	$save_dir = 'tmp/';
	srand((double)microtime()*1000000);
	$file = $save_dir.rand().'.mid';

	/****************************************************************************
	MIDI CLASS CODE
	****************************************************************************/
	require('./classes/midi.class.php');

	$midi = new Midi();
	$midi->importTxt($txt);
	$midi->saveMidFile($file);
	$midi->playMidFile($file,1,1,0,$plug);
?>
	<br><br><input type="button" name="download" value="Save as SMF (*.mid)" onClick="self.location.href='download.php?f=<?php //echo urlencode($file)?>'">
<?php
}
?>
</body>
</html>