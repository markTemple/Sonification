<?php

error_reporting(E_ALL);

$plug = isset($_POST['plug'])?$_POST['plug']:'qt';

if (isset($_POST['txt'])){
	$txt = $_POST['txt'];
	if (get_magic_quotes_gpc()) $txt = stripslashes($txt);
}else 
	$txt = $test='<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE MIDIFile SYSTEM "http://www.musicxml.org/dtds/midixml.dtd">
<MIDIFile>
<Format>1</Format>
<TrackCount>2</TrackCount>
<TicksPerBeat>120</TicksPerBeat>
<TimestampType>Absolute</TimestampType>
<Track Number="0">
  <Event>
    <Absolute>0</Absolute>
    <TimeSignature Numerator="4" LogDenominator="2" MIDIClocksPerMetronomeClick="24" ThirtySecondsPer24Clocks="8"/>
  </Event>
  <Event>
    <Absolute>0</Absolute>
    <KeySignature Fifths="0" Mode="0"/>
  </Event>
  <Event>
    <Absolute>0</Absolute>
    <SetTempo Value="371520"/>
  </Event>
  <Event>
    <Absolute>0</Absolute>
    <EndOfTrack/>
  </Event>
</Track>
<Track Number="1">
  <Event>
    <Absolute>0</Absolute>
    <ProgramChange Channel="1" Number="73"/>
  </Event>
  <Event>
    <Absolute>0</Absolute>
    <NoteOn Channel="1" Note="43" Velocity="127"/>
  </Event>
  <Event>
    <Absolute>240</Absolute>
    <NoteOn Channel="1" Note="59" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>240</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>256</Absolute>
    <NoteOn Channel="1" Note="62" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>376</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>392</Absolute>
    <NoteOn Channel="1" Note="55" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>422</Absolute>
    <NoteOn Channel="1" Note="43" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>632</Absolute>
    <NoteOn Channel="1" Note="59" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>738</Absolute>
    <NoteOn Channel="1" Note="50" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>738</Absolute>
    <NoteOn Channel="1" Note="57" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>738</Absolute>
    <NoteOn Channel="1" Note="62" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>738</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>798</Absolute>
    <NoteOn Channel="1" Note="38" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>798</Absolute>
    <NoteOn Channel="1" Note="57" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>798</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>814</Absolute>
    <NoteOn Channel="1" Note="50" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>844</Absolute>
    <NoteOn Channel="1" Note="55" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>860</Absolute>
    <NoteOn Channel="1" Note="57" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>860</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>890</Absolute>
    <NoteOn Channel="1" Note="37" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>966</Absolute>
    <NoteOn Channel="1" Note="61" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1072</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1162</Absolute>
    <NoteOn Channel="1" Note="37" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1162</Absolute>
    <NoteOn Channel="1" Note="38" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1178</Absolute>
    <NoteOn Channel="1" Note="61" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1268</Absolute>
    <NoteOn Channel="1" Note="50" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1268</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1298</Absolute>
    <NoteOn Channel="1" Note="50" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1404</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1464</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1510</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1540</Absolute>
    <NoteOn Channel="1" Note="43" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1736</Absolute>
    <NoteOn Channel="1" Note="55" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1766</Absolute>
    <NoteOn Channel="1" Note="59" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1766</Absolute>
    <NoteOn Channel="1" Note="62" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1766</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1856</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1886</Absolute>
    <NoteOn Channel="1" Note="71" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>1902</Absolute>
    <NoteOn Channel="1" Note="43" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1932</Absolute>
    <NoteOn Channel="1" Note="71" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>1992</Absolute>
    <NoteOn Channel="1" Note="59" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2022</Absolute>
    <NoteOn Channel="1" Note="71" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2112</Absolute>
    <NoteOn Channel="1" Note="71" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2188</Absolute>
    <NoteOn Channel="1" Note="57" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2188</Absolute>
    <NoteOn Channel="1" Note="71" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2264</Absolute>
    <NoteOn Channel="1" Note="62" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2294</Absolute>
    <NoteOn Channel="1" Note="71" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2310</Absolute>
    <NoteOn Channel="1" Note="62" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2356</Absolute>
    <NoteOn Channel="1" Note="50" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2356</Absolute>
    <NoteOn Channel="1" Note="57" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2356</Absolute>
    <NoteOn Channel="1" Note="62" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2356</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2372</Absolute>
    <NoteOn Channel="1" Note="37" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2372</Absolute>
    <NoteOn Channel="1" Note="50" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2448</Absolute>
    <NoteOn Channel="1" Note="38" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2448</Absolute>
    <NoteOn Channel="1" Note="55" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2448</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2464</Absolute>
    <NoteOn Channel="1" Note="57" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2510</Absolute>
    <NoteOn Channel="1" Note="57" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2510</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2540</Absolute>
    <NoteOn Channel="1" Note="69" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2570</Absolute>
    <NoteOn Channel="1" Note="69" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2660</Absolute>
    <NoteOn Channel="1" Note="61" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2706</Absolute>
    <NoteOn Channel="1" Note="66" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2766</Absolute>
    <NoteOn Channel="1" Note="37" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2782</Absolute>
    <NoteOn Channel="1" Note="38" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2798</Absolute>
    <NoteOn Channel="1" Note="61" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>2904</Absolute>
    <NoteOn Channel="1" Note="50" Velocity="100"/>
  </Event>
  <Event>
    <Absolute>2964</Absolute>
    <NoteOn Channel="1" Note="50" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>3100</Absolute>
    <NoteOn Channel="1" Note="57" Velocity="0"/>
  </Event>
  <Event>
    <Absolute>3100</Absolute>
    <EndOfTrack/>
  </Event>
</Track>
</MIDIFile>';
	
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Xml2Midi</title>
<style>
body {font-family:arial;font-size:11px;margin:5px;}
form {font-family:arial;font-size:11px;}
td {font-family:arial;font-size:11px}
input {font-family:arial;font-size:11px}
textarea {font-family:"courier new",courier;font-size:11px}
a,a:link,a:visited,a:active	{font-family:arial;font-size:11px;color:#000000;}
a:hover	{font-family:font-family:arial;font-size:11px;color:#666666;}
</style>
</head>
<body style="margin:5px;font-family:Courier">

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<textarea name="txt" cols="60" rows="30"><?php echo $txt?></textarea>
<br>
<input type="radio" name="plug" value="bk"<?php echo $plug=='bk'?' checked':''?>>Beatnik
<input type="radio" name="plug" value="qt"<?php echo $plug=='qt'?' checked':''?>>QuickTime
<input type="radio" name="plug" value="wm"<?php echo $plug=='wm'?' checked':''?>>Windows Media
<input type="radio" name="plug" value=""<?php echo $plug==''?' checked':''?>>other (default Player)<br><br>
<input type="submit" value=" send ">
</form>
<?php
if (isset($_POST['txt'])){
	$save_dir = 'tmp/';
	srand((double)microtime()*1000000);
	$file = $save_dir.rand().'.mid';

	/****************************************************************************
	MIDI CLASS CODE
	****************************************************************************/
	require('./classes/midi.class.php');

	@set_time_limit (600); # 10 minutes

	$midi = new Midi();
	$midi->importXml($txt);		
	$midi->saveMidFile($file);
	$midi->playMidFile($file,1,1,0,$plug);
?>
	<br><br><input type="button" name="download" value="Save as SMF (*.mid)" onClick="self.location.href='download.php?f=<?php echo urlencode($file)?>'">
<?php
}
?>
</body>
</html>