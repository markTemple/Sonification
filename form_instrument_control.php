<?php 	
//foreach($_POST as $key => $selected){
//	if(isset($selected)){
//		$postdata["$key"] = $selected;
//		}else{}
//}
?>
<br />
<fieldset><legend>Change the musical instrument set for the audio output</legend>
<?php $Instrument = make_Instrument();?>
<table width=900><col width=300><col width=300><col width=300>
<tr>
<td bgcolor="#FFFFCC">	
<h3>Instrument Frame 1 (or Protein Sequence)</h3><hr />
<?php
for($x = 0; $x <= 89; $x=$x+3) {
	$Instrument_Frame_1[] = $Instrument["$x"];
}
makeRadioBoxes($Instrument_Frame_1, $postdata['Instrument_Frame_1'], '0', 'Instrument_Frame_1');
?>
</td>
<td bgcolor="#CCFFCC">
<h3>Instrument Frame 2</h3><hr />
<?php
for($x = 1; $x <= 89; $x=$x+3) {
	$Instrument_Frame_2[] = $Instrument["$x"];
}
makeRadioBoxes($Instrument_Frame_2, $postdata['Instrument_Frame_2'], '25', 'Instrument_Frame_2');
?>
</td>
<td bgcolor="#FFFFCC">
<h3>Instrument Frame 3</h3><hr />
<?php
for($x = 2; $x <= 89; $x=$x+3) {
	$Instrument_Frame_3[] = $Instrument["$x"];
}
makeRadioBoxes($Instrument_Frame_3, $postdata['Instrument_Frame_3'], '17', 'Instrument_Frame_3');
?>
</td>
</table>
</fieldset>
<br />
