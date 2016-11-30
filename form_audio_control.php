
	<input name="tracks" type="hidden" value="1" />
	<input name="start_track" type="hidden" value="0" />
	<input name="TrkEnd" type="hidden" value="5000" />
	<input name="chunks" type="hidden" value="5" />
	<input name="division" type="hidden" value="480" />
	<input name="off_vol" type="hidden" value="80" />		
	<input name="on_vol" type="hidden" value="127" />		
	<input name="dnaseq_radio" type="hidden" value="<?php echo $_POST['dnaseq_radio']?>" />		

    <input name="scale" type="hidden" value="blues" />
    <input name="key2play" type="hidden" value="0" />
    <input name="quantize" type="hidden" value="do_not_adjust" />
    <input name="music_style" type="hidden" value="no" />
    <input name="instra_groups_1" type="hidden" value="0" />
    <input name="Instrument_Frame_1" type="hidden" value="0" />
    <input name="instra_groups_2" type="hidden" value="3" />
    <input name="Instrument_Frame_2" type="hidden" value="25" />
    <input name="instra_groups_3" type="hidden" value="2" />
    <input name="Instrument_Frame_3" type="hidden" value="17" />
    <input name="tempo" type="hidden" value="500000" />
    <input name="duration_ratio" type="hidden" value="0.25" />
    <input name="t2t_factor" type="hidden" value="1" />

<a href="#" style="text-decoration:none" onClick="toggle_it('audiocont')"><small><input type="button" value="Show/Hide +/-" class="submitbutton"/></small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b class="big">Select/change sonification properties</b>

<br />
<div id="audiocont" name="txt strings" style="display:inline;">
<br />


<div class="col_one">
	<b>Sonification Algorithm</b><hr />
	<?php 	$frameNum = make_frameNum();
	//makeSelectBox
	makeRadioBoxes($frameNum, $postdata['frameNum'], '3', 'frameNum', 'frameNum_id', 'Algorithm: ');
	?>
</div>   
<div class="col_two">
	<b>Sonification Algorithm help</b><hr />
 <span style="line-height:1.7">
    <b>*</b>A degenerate algorithm that generates 20 distinct notes from each of 3 frames (3 instruments). <br />
   	Similar to above except that it generates 20 notes from the 1st frame only (1 instruments).  <br />
    A non-degenerate algorithm that generates 64 notes from the 1st frame (1 instrument). <br />
    A non-degenerate algorithm that generates 16 notes from from 2 frames, not biologically relevant. <br />
    A non-degenerate algorithm that generates 16 notes from from 1 frame, not biologically relevant. <br />
    A non-degenerate algorithm that generates 4 notes, 1 from each nucleotide, not biologically relevant</span>
<br /><br />
</div>
<br style="clear: both;" /> <!-- Included to force the container to wrap the columns -->

<div class="col_one">
    <b>Start/Stop codons</b><hr />   
<?php 	$stopstart = make_stopstart();
		makeRadioBoxes($stopstart, $postdata['stopstart'], 'strict', 'stopstart', 'stopstart_id', 'Select: ');?>
		<br />
</div>   
<div class="col_two">
<b>Start/Stop codons help</b> (<b>*</b>Only relevant for the 'Reading frame codons' option).<hr />  
 <span style="line-height:1.7">
No audio is generated in either frame until an ATG codon is detected. Silence follows a STOP codon.<br />
Each frames is audible until a STOP codon occurs, ATG restarts the frames audio. <br />
Each frames is audible until a STOP codon occurs, audio resrarts after 10 bases or ATG is passed<br />
Each frame is audible for the duration of the sequence, regardless of STOP or START (ATG) codons</span>
</div>
<br style="clear: both;" /> <!-- Included to force the container to wrap the columns -->
  
<div class="col_one">        
<b>Highlight STOP START Codons</b><hr /> 
<?php 	$sonify_motif = make_sonify_motif();
makeRadioBoxes($sonify_motif, $postdata['sonify_motif'], 'no', 'sonify_motif', 'sonify_motif_id', 'Percussion: ');?>
<?php /*?><br />
<b>Audio for each Reading Frame</b><hr />
<?php 
	$instra_dropdown = Make_GM_Instrument_List();
	makeSelectBox_catagory ($instra_dropdown, $postdata['instra_groups_1'], '0', 'instra_groups_1', 'categories1', 'Frame1:');
	echo '<br />';
	makeSelectBox_item ($instra_dropdown, $postdata['Instrument_Frame_1'], '0', 'Instrument_Frame_1', 'items1', 'Audio1:');
	echo '<br />';
	echo '<br />';
	makeSelectBox_catagory ($instra_dropdown, $postdata['instra_groups_2'], '3', 'instra_groups_2', 'categories2', 'Frame2:');
	echo '<br />';
	makeSelectBox_item ($instra_dropdown, $postdata['Instrument_Frame_2'], '25', 'Instrument_Frame_2', 'items2', 'Audio2:');
	echo '<br />';
	echo '<br />';
	makeSelectBox_catagory ($instra_dropdown, $postdata['instra_groups_3'], '2', 'instra_groups_3', 'categories3', 'Frame3:');
	echo '<br />';
	makeSelectBox_item ($instra_dropdown, $postdata['Instrument_Frame_3'], '17', 'Instrument_Frame_3', 'items3', 'Audio3:');
?><?php */?>
</div>   
<div class="col_two">
<b>Highlight STOP START Codons help</b><hr /> 
<span style="line-height:1.7">
Sonify START codon (ATG) with an Electric Snare and sonify STOP codons; TGA with a Crash Cymbal, TAA with a Chinese Cymbal and TAG with the Ride-Bell (Not relevant for the Di/Mono-nucleotide algorthms)
</ span>
</div>
<br style="clear: both;" /> <!-- Included to force the container to wrap the columns -->
</div>
<br /><!--to allow for IE doing stupid spacing between feildset and buttons-->