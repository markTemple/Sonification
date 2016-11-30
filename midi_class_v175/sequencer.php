<?php

error_reporting(E_ALL);
$PHP_SELF = $_SERVER['PHP_SELF'];

/****************************************************************************
MIDI CLASS CODE
****************************************************************************/
require('./classes/midi.class.php');

$midi = new Midi();

$instruments = $midi->getInstrumentList();
$drumset     = $midi->getDrumset();
$drumkit     = $midi->getDrumkitList();
$notes       = $midi->getNoteList();
//---------------------------------------------

if (isset($_POST['publish'])){
	unset($_POST['plug']);
	if (isset($_POST['showTxt'])) unset($_POST['showTxt']);
	if (isset($_POST['showXml'])) unset($_POST['showXml']);
	
	$str = serialize($_POST);
	$mix = substr(md5(uniqid(rand())), 0, 10).'.mix';
	$m = fopen('mix/'.$mix, 'wb');
	fwrite($m, $str);
	@fclose($m);
	echo "your mix has been published as '$mix'!";
}

if (isset($_GET['mix'])){
	$mixfile = 'mix/'.$_GET['mix'];
	$m=fopen($mixfile,"r");
	$str = fread($m, filesize($mixfile));
	@fclose($m);
	$_POST = unserialize($str);
	$_POST['play'] = 1;
}

//DEFAULTS
$loop = isset($_POST['noloop'])?0:1;
$rep = isset($_POST['rep'])?$_POST['rep']:4;
$plug = isset($_POST['plug'])?$_POST['plug']:(isset($_GET['plug'])?$_GET['plug']:'qt');
$play = isset($_POST['play'])?1:0;
$bpm = isset($_POST['bpm'])?$_POST['bpm']:150;

$aktiv=array();
$inst=array();
$note=array();
$vol=array();

for ($k=1;$k<=8;$k++){
	$aktiv[$k] = isset($_POST["aktiv$k"])?1:0;
	$inst[$k] = isset($_POST["inst$k"])?$_POST["inst$k"]:0;
	$note[$k] = isset($_POST["note$k"])?$_POST["note$k"]:35;
	$vol[$k] = isset($_POST["vol$k"])?$_POST["vol$k"]:127;
}
//if (!isset($p['last'])) $aktiv[1]=1; //first call
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Sequencer</title>
<style type="text/css">
body {font-family:arial;font-size:11px;margin:5px;}
td {font-family:arial;font-size:11px}
select {font-family:arial;font-size:11px}
option {font-family:arial;font-size:11px}
input {font-family:arial;font-size:11px}
a,a:link,a:visited,a:active	{font-family:arial;font-size:11px;color:#000000;}
a:hover	{font-family:font-family:arial;font-size:11px;color:#666666;}
</style>
</head>
<body>
<form action="<?=$PHP_SELF?>" method="post" onsubmit="b=0;for(i=1;i<9;i++)b|=this['aktiv'+i].checked;if(b==0){alert('You have to activate at least one track!');return false};">
<table border="0" cellpadding="2" cellspacing="0"><tr><td valign="top">
<table border="0" cellpadding="2" cellspacing="0" bgcolor="#DADADA">

<!-- DRUMS -->
<tr bgcolor="#333333"><td>&nbsp;</td><td colspan="7" style="color:#FFFFFF"><b>Drum tracks</b></td></tr>
<tr bgcolor="#BBBBBB"><td align="center">on</td><td>instrument</td><td>drum kit</td><td>vol</td><td colspan=4>pattern</td></tr>
<?php
for ($k=1;$k<=4;$k++){
?>
<tr>
<td><input type="checkbox" name="aktiv<?php echo $k?>"<?php echo $aktiv[$k]?' checked':''?>></td>
<td>
<select name="note<?php echo $k?>">
<?php
	for ($i=0;$i<128;$i++)
		if (isset($drumset[$i]))
			echo '<OPTION value="'.$i.'"'.($note[$k]==$i?' selected':'').'>0'.$i.'&nbsp;&nbsp;'.$drumset[$i]."</OPTION>\n";
		else{
			$num = ($i<10)?"00$i":($i<100?"0$i":"$i");
			echo '<OPTION value="'.($i).'"'.($note[$k]==$i?' selected':'').'>'.$num."</OPTION>\n";
		};
?>
</select>
</td>
<td>
<select name="inst<?php echo $k?>">
<?php
	foreach ($drumkit as $key=>$val) echo "<option value=$key ".(($inst[$k]==$key)?' selected':'').">$val</option>\n";
?>
</select>
</td>
<td>
<select name="vol<?php echo $k?>">
<?php
	for ($i=127;$i>=0;$i--)
		echo "<OPTION value=\"$i\"".($vol[$k]==$i?' selected':'').">$i</OPTION>\n";
?>
</select>
</td>
<td bgcolor="#DADADA">
<?php
	for ($i=0;$i<16;$i++) {
		echo "<input type=\"checkbox\" name=\"n$k$i\"".(isset($_POST["n$k$i"])?' checked':'').">\n";
		if ($i<15&&$i%4==3) echo '</td><td'.($i%8==3?' bgcolor="#EEEEEE"':' bgcolor="#DADADA"').'>';
	}
}
?>
</td>
</tr>


<!-- INSTRUMENTS -->
<tr bgcolor="#333333"><td>&nbsp;</td><td colspan="7" style="color:#FFFFFF"><b>Instrument tracks</b></td></tr>
<tr bgcolor="#BBBBBB"><td align="center">on</td><td>instrument</td><td>note</td><td>vol</td><td colspan="4">pattern</td></tr>
<?php
for ($k=5;$k<=8;$k++){
?>
<tr>
<td><input type="checkbox" name="aktiv<?php echo $k?>"<?php echo $aktiv[$k]?' checked':''?>></td>
<td>
<select name="inst<?php echo $k?>">
<?php
	for ($i=0;$i<128;$i++){
		$num = ($i<10)?"00$i":($i<100?"0$i":"$i");
		echo '<OPTION value="'.($i).'"'.($inst[$k]==$i?' selected':'').'>'.$num.'&nbsp;&nbsp;'.$instruments[$i]."</OPTION>\n";
	}
?>
</select>
</td>
<td>
<select name="note<?php echo $k?>">
<?php
	for ($i=0;$i<128;$i++)
		echo '<OPTION value="'.($i).'"'.($note[$k]==$i?' selected':'').'>'.$notes[$i]."</OPTION>\n";
?>
</select>
</td>
<td>
<select name="vol<?php echo $k?>">
<?php
	for ($i=127;$i>=0;$i--)
		echo "<OPTION value=\"$i\"".($vol[$k]==$i?' selected':'').">$i</OPTION>\n";
?>
</select>
</td>
<td>
<?php
	for ($i=0;$i<16;$i++) {
		echo "<input type=\"checkbox\" name=\"n$k$i\"".(isset($_POST["n$k$i"])?' checked':'').">\n";
		if ($i<15&&$i%4==3) echo '</td><td'.($i%8==3?' bgcolor="#EEEEEE"':'').'>';
	}
}
?>
</td>
</tr>
<tr><td colspan=8 bgcolor="#FFFFFF">

<br><br>

<input type="text" name="bpm" size="3" value="<?php echo $bpm?>"> bpm<br>
<input type="text" name="rep" size="3" value="<?php echo $rep?>"> bar repetitions<br>
<input type="checkbox" name="noloop"<?php echo !$loop?' checked':''?>>don't loop<br>
<input type="radio" name="plug" value="bk"<?php echo $plug=='bk'?' checked':''?>>Beatnik
<input type="radio" name="plug" value="qt"<?php echo $plug=='qt'?' checked':''?>>QuickTime
<input type="radio" name="plug" value="wm"<?php echo $plug=='wm'?' checked':''?>>Windows Media
<!--<input type="radio" name="plug" value="jv"<?php echo $plug=='jv'?' checked':''?>>Java Applet-->
<input type="radio" name="plug" value=""<?php echo $plug==''?' checked':''?>>other (default Player)
<br>
<input type="checkbox" name="showTxt"<?php echo isset($_POST['showTxt'])?' checked':''?>>show MIDI result as Text<br>
<input type="checkbox" name="showXml"<?php echo isset($_POST['showXml'])?' checked':''?>>show MIDI result as XML
<br><br>
<input type="submit" name="play" value=" PLAY! ">&nbsp;&nbsp;
<input type="submit" name="publish" value="Publish">&nbsp;&nbsp;<br><br>

<?php

if ($play){

	$save_dir = 'tmp/';
	srand((double)microtime()*1000000);
	$file = $save_dir.rand().'.mid';
	
	$midi->open(480); //timebase=480, quarter note=120
	$midi->setBpm($bpm);
	
	for ($k=1;$k<=8;$k++) if ($aktiv[$k]){		
		$ch = ($k<5)?10:$k;
		$inst = $_POST["inst$k"];
		$n = $_POST["note$k"];
		$v = $_POST["vol$k"];
		$t = 0;
		$ts = 0;
		$tn = $midi->newTrack() - 1;
		
		$midi->addMsg($tn, "0 PrCh ch=$ch p=$inst");
		for ($r=0;$r<$rep;$r++){
			for ($i=0;$i<16;$i++){
				if ($ts == $t+120) $midi->addMsg($tn, "$ts Off ch=$ch n=$n v=127");
				if (isset($_POST["n$k$i"])){
					$t = $ts;
					$midi->addMsg($tn, "$t On ch=$ch n=$n v=$v");
				}
				$ts += 120;
			}
			if ($ts == $t+120) $midi->addMsg($tn, "$ts Off ch=$ch n=$n v=127");
		}
		$midi->addMsg($tn, "$ts Meta TrkEnd");
	}	
	$midi->saveMidFile($file);
	$midi->playMidFile($file,1,1,$loop,$plug);
?>	
	<br><br>
	<input type="button" name="download" value="Save as SMF (*.mid)" onClick="self.location.href='download.php?f=<?php echo urlencode($file)?>'">
<?php
}
?>
</td></tr></table>
</td>
<td width="10">&nbsp;</td>
<td valign="top">

<table width="140" border="0" cellpadding="2" cellspacing="0" bgcolor="#DADADA">
<tr bgcolor="#333333"><td colspan="7" style="color:#FFFFFF"><b>Published Mixes</b></td></tr>
<tr><td>
<?php
function cmp ($a, $b) {
	return (filemtime('mix/'.$a) < filemtime('mix/'.$b)) ? 1 : -1;
}
$mixes = array();
$handle = opendir ('mix');
while (false !== ($file = readdir ($handle)))
	if ($file!='.' && $file!='..') $mixes[] = $file;
closedir($handle);
usort ($mixes, "cmp");
foreach ($mixes as $file) echo "<a href=\"sequencer.php?mix=$file&amp;plug=$plug\">$file</a><br>\n";
?>
<br>
</td></tr></table>

</td></tr></table>
</form>

<?php 
if (isset($_POST['showTxt'])) echo '<hr><pre>'.$midi->getTxt().'</pre>';
if (isset($_POST['showXml'])) echo '<hr><pre>'.htmlspecialchars($midi->getXml()).'</pre>';
?>
</body>
</html>