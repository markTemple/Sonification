<?php

error_reporting(E_ALL);
$PHP_SELF = $_SERVER['PHP_SELF'];
srand((double)microtime()*1000000);
$save_dir = 'tmp/';

if (isset($_FILES['mid_upload'])){
	$file = $save_dir.rand().'.mid';
	$tmpFile=$_FILES['mid_upload']['tmp_name'];
	copy($tmpFile,$file) or die('problems uploading file');
	@chmod($file,0666);
}elseif (isset($_POST['file'])) $file=$_POST['file'];
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Manipulate MIDI file</title>
<style>
body {font-family:arial;font-size:11px;margin:5px;}
input {font-family:arial;font-size:11px}
select {font-family:arial;font-size:11px}
option {font-family:arial;font-size:11px}
</style>
</head>
<body>
<form enctype="multipart/form-data" action="<?=$PHP_SELF?>" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="1048576"><!-- 1 MB -->
MIDI file (*.mid) to upload: <input type="file" name="mid_upload">
<input type="submit" value=" send ">
</form>
<hr>
<?php
if (isset($file)){
	$plug = isset($_POST['plug'])?$_POST['plug']:'qt';
	
	/****************************************************************************
	MIDI CLASS CODE
	****************************************************************************/
	require('./classes/midi.class.php');

	$midi = new Midi();
	$midi->importMid($file);

	$tc = $midi->getTrackCount();
?>
<form action="manipulate.php" method="POST">
<input type="hidden" name="file" value="<?php echo isset($file)?$file:''?>">
<input type="radio" name="plug" value="bk"<?php echo $plug=='bk'?' checked':''?>>Beatnik
<input type="radio" name="plug" value="qt"<?php echo $plug=='qt'?' checked':''?>>QuickTime
<input type="radio" name="plug" value="wm"<?php echo $plug=='wm'?' checked':''?>>Windows Media
<input type="radio" name="plug" value=""<?php echo $plug==''?' checked':''?>>other (default Player)
<br><br>
<input type="checkbox" name="up"<?php echo isset($_POST['up'])?' checked':''?>>transpose up (1 octave)
<input type="checkbox" name="down"<?php echo isset($_POST['down'])?' checked':''?>>transpose down (1 octave)
<br><br>
<input type="checkbox" name="double"<?php echo isset($_POST['double'])?' checked':''?>>double tempo
<input type="checkbox" name="half"<?php echo isset($_POST['half'])?' checked':''?>>half tempo
<br><br>
<input type="checkbox" name="delete"<?php echo isset($_POST['delete'])?' checked':''?>>delete track
<select name="delTrackNum"><?php for ($i=0;$i<$tc;$i++) echo "<option value=\"$i\"".(isset($_POST['delTrackNum'])&&$i==$_POST['delTrackNum']?' selected':'').">$i</option>\n";?></select>
<input type="checkbox" name="solo"<?php echo isset($_POST['solo'])?' checked':''?>>solo track
<select name="soloTrackNum"><?php for ($i=0;$i<$tc;$i++) echo "<option value=\"$i\"".(isset($_POST['soloTrackNum'])&&$i==$_POST['soloTrackNum']?' selected':'').">$i</option>\n";?></select>
<br><br>
<input type="checkbox" name="insert"<?php echo isset($_POST['insert'])?' checked':''?>>insert MIDI messages (3 handclaps at start)
<br><br>
<input type="checkbox" name="show"<?php echo isset($_POST['show'])?' checked':''?>>show MIDI result as Text
<br><br>
<input type="submit" value=" PLAY! ">
</form>
<?php
	if (isset($_FILES['mid_upload']))
		$midi->playMidFile($file,1,1,0,$plug);
	else{
		$new = $save_dir.rand().'.mid';

		if (isset($_POST['up']))          $midi->transpose(12);
		if (isset($_POST['down']))        $midi->transpose(-12);
		if (isset($_POST['double'])) 			$midi->setTempo($midi->getTempo()/2);
		if (isset($_POST['half'])) 				$midi->setTempo($midi->getTempo()*2);
		if (isset($_POST['solo']))        $midi->soloTrack($_POST['soloTrackNum']);
		if (isset($_POST['delete']))      $midi->deleteTrack($_POST['delTrackNum']);
		if (isset($_POST['insert'])){
			$midi->insertMsg(0,"0 On ch=10 n=39 v=127");
			$midi->insertMsg(0,"120 On ch=10 n=39 v=127");
			$midi->insertMsg(0,"240 On ch=10 n=39 v=127");
		}
		$midi->saveMidFile($new);
		$midi->playMidFile($new,1,1,0,$plug);
?>
<br><br><input type="button" name="download" value="Save as SMF (*.mid)" onclick="self.location.href='download.php?f=<?php echo urlencode($new)?>'">
<?php
	}
	if (isset($_POST['show'])) echo '<hr>'.nl2br($midi->getTxt());
}
?>
</body>
</html>