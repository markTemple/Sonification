<?php

error_reporting(E_ALL);
$PHP_SELF = $_SERVER['PHP_SELF'];

$inst = isset($_POST['inst'])?$_POST['inst']:0;
$rttl = isset($_POST['rttl'])?$_POST['rttl']:'Beethoven:d=4,o=5,b=250:e6,d#6,e6,d#6,e6,b,d6,c6,2a.,c,e,a,2b.,e,a,b,2c.6,e,e6,d#6,e6,d#6,e6,b,d6,c6,2a.,c,e,a,2b.,e,c6,b,1a';
$plug = isset($_POST['plug'])?$_POST['plug']:'qt';

/****************************************************************************
MIDI CLASS CODE
****************************************************************************/
require('./classes/midi_rttl.class.php');

$midi = new MidiRttl();
$instruments = $midi->getInstrumentList();


?><html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Rttl2Midi</title>
<style>
body {font-family:Verdana;font-size:11px;margin:5px;}
input {font-family:Verdana;font-size:11px}
select {font-family:Verdana;font-size:11px}
</style>
</head>
<body>
<form action="<?=$PHP_SELF?>" method="post">
<textarea name="rttl" style="width:90%" rows="2"><?=$rttl?></textarea>
<br><br>
Use instrument: 
<select name="inst">
<?php
	for ($i=0;$i<128;$i++){
		echo '<OPTION value="'.($i).'"'.($inst==$i?' selected':'').'>'.$instruments[$i]."</OPTION>\n";
	}
?>
</select>
<br>
Use player: 
<input type="radio" name="plug" value="bk"<?=$plug=='bk'?' checked':''?>>Beatnik
<input type="radio" name="plug" value="qt"<?=$plug=='qt'?' checked':''?>>QuickTime
<input type="radio" name="plug" value="wm"<?=$plug=='wm'?' checked':''?>>Windows Media
<input type="radio" name="plug" value=""<?=$plug==''?' checked':''?>>other (default Player)
<br><br>
<input type="submit" value=" send ">
</form>
<br>
<?php

if (isset($_POST['rttl'])){
	$save_dir = 'tmp/';
	srand((double)microtime()*1000000);
	$file = $save_dir.rand().'.mid';

	$midi->importRttl($_POST['rttl'],$inst);
	$midi->saveMidFile($file);
	$midi->playMidFile($file,1,1,0,$plug);
?>
<br><br><input type="button" name="download" value="Save as SMF (*.mid)" onClick="self.location.href='download.php?f=<?=urlencode($file)?>'">
<?	
}
?>
</body>
</html>