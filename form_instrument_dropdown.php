
<?php
$instra_dropdown = Make_GM_Instrument_List();
//show_array($instra_dropdown);

?>
<label for="categories">Instrument Groups: </label>
<select name="categories" id="categories">
<?php 
$numb = 0;
	foreach($instra_dropdown as $instrument_group_name => $instrument_group_array){ 
	echo '<option value="'.$numb.'">'.$instrument_group_name.'</option>';
	$numb ++;
	}
 ?>	
</select> 
<br />
<label for="items">Instruments: </label>
<select name="items" id="items">
<?php 
$numb = 0;
	foreach($instra_dropdown as $instrument_group_name => $instrument_group_array){
		foreach($instrument_group_array as $instrument_numb => $instrument){
	echo '<option class="'.$numb.'" value="'.$instrument_numb.'">'.$instrument.'</option> ';	
		}
	$numb ++;
	}
 ?>	
</select>
