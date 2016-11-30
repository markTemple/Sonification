<?php 
include("header.php");
include("./functions.php");
?>
<h1>Examples of Sonification as Arts tool</h1>
<p>The following examples show how the sonification tool can be used to as a random music generation tool
<fieldset>
<h2>Strings</h2>
<?php 
echo '<b>DATA source... </b> 64 codon randomly generated DNA sequence';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/Strings.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo '<h2>Sonification Properties</h2>';
echo '
<b>Musical options</b>
Scales:Melodic minor scale, 
Keys:A, 
Quantize:No, 
<br />
<b>Algorithm options</b>
Algorithm:Reading frame codons
Select:Use Start/Stop codons
<br />
<b>Sonify motifs</b>
Percussion:no, 
Preset style:Strings
<br />
<b>Note timing options</b>
Tempo:medium, 
Length:four, 
Timing:Triplets plus rest
<br />
<b>Instrument Group 1</b>
Groups:Strings, 
Select:Cello, 
<b>Instrument Group 2 </b>Groups:Strings, 
Select:Cello, 
<b>Instrument Group 3 </b>Groups:Strings, 
Select:Violin
';
echo '</fieldset>';
echo '</fieldset>';
?>

<fieldset>
<h2>Barrel House</h2>
<?php 
echo '<b>DATA source... </b> 64 codon randomly generated DNA sequence';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/Barrelhouse.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo '<h2>Sonification Properties</h2>';
echo '
<b>Musical options</b>
Scales:Three semitone intervals, 
Keys:c, 
Quantize:Yes, 
<br />
<b>Algorithm options</b>
Algorithm:Reading frame codons
Select:Ignore Start/Stop codons
<br />
<b>Sonify motifs</b>
Percussion:no, 
Preset style:Barrelhouse
<br />
<b>Note timing options</b>
Tempo:faster, 
Length:half, 
Timing:Triples
<br />
<b>Instrument Group 1</b>
Groups:Piano, 
Select:Honky-tonk Piano, 
<b>Instrument Group 2 </b>Groups:Piano, 
Select:Bright Acoustic Piano, 
<b>Instrument Group 3 </b>Groups:Piano, 
Select:Electric Grand Piano
';
echo '</fieldset>';
echo '</fieldset>';

?><fieldset>
<h2>Ohh Aahhs</h2>
<?php 
echo '<b>DATA source... </b> 64 codon randomly generated DNA sequence';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/Ohh Aahhs.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo '<h2>Sonification Properties</h2>';
echo '
<b>Musical options</b>
Scales:Blues scale, 
Keys:C, 
Quantize:Yes, 
<br />
<b>Algorithm options</b>
Algorithm:Reading frame codons
Select:Use Start/Stop codons
<br />
<b>Sonify motifs</b>
Percussion:no, 
Preset style:Ohh Aahhs
<br />
<b>Note timing options</b>
Tempo:slow, 
Length:one, 
Timing:Triples
<br />
<b>Instrument Group 1</b>
Groups:Ensemble, 
Select:Choir Aahs, 
<b>Instrument Group 2 </b>Groups:Ensemble, 
Select:Bright Voice Oohs, 
<b>Instrument Group 3 </b>Groups:Strings, 
Select:Timpani
';
echo '</fieldset>';
echo '</fieldset>';
?>

<fieldset>
<h2>Chromatic Percussion</h2>
<?php 
echo '<b>DATA source... </b> 64 codon randomly generated DNA sequence';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/Chromatic Percussion.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo '<h2>Sonification Properties</h2>';
echo '
<b>Musical options</b>
Scales:Major pentatonic scale, 
Keys:A, 
Quantize:No, 
<br />
<b>Algorithm options</b>
Algorithm:Reading frame codons
Select:Use Start/Stop codons
<br />
<b>Sonify motifs</b>
Percussion:no, 
Preset style:Chromatic Perc
<br />
<b>Note timing options</b>
Tempo:fast, 
Length:eight, 
Timing:Triplets
<br />
<b>Instrument Group 1</b>
Groups:Chromatic Percussion, 
Select:Glockenspiel, 
<b>Instrument Group 2 </b>Groups:Chromatic Percussion, 
Select:Vibraphone, 
<b>Instrument Group 3 </b>Groups:Chromatic Percussion, 
Select:Xylophone
';
echo '</fieldset>';
echo '</fieldset>';
?>

<fieldset>
<h2>Drone</h2>
<?php 
echo '<b>DATA source... </b> 30 codon randomly generated DNA sequence';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/Drone.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo '<h2>Sonification Properties</h2>';
echo '
<b>Musical options</b>
Scales:Semitone intervals, 
Keys:A, 
Quantize:Yes, 
<br />
<b>Algorithm options</b>
Algorithm:Reading frame codons
Select:Use Start/Stop codons
<br />
<b>Sonify motifs</b>
Percussion:no, 
Preset style:Drone
<br />
<b>Note timing options</b>
Tempo:slower, 
Length:one, 
Timing:Syncopate
<br />
<b>Instrument Group 1</b>
Groups:Synth Pad, 
Select:Pad 8 (sweep), 
<b>Instrument Group 2 </b>Groups:Synth Pad, 
Select:Pad 2 (warm), 
<b>Instrument Group 3 </b>Groups:Synth Lead, 
Select:Lead 5 (bowed)
';
echo '</fieldset>';
echo '</fieldset>';
?>


<?php
include("footer.php");?>

