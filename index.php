<?php 
include("./header.php");
include("./functions.php");
include("./arrays.php");
include("sonify.java");

foreach($_POST as $key => $selected){
	if(isset($selected)){
		$postdata["$key"] = $selected;
		}else{}
}
//$postdata["music_style"] = 'no';
//show_array($_POST);

$check1 = '';
$check2 = '';
if($_POST['dnaseq_radio'] == 'dnaseq_userInput'){
	$form_val_DNAseq_name = $_POST['DNAseq_name'];
	$form_val_dna_seq = $_POST['dna_seq'];
}else{
$form_val_DNAseq_name = 'Enter Name';
$form_val_dna_seq = 'GGGAAAGGGAAATTTCCCGGGAAAGGGAAATTTCCCGGGAAAGGGAAATTTCCCGGGAAAGGGAAATTTCCCGGG';
$check2 = 'checked="checked"'; // set defalt radio to random
}
?>
<fieldset>
	<form action="./read_fasta.php" method="post" >
	<?php include("form_audio_control.php"); ?>
    
    <fieldset class="fset2">
    	<div class="col_one">
        <input type="submit" value="Sonify" class="submitbutton2"/>
        </div>
        <div class="col_two">
        <span style="line-height:1.7">
        Apply the Sonification algorthm to the selected DNA sequence
        </ span>
        </div>
        <br style="clear: both;" /> <!-- Included to force the container to wrap the columns -->

       	</fieldset>

    </fieldset>

	<?php include("form_dna_seq_control.php"); ?>

	</form>
</fieldset>
<?php include("footer.php");?>

