<?php
include("./functions.php");
include("./arrays.php");

if(isset($_POST['dna_seq'])){
	$dna_seq = $_POST['dna_seq'];
}else{
	include("./verify_sequence.php");
}
if($flag === 'notok'){
	header("Location: error.php?msg=$msg");
}else
{ //run page below

//dump($_POST);

include("./header.php");
include("./sonify.java");

$track_header = makeTrackHeader();
$mididata = makeMididataArray();

//show_array($track_header);
//show_array($mididata);


foreach($_POST as $key => $selected){// put in to function avoid repitition
	if(isset($selected)){
		$postdata["$key"] = $selected;
		}else{}
}
//$postdata["music_style"] = 'Default';


$dna_seq = truncate_string($dna_seq, 10000);

if($_POST['frameNum'] == '3'){
	$codon 							= make3frames($dna_seq);
	$seq2note_algorithm 			= 'Make_codon2noteArray_scale';
	$track_header['this2next'] 		= $track_header['this2next'];
	$len_bp2sonify = 3;
	$numb_of_RFs = 3;
}
elseif($_POST['frameNum'] == '1'){
	$codon 							= makeprotein($dna_seq);
	$seq2note_algorithm 			= 'Make_codon2noteArray_scale';
	$track_header['this2next'] 		= $track_header['this2next'] * 0.5;
	$len_bp2sonify = 3;
	$numb_of_RFs = 1;
}
elseif($_POST['frameNum'] == '1bp'){
	$codon 							= make_1BP($dna_seq);
	$seq2note_algorithm 			= 'Make_monoBP_2noteArray_scale';
	$track_header['this2next'] 		= $track_header['this2next'] * 0.5;	
	$len_bp2sonify = 1;
	$numb_of_RFs = 1;
}
elseif($_POST['frameNum'] == '2bp'){
	$codon 							= make_2BP($dna_seq);
	$seq2note_algorithm 			= 'Make_diBP_2noteArray_scale';
	$track_header['this2next'] 		= $track_header['this2next'] * 0.5;	
	$len_bp2sonify = 2;
	$numb_of_RFs = 1;
}
elseif($_POST['frameNum'] == '2bpx2'){
	$codon 							= make_2BPx2($dna_seq);
	$seq2note_algorithm 			= 'Make_diBP_2noteArray_scale';
	$track_header['this2next'] 		= $track_header['this2next'];
	$len_bp2sonify = 2;
	$numb_of_RFs = 2;
}
elseif($_POST['frameNum'] == '3bp'){
	$codon 							= make_3BP($dna_seq);
	$seq2note_algorithm 			= 'Make_triBP_2noteArray_scale';
	$track_header['this2next'] 		= $track_header['this2next'] * 0.5;	
	$len_bp2sonify = 3;
	$numb_of_RFs = 3;// add another catogory 1 rf all codons
}

$motif2note = make_motif_array();//makes purcussive array sn/cy change to 3 nuc options only


if( $postdata['frameNum'] == '3' || $postdata['frameNum'] == '1' || $postdata['frameNum'] == '3bp' ) { 
	$motif_position1 = identifyMotif($dna_seq, $motif2note);//new
}


if(! empty($motif_position1)) {
	$Motif_key = $numb_of_RFs+1;
	//if(! empty($motif_position))$numb_of_RFs = $numb_of_RFs+1; //very confusing
	//echo $numb_of_RFs;
	//dump($motif2note);
	//dump($motif_position);
	
	ksort($motif_position1);
	$motif_position[0] = $motif_position1;
	//dump($motif_position);
	foreach($motif_position as $motif){
	$keys[] = array_keys($motif);
	}
	//dump($keys[0]);
	//dump($motif_position);
	
	$first = 1;
	$dna_len = strlen($dna_seq);
	$count = count($keys[0]);
	foreach($keys as $v){
		foreach($v as $motifStartBP){
			$lastDash = $motif_position[0][$motifStartBP]['lastDash'];
			$motifseq = $motif_position[0][$motifStartBP]['codon'];
			$startNext = $motif_position[0][$motifStartBP]['startNext'];
			$len_bp2sonify = $motif_position[0][$motifStartBP]['len_bp2sonify'];
			
			$verylast = $startNext;
			
			if($first === 1){//first
				for ($x = 1; $x <= $lastDash; $x ++) {
					$dashes .= '-';
				}
			}else{}
			
			if(($first !== 1) and ($count >= $first)){//in betweens
			for ($x = $next; $x <= $lastDash; $x ++) {
				$dashes .= '-';
			}
			}else{}
			
			if($count === $first){//last 
			//echo 'only once!';
			//echo $next;
			//echo $dna_len;
			$lastdash = '';
			for ($x = $verylast; $x <= $dna_len; $x ++) {
				$endstring .= '-';
				}
			}else{}
			
			$first = $first+1;
			$next = $startNext;
	
			$dashes .= $motifseq;
			//echo $lastDash;
			$lastMotifStr = substr_replace("$dash_extend","$dashes", $lastDash);
			
			$dashes = '';
			$motifseq = '';
			$dash_extend = $lastMotifStr;
	
		}
	}
	$lastMotifStr .= $endstring;
	}else{
//echo 'No Motifs found';
}

$codon2note = makeCodon2note($mididata, $seq2note_algorithm, $numb_of_RFs);
//dump($codon2note);

$codon_plus_array = makeCodonPlus($codon, $codon2note);

unset($codon);
unset($codon2note);


if((! empty($motif_position1)) and ($_POST['sonify_motif'] == 'yes')){
//note this causes motif pos to be appended as array key 0 since rf are 1 (2,3) 
//make use of this to address motif data from array 0
$codon_plus_array2 = ($codon_plus_array + $motif_position);
}else{
$codon_plus_array2 = $codon_plus_array;
}


//dump($codon_plus_array2);
unset($codon_plus_array);

include("make_frame_note_data.php");
unset($codon_plus_array2);


//dump($frame_note_data);

foreach($frame_note_data as $array){
$count++;
}

//foreach($frame_note_data as $array){
//	foreach($array as $v){
//	echo $v['calculated c_numb'].' - '.($v['next_note']-$v['this_note']).' - '.($v['stop_note']-$v['next_note']).' - '.$v['note_numb'].' - '.$v['on_vol'].' - '.$v['off_vol'].' - '.$v['codon_type'];
//	echo '<br />';
//	}	
//	echo '<br />';
//}

$tracks_for_midi_header = $count+1;

include("MidiTrk.php"); 

//dump($track_header);

foreach($frame_note_data as $rf_numb => $array){
	$frame_note_data_chunks[] = array_chunk($array, '22');
}

$all_note_chunks[] = array_chunk($track_header['all_note_string'], '22');

foreach($all_note_chunks as $chunks){
	foreach($chunks as $chunk_numb => $v){
		foreach($v as $notes){
			$track_header['all_note_string_chunks']["$chunk_numb"] 	.= $notes.'|'; 	
		}
	}
}

foreach($frame_note_data_chunks as $rf_numb => $chunks){
$rf_numb++;
	foreach($chunks as $chunk_numb => $array){
		foreach($array as $c_numb => $codon_data_arrays){
			$mididata["$rf_numb"]['codon_string']["$chunk_numb"] 	.= 	$codon_data_arrays['codon_formated'];
			$mididata["$rf_numb"]['note_string']["$chunk_numb"] 	.= $codon_data_arrays['note_formated']; 

			$mididata["$rf_numb"]['protein_string']["$chunk_numb"] 	.= 	$codon_data_arrays['aa_formated'];/////////////////
			$mididata["$rf_numb"]['protein_note_string']["$chunk_numb"] 	.= $codon_data_arrays['protein_note_formated']; 

			$mididata["$rf_numb"]['1bp_formated']["$chunk_numb"] 	.= 	$codon_data_arrays['1bp_formated'];/////////////////

		}
	}
	$codon_str_table["$rf_numb"] = implode('<br />', $mididata["$rf_numb"]['codon_string']);
	$note_str_table["$rf_numb"] = implode('<br />', $mididata["$rf_numb"]['note_string']);

	$protein_str_table["$rf_numb"] = implode('<br />', $mididata["$rf_numb"]['protein_string']);////////////
	$protein_note_str_table["$rf_numb"] = implode('<br />', $mididata["$rf_numb"]['protein_note_string']);////////////
	
	$monobp_formated_str_table["$rf_numb"] = implode('<br />', $mididata["$rf_numb"]['1bp_formated']);
	
}
	$allNote = implode('<br />', $track_header['all_note_string_chunks']);

?>
<fieldset>
<form method="post" name="form">
<?php 
include("form_audio_control.php"); 
playMidi($MidiTrk);//works to write  MID file to tmp directory
$text_strings = makeTextstrings($dna_seq, $textCapture);
$bas64MIDfile =
(base64_encode(file_get_contents("./midi_class_v175/tmp/testMIDI.mid" )));

?> 
<fieldset class="fset2">
<div class="col_one">
<input name="dna_seq" type="hidden" value="<?php echo $dna_seq ;?>" />
<input name="DNAseq_name" type="hidden" value="<?php echo $_POST['DNAseq_name']; ?>" />
<input name="yeastdnaSeqs_or_Predefined" type="hidden" value="<?php echo $yeastdnaSeqs_or_Predefined ;?>" />
<input type="submit" name="submit1" value="Re-Sonify" 
class="submitbutton2" onClick="javascript: form.action='read_fasta.php';" />
</div>
<div class="col_two">
<span style="line-height:1.7">
Make changes above then re-sonify the same DNA sequence<br />
</span>
</div>
<br style="clear: both;" /> <!-- Included to force the container to wrap the columns -->
<div class="col_one">
<input type="submit" name="submit2" value="Choose different DNA sequence" 
class="submitbutton2" onClick="javascript: form.action='index.php';" />
</div>
<div class="col_two">
<span style="line-height:1.7">
Choose different DNA sequence to sonify using the chosen options<br />
</span>
</div>
<br style="clear: both;" /> <!-- Included to force the container to wrap the columns -->
</fieldset>

<?php 
//show_array($_POST);
//exec("timidity ./midi_class_v175/tmp/testMIDI.mid -Ow -o - | lame - -b 64 ./midi_class_v175/tmp/testMIDI.mp3");
//echo "timidity ./midi_class_v175/tmp/testMIDI.mid -Ow -o - | lame - -b 64 ./midi_class_v175/tmp/testMIDI.mp3";
//echo exec("ls ./midi_class_v175/tmp/*.mp3");
?>  
</form>
<!--<audio controls>
  <source src="./midi_class_v175/tmp/testMIDI.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<br />
-->
<br />
<b>LISTEN TO SONIFIED DNA SEQUENCE</b><hr /> 
<div class="col_one">

<?php include("./JZZ_PlayMidiFile.php"); ?>
</div>

<div class="col_one">
<span style="line-height:2.2">
Click to <b>Play/Pause/Rewind</b> the Sonified audio
</span>
</div>
<div class="col_one">
<INPUT class="submitbutton2" Type="BUTTON" Value="Reset All" Onclick="window.location.href='./index.php'">    Go to HomePage/Reset default
</div>
<br style="clear: both;" /> <!-- Included to force the container to wrap the columns -->
<hr /> 
</fieldset>

<fieldset>
<a href="#" style="text-decoration:none" onClick="toggle_it('audiotable')"><small>
<input type="button" value="Show/Hide +/-" class="submitbutton"/>
</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b class="big">Summary of sonified audio</b>
<br />
<div id="audiotable" name="sonified sequence table" style="display:inline;">
<br />

<table class="box-table-a" summary="DNA reading frames">
<caption align="bottom"></caption>

<tr>
	<th scope="col" width="200px"></th>
	<th align="left" width="800px">Audio generated from <b><?php echo $_POST['DNAseq_name']; ?></b>
	</th>
</tr>    
<tr>
	<th scope="col">All Instrument Notes</th>
	<td align="left" class="col_two_note_table"><?php echo $allNote; ?>
	</td>

</tr>
	<?php
	$rf_numb_count = array(1, 2, 3);
	$pair_count = array(1, 2);
	
	if($_POST['frameNum'] === '3'){
		foreach($rf_numb_count as $rf){
	?>	
<tr>
	<th scope="col" width="200px"><?php echo $mididata["$rf"]['reading_frame']; ?></th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $codon_str_table["$rf"]; ?>
	</td>
</tr>
<tr>
	<th scope="col" width="200px"><?php echo $mididata["$rf"]['instrument_name']; ?></th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $note_str_table["$rf"]; ?>
	</td>
</tr>
	<?php 
		$textCapture[] =array($mididata["$rf"]['reading_frame'], $mididata["$rf"]['instrument_name']);
		}	
	?>	


</table>

	<?php
	}
	elseif($_POST['frameNum'] === '1'){
	?>	
			
<tr>
	<th scope="col" width="200px">DNA sequence</th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $codon_str_table['1'];?></td>
</tr>
<tr>
	<th scope="col" width="200px"><?php echo $mididata['1']['reading_frame']; ?></th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $protein_str_table['1']; ?></td>
</tr>
<tr>
	<th scope="col" width="200px"><?php echo $mididata['1']['instrument_name']; ?></th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $protein_note_str_table['1']; ?></td>
</tr>
</table>

	<?php
		$textCapture[] =array($mididata['1']['reading_frame'], $mididata['1']['instrument_name']);
	}
	elseif($_POST['frameNum'] === '1bp'){
	$gap = "G";
	?>	

<tr>
	<th scope="col" width="200px">DNA sequence</th>
	<td align="left" width="800px" class="col_two_note_table" ><?php echo $monobp_formated_str_table['1']; ?></td>
</tr>

<tr>
	<th scope="col" width="200px"><?php echo $mididata['1']['instrument_name']; ?></th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $protein_note_str_table['1']; ?></td>
</tr>
</table>

<?php
		$textCapture[] =array('"Mono-nucleotide sequence"', $mididata['1']['instrument_name']);
	
	}
	elseif($_POST['frameNum'] === '2bp'){
?>	
	
<tr>
	<th scope="col" width="200px">DNA sequence</th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $codon_str_table['1']; ?></td>
</tr>
<tr>
	<th scope="col" width="200px"><?php echo $mididata['1']['instrument_name']; ?></th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $protein_note_str_table['1']; ?></td>
</tr>
</table>

<?php
		$textCapture[] =array('"Di-nucleotide sequence"', $mididata['1']['instrument_name']);
	
	}
	elseif($_POST['frameNum'] === '2bpx2'){
		foreach($pair_count as $rf){
?>	
		
<tr>
	<th scope="col" width="200px"><?php echo $mididata["$rf"]['reading_frame']; ?></th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $codon_str_table["$rf"]; ?></td>
</tr>
<tr>
	<th scope="col" width="200px"><?php echo $mididata["$rf"]['instrument_name']; ?></th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $protein_note_str_table["$rf"]; ?></td>
</tr>
<?php
			$textCapture[] =array($mididata["$rf"]['reading_frame'], $mididata["$rf"]['instrument_name']);
		}	
?>	
<tr>
	<th scope="col">All Instrument Notes</th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $allNote; ?>
	</td>
</tr>
</table>

<?php
	}
	elseif($_POST['frameNum'] === '3bp'){
?>			

<tr>
	<th scope="col" width="200px">DNA sequence</th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $codon_str_table['1']; ?></td>
</tr>
<tr>
	<th scope="col" width="200px"><?php echo $mididata['1']['instrument_name']; ?></th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $protein_note_str_table['1']; ?>	</td>
</tr>
</table>

<?php
		$textCapture[] =array('"Tri-nucleotide sequence"', $mididata['1']['instrument_name']);
	}?>
</div>
</fieldset>

<fieldset>
<a href="#" style="text-decoration:none" onClick="toggle_it('txt01')"><small>
<input type="button" value="Show/Hide +/-" class="submitbutton"/>
</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b class="big">Summary of processed DNA sequence</b>
<br />
<div id="txt01" name="txt strings" style="display:inline;">
<br />
<table class="box-table-a" summary="DNA reading frames">
<caption align="bottom"></caption>
<tr>
	<th scope="col" width="1000">Summary of <b><?php echo $_POST['DNAseq_name']; ?></b> properties</th>
</tr>
<tr>
	<td align="left" width="1000" style="font-family:Arial, Helvetica, sans-serif"><?php	
	echo $text_strings['seq_length'].'<br />';
	echo $text_strings['GATC_content'].'<br />';
	echo $text_strings['gc_ratio'].'<br />';
	echo $text_strings['key_of_audio'];
	echo $text_strings['scale'].'<br />';
	//show_array($textCapture);
	$count = count($textCapture);
	echo 'This sequence was processed as <b>'.$count.'</b> reading frame(s).<br />';
	foreach($textCapture as $txt){
	echo 'This sequence was sonified as <b>'.$txt['0'].'</b> using the instrument <b>'.$txt['1'].'</b><br />';
	}	?>
	</td>
</tr>
</table>

<table class="box-table-a" summary="DNA reading frames">
<caption align="bottom"></caption>
<tr>
	<th scope="col" width="200px">Nucleotide sequence (5'=>3')</th>
	<td align="left" width="800px" class="col_two_note_table"><?php echo $text_strings['dna_seq']; ?>
	</td>
</tr>
</table>

<?php 
if(! empty($motif_position1)){
?>
	<table class="box-table-a" summary="DNA reading frames">
	<caption align="bottom"></caption>
	<tr>
		<th scope="col" width="200px">Motifs</th>
		<td align="left" width="800px" class="col_two_note_table">
		<?php 
		foreach($motif2note as $motif){
		$txtM .= $motif['2'].' (<b>'.$motif['1'].'</b>), ';
		}
		echo wraptxt($txtM, 75); 
		?>
		</td>
	</tr>
	</table>

	<table class="box-table-a" summary="DNA reading frames">
	<caption align="bottom"></caption>
	<tr>
		<th scope="col" width="200px">Summary of identified motifs</th>
		<td align="left" width="800px" class="col_two_note_table">
		<?php echo wraptxt($lastMotifStr, 66); ?>
		</td>
	</tr>
	</table>
	
	
	<table class="box-table-a" summary="DNA reading frames">
	<caption align="bottom"></caption>
	<?php
	
	$motif_string = found_motif_strings($dna_seq, $motif2note);
	ksort($motif_string);
	
		foreach($motif_string as $v){
		$numb++;
	?>
	<tr>
		<th scope="col" width="200px"><?php echo $numb; ?> <?php echo $v[0];?></th>
		<td align="left" width="800px" class="col_two_note_table">
		<?php //echo wraptxt($v[1], 66);
		//echo '<br />';
		echo wordwrap2($v[1], $width = 66, $break = "<br />", $html = "b") ;
	
		
		?>
		</td>
	</tr>
		<?php	
		}
		?>
	</table>
	<?php	
	}else{
	?>
	<table class="box-table-a" summary="DNA reading frames">
	<caption align="bottom"></caption>
	<tr>
		<th scope="col" width="200px">Summary of identified motifs</th>
		<td align="left" width="800px" class="col_two_note_table">
		No Mofifs Found
		</td>
	</tr>
	</table>
	<?php
}

?>
</div>
</fieldset>

<?php	
}
//echo '<pre>'.$MidiTrk.'<pre>';

//end of if ok run page
include("footer.php");
?>
