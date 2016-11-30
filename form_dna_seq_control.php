<?php 
if($_POST['dnaseq_radio'] == 'dnaseq_userInput'){
$check1 = 'checked="checked"';
$display_dnaseq_userInput = 'inline';
}else{
$display_dnaseq_userInput = 'none';
}

if($_POST['dnaseq_radio'] == 'makerandom'){
$check2 = 'checked="checked"';
$display_makerandom = 'inline';
}else{
$display_makerandom = 'none';
}

if($_POST['yeastdnaSeqs_or_Predefined'] == 'Predefined'){
$display_Predefined = 'inline';
}else{
$display_Predefined = 'none';
}

if($_POST['yeastdnaSeqs_or_Predefined'] == 'yeastdnaSeqs'){
$display_yeastdnaSeqs = 'inline';
}else{
$display_yeastdnaSeqs = 'none';
}

if($_POST['yeastdnaSeqs_or_Predefined'] == ''){
$display_makerandom = 'inline';
}
if($_POST['yeastdnaSeqs_or_Predefined'] == ''){
$display_Predefined = 'inline';
}

?>

<fieldset>
<a href="#" style="text-decoration:none" onClick="toggle_it('RandomDnaSeqs')"><small><input type="button" value="Show/Hide +/-" class="submitbutton"/></small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b class="big">Generate random sequence</b><br />
<div id="RandomDnaSeqs" name="Make randon seq" style="display:<?php echo $display_makerandom;?>;"><br />
    <div class="col_one_dna_name_radiolist">
    <input name="dnaseq_radio" type="radio" value="makerandom" <?php echo "$check2";?>/> Make random sequence
    </div>	
<div>
<input name="numbCodons" type="text" value="64" maxlength="2"/> Enter between 3 to 99 codons (1 codon = 3 bp)</div>		
</div>
</fieldset>

<fieldset>
<?php include("DNA_strings.php");?>

<a href="#" style="text-decoration:inline" onClick="toggle_it('Predefined')"><small><input type="button" value="Show/Hide +/-" class="submitbutton"/></small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b class="big">Predifined DNA seq</b>
<br />
<div id="Predefined" name="test dna strings" style="display:<?php echo $display_Predefined;?>;">
<br />

	<?php 
	foreach($DNA_strings as $v){
		$check = '';
		if(($v['0']  == $_POST['DNAseq_name']) and ($_POST['dnaseq_radio'] !== 'dnaseq_userInput')){
			$check = 'checked="checked"';
		}	
	?>
	
	<div class="col_one_dna_name_radiolist">
	<input name="dnaseq_radio" type="radio" value="<?php echo $v['0'].'|'.$v['1'].'|'.'Predefined';?>" 
	<?php echo $check;?> />
	<?php echo $v['0'];	?>
	</div>
	
	<div class="col_two_note_table">
	<?php echo shorten($v['1'], $v['2'], 75);?>
	</div>
	<br />
	<?php
	}
	?>
</div>
</fieldset>

<fieldset>
<a href="#" style="text-decoration:none" onClick="toggle_it('PasteDnaSeqs')"><small><input type="button" value="Show/Hide +/-" class="submitbutton"/></small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b class="big">Paste a DNA sequence</b>
<br />
<div id="PasteDnaSeqs" name="Paste DNA" style="display:<?php echo $display_dnaseq_userInput;?>;">
<br />
	<div class="col_one_dna_name_radiolist">
	<input name="dnaseq_radio"  id="" type="radio" value="dnaseq_userInput" <?php echo "$check1";?>/>
	Enter DNA seq 5'=>3'
	</div>	
	<div>
	<input name="DNAseq_name" type="text" value="<?php echo $form_val_DNAseq_name;?>" size="30" maxlength="100"/>
	</div>
	<div class="col_one_dna_name_radiolist">
	&nbsp;
	</div>	
	<div class="col_two_note_table">
	<textarea name="dnaseq_userInput"><?php echo $form_val_dna_seq;?></textarea>
	</div>
</div>
</fieldset>

<fieldset>
<a href="#" style="text-decoration:none" onClick="toggle_it('yeastdnaSeqs')"><small><input type="button" value="Show/Hide +/-" class="submitbutton"/></small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b class="big">Yeast DNA sequences</b>
<br />

<div id="yeastdnaSeqs" name="ribosomal DNA sequences" style="display:<?php echo $display_yeastdnaSeqs;?>;">
	<?php include("rna_coding.php");?>
</div>
</fieldset>
