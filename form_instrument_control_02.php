<?php
$instra_dropdown = Make_GM_Instrument_List();
//show_array($instra_dropdown);


?>
<br />
<fieldset><legend>Change the musical instrument set for the audio output</legend>
<table width=900><col width=300><col width=300><col width=300>
<tr>
<td bgcolor="#FFFFCC">	
<h3>Instrument Frame 1 (or Protein Sequence)</h3><hr />
<?php 
makeSelectBox_catagory
($instra_dropdown, $postdata['instra_groups_1'], '0', 'instra_groups_1', 'categories1', 'Instrument Groups: ');
?>	
<br />
<?php
makeSelectBox_item
($instra_dropdown, $postdata['Instrument_Frame_1'], '0', 'Instrument_Frame_1', 'items1', 'Instruments: ');
?>	
</td>
<td bgcolor="#CCFFCC">
<h3>Instrument Frame 2</h3><hr />
<?php 
makeSelectBox_catagory
($instra_dropdown, $postdata['instra_groups_2'], '3', 'instra_groups_2', 'categories2', 'Instrument Groups: ');
?>	
<br />
<?php
makeSelectBox_item
($instra_dropdown, $postdata['Instrument_Frame_2'], '25', 'Instrument_Frame_2', 'items2', 'Instruments: ');
?>	
</td>
<td bgcolor="#FFFFCC">
<h3>Instrument Frame 3</h3><hr />
<?php 
makeSelectBox_catagory
($instra_dropdown, $postdata['instra_groups_3'], '2', 'instra_groups_3', 'categories3', 'Instrument Groups: ');
?>	
<br />
<?php
makeSelectBox_item
($instra_dropdown, $postdata['Instrument_Frame_3'], '17', 'Instrument_Frame_3', 'items3', 'Instruments: ');
?>	
</td>
</table>
</fieldset>
<br />
