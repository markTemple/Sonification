<!DOCTYPE html>
<html lang=en>
<head>
<title>Play MIDI File</title>
<meta name="keywords" content="MIDI file, JavaScript" />
<meta name="description" content="how to play MIDI file via Javascript" />
<meta http-equiv="X-UA-Compatible" content="requiresActiveX=true"/>
<script src="../javascript/script/JZZ.js"></script>
<script src="../javascript/script/JZZ.synth.OSC.js"></script>
<script src="../javascript/script/JZZ.input.Kbd.js"></script>
<script src="../javascript/script/JZZ.Midi.js"></script>
<script src="../javascript/script/JZZ.MidiFile.js"></script>
<link rel="stylesheet" type="text/css" href="../style.css" />
<body>

<object id="Jazz1" classid="CLSID:1ACE1618-1C7D-4561-AEE1-34842AA85E90" class="hidden">
	<object id="Jazz2" type="audio/x-jazz" class="hidden">
	<p style="visibility:visible;">This page requires 
	<a	href=http://jazz-soft.net>Jazz-Plugin</a> ...</p>
  	</object>
</object>
<p>
<select id=selectmidi onchange='changemidi();' class="hidden"></select>
<button id=play onmousedown='play();' disabled>Play</button>
<button id=pause onmousedown='pause();' disabled>Pause</button>
<button id=stop onmousedown='stop();' disabled>Stop</button>
<input type=checkbox id=loop onclick='onloop();' class="hidden"><label for=loop></label>
</p>
<p><em>The Sonified audio playback requires Jazz-Plugin - best in Safari</em></p>
 
<?PHP
$bas64MIDfile =
(base64_encode(file_get_contents("_HumanTelomericDNA.mid" )));

?>
<script><!--

<?PHP echo "var b64DNAudio='".$bas64MIDfile."';";?>

var Jazz = document.getElementById("Jazz1"); if(!Jazz || !Jazz.isJazz) Jazz = document.getElementById("Jazz2");
var player;
function onPlayerEvent(e){
 if(e.midi instanceof JZZ_.Midi){
  Jazz.MidiOutRaw(e.midi.array());
 }
 if(e.control=='play'){
  document.getElementById('play').disabled=true;
  document.getElementById('pause').disabled=false;
  document.getElementById('pause').innerHTML='Pause';
  document.getElementById('stop').disabled=false;
  document.getElementById('selectmidi').disabled=true;
 }
 else if(e.control=='stop'){
  for(var i=0;i<16;i++) Jazz.MidiOut(0xb0+i,123,0);
  document.getElementById('play').disabled=false;
  document.getElementById('pause').disabled=true;
  document.getElementById('pause').innerHTML='Pause';
  document.getElementById('stop').disabled=true;
  document.getElementById('selectmidi').disabled=false;
 }
 else if(e.control=='pause'){
  for(var i=0;i<16;i++) Jazz.MidiOut(0xb0+i,123,0);
  document.getElementById('pause').innerHTML='Resume';
 }
 else if(e.control=='resume'){
  document.getElementById('pause').innerHTML='Pause';
 }
}
function play(){ player.play();}
function stop(){ player.stop();}
function pause(){
 if(player.playing) player.pause();
 else player.resume();
}
function onloop(){
 player.loop(document.getElementById('loop').checked);
}
function changemidi(){
 Jazz.MidiOutOpen(select.options[select.selectedIndex].value);
}


var select=document.getElementById('selectmidi');
try{
 var list=Jazz.MidiOutList();
 for(var i in list){
  select[i]=new Option(list[i],list[i],i==0,i==0);
 }
 Jazz.MidiOutOpen(0);
 var midifile=new JZZ_.MidiFile(JZZ_.MidiFile.fromBase64(b64DNAudio));
 player=midifile.player();
 player.onEvent=onPlayerEvent;
 document.getElementById('play').disabled=false;
 document.getElementById('pause').disabled=true;
 document.getElementById('stop').disabled=true;
 document.getElementById('selectmidi').disabled=false;
}
catch(err){}
--></script>
</body>
</html>
