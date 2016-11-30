<?php include("header.php");
include("./functions.php");
include("./arrays.php");
include("sonify.java");
include("help_menu.php");
?>

<script src="./JZZ-modules-master/javascript/script/JZZ.js"></script>
<script src="./JZZ-modules-master/javascript/script/JZZ.synth.OSC.js"></script>
<script src="./JZZ-modules-master/javascript/script/JZZ.input.Kbd.js"></script>
<link rel="stylesheet" type="text/css" href="./JZZ-modules-master/style.css" />

<script type="text/javascript">
(function(){
 if(window.addEventListener) window.addEventListener('load',init,false);
 else if(window.attachEvent) window.attachEvent('onload',init);
 var midi_init;
 var playing;
 var sound;
 var out;

 function visit(t){
  if(t.nodeType!=1) return;
  if(t.getAttribute('midi')){
   if(t.addEventListener){
    t.addEventListener('mousedown',down,false);
   }
   else if(t.attachEvent){
    t.attachEvent('onmousedown',down);
   }
  }
  if(t.getAttribute('prog')){
   if(t.addEventListener){
    t.addEventListener('mousedown',prog,false);
   }
   else if(t.attachEvent){
    t.attachEvent('onmousedown',prog);
   }
  }
  for(var i in t.childNodes){
   visit(t.childNodes[i]);
  }
 }

 function init(){
  if(document.addEventListener){
   document.addEventListener('mouseup',up,false);
  }
  else if(document.attachEvent){
   document.attachEvent('onmouseup',up);
  }
  Jazz = document.getElementById('Jazz1'); if(!Jazz || !Jazz.isJazz) Jazz = document.getElementById('Jazz2');
  if(Jazz && Jazz.isJazz){
   Jazz.MidiOut(0x80,0,0);
   try{
    out=document.getElementById('midiout');
    var list=Jazz.MidiOutList();
    for(var i in list){
     out[i]=new Option(list[i],list[i],i==0,i==0);
    }
    if(out.addEventListener){
     out.addEventListener('change',changemidi,false);
    }
    else if(out.attachEvent){
     out.attachEvent('onchange',changemidi);
    }
    document.getElementById('selectmidiout').className='';
   }
   catch(err){}
  }
  visit(document.body);
 }

 function changemidi(){
  Jazz.MidiOutOpen(out.options[out.selectedIndex].value);
 }

 function down(e){
  var e=window.event || e;
  var t;
  if (e.target) t = e.target;
  else if (e.srcElement) t = e.srcElement;
  up(0);
  while(!t.getAttribute('midi')) t=t.parentNode;
  if(Jazz && Jazz.isJazz){
   Jazz.MidiOut(0x90,t.getAttribute('midi'),100);
  }
  t.className='playing';
  playing=t;
 }

 function up(e){
  if(!playing) return;
  if(Jazz && Jazz.isJazz){
   Jazz.MidiOut(0x80,playing.getAttribute('midi'),0);
  }
  playing.className='';
  playing=null;
 }

 function prog(e){
  var e=window.event || e;
  var t;
  if (e.target) t = e.target;
  else if (e.srcElement) t = e.srcElement;
  up(0);
  if(sound){ sound.className='';}
  while(!t.getAttribute('prog')) t=t.parentNode;
  if(Jazz && Jazz.isJazz){
   Jazz.MidiOut(0xC0,t.getAttribute('prog'),0);
   Jazz.MidiOut(0x90,60,0x7f);
   window.setTimeout(function(){ Jazz.MidiOut(0x80,60,0);},500);
  }
  t.className='on';
  sound=t;
 }
})();
</script>

<object id="Jazz1" classid="CLSID:1ACE1618-1C7D-4561-AEE1-34842AA85E90" class="hidden">
  <object id="Jazz2" type="audio/x-jazz" class="hidden">
<p style="visibility:visible;">This page requires <a href=http://jazz-soft.net>Jazz-Plugin</a> ...</p>
  </object>
</object>

<div id=selectmidiout class="hidden"><select id=midiout class="hidden"></select></div>

<h1>Midi instruments</h1>

<p>Standard MIDI protocols allow notes to be easily played on 128 different instruments. These are grouped into 16 catagories according to type, as shown below. Click to listen...</p>


<table>
  <caption align="bottom"></caption>
  <tr>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" >
<tr><th scope=“col”>Piano</th></tr>
<tr><td prog=0>0    Acoustic Grand Piano</td></tr>
<tr><td prog=1>1    Bright Acoustic Piano</td></tr>
<tr><td prog=2>2    Electric Grand Piano</td></tr>
<tr><td prog=3>3    Honky-tonk Piano</td></tr>
<tr><td prog=4>4    Electric Piano 1</td></tr>
<tr><td prog=5>5    Electric Piano 2</td></tr>
<tr><td prog=6>6    Harpsichord</td></tr>
<tr><td prog=7>7    Clavinet</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Chromatic Percussion</th>
<tr><td prog=8>8    Celesta</td></tr>
<tr><td prog=9>9    Glockenspiel</td></tr>
<tr><td prog=10>10    Music Box</td></tr>
<tr><td prog=11>11    Vibraphone</td></tr>
<tr><td prog=12>12    Marimba</td></tr>
<tr><td prog=13>13    Xylophone</td></tr>
<tr><td prog=14>14    Tubular Bells</td></tr>
<tr><td prog=15>15    Dulcimer</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Organ</th>
<tr><td prog=16>16    Drawbar Organ</td></tr>
<tr><td prog=17>17    Percussive Organ</td></tr>
<tr><td prog=18>18    Rock Organ</td></tr>
<tr><td prog=19>19    Church Organ</td></tr>
<tr><td prog=20>20    Reed Organ</td></tr>
<tr><td prog=21>21    Accordion</td></tr>
<tr><td prog=22>22    Harmonica</td></tr>
<tr><td prog=23>23    Tango Accordion</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Guitar</th>
<tr><td prog=24>24    Acoustic Guitar (nylon)</td></tr>
<tr><td prog=25>25    Acoustic Guitar (steel)</td></tr>
<tr><td prog=26>26    Electric Guitar (jazz)</td></tr>
<tr><td prog=27>27    Electric Guitar (clean)</td></tr>
<tr><td prog=28>28    Electric Guitar (muted)</td></tr>
<tr><td prog=29>29    Overdriven Guitar</td></tr>
<tr><td prog=30>30    Distortion Guitar</td></tr>
<tr><td prog=31>31    Guitar harmonics</td></tr>
</table>
	</td>
  </tr>
  <tr>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Bass</th>
<tr><td prog=32>32    Acoustic Bass</td></tr>
<tr><td prog=33>33    Electric Bass (finger)</td></tr>
<tr><td prog=34>34    Electric Bass (pick)</td></tr>
<tr><td prog=35>35    Fretless Bass</td></tr>
<tr><td prog=36>36    Slap Bass 1</td></tr>
<tr><td prog=37>37    Slap Bass 2</td></tr>
<tr><td prog=38>38    Synth Bass 1</td></tr>
<tr><td prog=39>39    Synth Bass 2</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Strings</th>
<tr><td prog=40>40    Violin</td></tr>
<tr><td prog=41>41    Viola</td></tr>
<tr><td prog=42>42    Cello</td></tr>
<tr><td prog=43>43    Contrabass</td></tr>
<tr><td prog=44>44    Tremolo Strings</td></tr>
<tr><td prog=45>45    Pizzicato Strings</td></tr>
<tr><td prog=46>46    Orchestral Harp</td></tr>
<tr><td prog=47>47    Timpani</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Ensemble</th>
<tr><td prog=48>48    String Ensemble 1</td></tr>
<tr><td prog=49>49    String Ensemble 2</td></tr>
<tr><td prog=50>50    Synth Strings 1</td></tr>
<tr><td prog=51>51    Synth Strings 2</td></tr>
<tr><td prog=52>52    Choir Aahs</td></tr>
<tr><td prog=53>53    Voice Oohs</td></tr>
<tr><td prog=54>54    Synth Voice</td></tr>
<tr><td prog=55>55    Orchestra Hit</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Brass</th>
<tr><td prog=56>56    Trumpet</td></tr>
<tr><td prog=57>57    Trombone</td></tr>
<tr><td prog=58>58    Tuba</td></tr>
<tr><td prog=59>59    Muted Trumpet</td></tr>
<tr><td prog=60>60    French Horn</td></tr>
<tr><td prog=61>61    Brass Section</td></tr>
<tr><td prog=62>62    Synth Brass 1</td></tr>
<tr><td prog=63>63    Synth Brass 2</td></tr>
</table>
	</td>
  </tr>
  <tr>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Reed</th>
<tr><td prog=64>64    Soprano Sax</td></tr>
<tr><td prog=65>65    Alto Sax</td></tr>
<tr><td prog=66>66    Tenor Sax</td></tr>
<tr><td prog=67>67    Baritone Sax</td></tr>
<tr><td prog=68>68    Oboe</td></tr>
<tr><td prog=69>69    English Horn</td></tr>
<tr><td prog=70>70    Bassoon</td></tr>
<tr><td prog=71>71    Clarinet</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Pipe</th>
<tr><td prog=72>72    Piccolo</td></tr>
<tr><td prog=73>73    Flute</td></tr>
<tr><td prog=74>74    Recorder</td></tr>
<tr><td prog=75>75    Pan Flute</td></tr>
<tr><td prog=76>76    Blown Bottle</td></tr>
<tr><td prog=77>77    Shakuhachi</td></tr>
<tr><td prog=78>78    Whistle</td></tr>
<tr><td prog=79>79    Ocarina</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Synth Lead</th>
<tr><td prog=80>80    Lead 1 (square)</td></tr>
<tr><td prog=81>81    Lead 2 (sawtooth)</td></tr>
<tr><td prog=82>82    Lead 3 (calliope)</td></tr>
<tr><td prog=83>83    Lead 4 (chiff)</td></tr>
<tr><td prog=84>84    Lead 5 (charang)</td></tr>
<tr><td prog=85>85    Lead 6 (voice)</td></tr>
<tr><td prog=86>86    Lead 7 (fifths)</td></tr>
<tr><td prog=87>87    Lead 8 (bass + lead)</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Synth Pad</th>
<tr><td prog=88>88    Pad 1 (new age)</td></tr>
<tr><td prog=89>89    Pad 2 (warm)</td></tr>
<tr><td prog=90>90    Pad 3 (polysynth)</td></tr>
<tr><td prog=91>91    Pad 4 (choir)</td></tr>
<tr><td prog=92>92    Pad 5 (bowed)</td></tr>
<tr><td prog=93>93    Pad 6 (metallic)</td></tr>
<tr><td prog=94>94    Pad 7 (halo)</td></tr>
<tr><td prog=95>95    Pad 8 (sweep)</td></tr>
</table>
	</td>
  </tr>
  <tr>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Synth Effects</th>
<tr><td prog=96>96    FX 1 (rain)</td></tr>
<tr><td prog=97>97    FX 2 (soundtrack)</td></tr>
<tr><td prog=98>98    FX 3 (crystal)</td></tr>
<tr><td prog=99>99    FX 4 (atmosphere)</td></tr>
<tr><td prog=100>100   FX 5 (brightness)</td></tr>
<tr><td prog=101>101   FX 6 (goblins)</td></tr>
<tr><td prog=102>102   FX 7 (echoes)</td></tr>
<tr><td prog=103>103   FX 8 (sci-fi)</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Ethnic</th>
<tr><td prog=104>104    Sitar</td></tr>
<tr><td prog=105>105    Banjo</td></tr>
<tr><td prog=106>106    Shamisen</td></tr>
<tr><td prog=107>107    Koto</td></tr>
<tr><td prog=108>108    Kalimba</td></tr>
<tr><td prog=109>109    Bag pipe</td></tr>
<tr><td prog=110>110    Fiddle</td></tr>
<tr><td prog=111>111    Shanai</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Percussive</th>
<tr><td prog=112>112    Tinkle Bell</td></tr>
<tr><td prog=113>113    Agogo</td></tr>
<tr><td prog=114>114    Steel Drums</td></tr>
<tr><td prog=115>115    Woodblock</td></tr>
<tr><td prog=116>116    Taiko Drum</td></tr>
<tr><td prog=117>117    Melodic Tom</td></tr>
<tr><td prog=118>118    Synth Drum</td></tr>
<tr><td prog=119>119    Reverse Cymbal</td></tr>
</table>
	</td>
    <td>
<table class="box-table-a" summary="MIDI Instrument groups" width="250px" style="margin: 0px" ><th scope=“col”>Sound Effects</th>
<tr><td prog=120>120    Guitar Fret Noise</td></tr>
<tr><td prog=121>121    Breath Noise</td></tr>
<tr><td prog=122>122    Seashore</td></tr>
<tr><td prog=123>123    Bird Tweet</td></tr>
<tr><td prog=124>124    Telephone Ring</td></tr>
<tr><td prog=125>125    Helicopter</td></tr>
<tr><td prog=126>126    Applause</td></tr>
<tr><td prog=127>127    Gunshot</td></tr>
</table>
	</td>
  </tr>
</table>

<?php include("footer.php");?>
