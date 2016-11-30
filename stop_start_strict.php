<?php

//	echo $_POST['stopstart'];

	if( ($_POST['stopstart'] == 'silent') and ($dna_seq_numb <=3)){
	//echo $dna_seq_numb;
		$STOP_count = 1;
	}


if(('TAA' == $codon) or ('TGA' == $codon) or ('TAG' == $codon)){
	$STOP_count = 	1;
	$START_count = 	0;
	$codon_type = 	'STOP';
	$on_vol = 		'10';//highlight first STOP codon as red
	$off_vol = 		'80';	
	$frame_note_data["$rf_numb"]["$c_numb"]['STOP_count']       = 	$STOP_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['START_count']      = 	$START_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_type']       = 	$codon_type;
	$frame_note_data["$rf_numb"]["$c_numb"]['on_vol']           = 	$on_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['off_vol']          = 	$off_vol;
        $frame_note_data["$rf_numb"]["$c_numb"]['off_vol']          =   $off_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_formated']   =	
        '<font color="red">'.$codon.'</font>'.'|';
	$frame_note_data["$rf_numb"]["$c_numb"]['note_formated']    = 	
        '<font color="red">'.$note_dot.'</font>'.'|';                
 	$frame_note_data["$rf_numb"]["$c_numb"]['textCol']          = 	'red';       
                
	$track_header['all_note_string']["$c_numb"] .= 
        '<font color="red">'.'.'.'</font>'; 	
	
        ////$frame_note_data["$rf_numb"]["$c_numb"]['instrument']   = 	'47';//Timpani
        //need to preload single note and have this on call to play repeat for ATG???

}
elseif('ATG' == $codon){
	$STOP_count = 	0;
	$START_count = 	1;
	$codon_type = 	'START';
	$on_vol = 		'127';
	$off_vol = 		'80';	
	$frame_note_data["$rf_numb"]["$c_numb"]['STOP_count'] = 	$STOP_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['START_count'] = 	$START_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_type'] = 	$codon_type;
	$frame_note_data["$rf_numb"]["$c_numb"]['on_vol'] = 		$on_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['off_vol'] = 		$off_vol;
        
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_formated'] =	'<font color="#0000FF">'.$codon.'</font>'.'|';
	$frame_note_data["$rf_numb"]["$c_numb"]['note_formated'] = 	'<font color="#0000FF">'.$note_dot.'</font>'.'|';		
	$track_header['all_note_string']["$c_numb"] .= '<font color="#0000FF">'.$codon_data_arrays['note_1chr'].'</font>'; 	
	
	$frame_note_data["$rf_numb"]["$c_numb"]['textCol'] = 		'darkgreen';

}
//elseif(($STOP_count >=1) and ($STOP_count <= 15)){
elseif($STOP_count == 1){
	//$STOP_count		++;		
	$codon_type = 	'passed STOP';
	$on_vol = 		'10';
	$off_vol = 		'80';	
	$frame_note_data["$rf_numb"]["$c_numb"]['STOP_count'] = 	$STOP_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_type'] = 	$codon_type;
	$frame_note_data["$rf_numb"]["$c_numb"]['on_vol'] = 		$on_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['off_vol'] = 		$off_vol;
	
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_formated'] =	
        '<font color="red">'.$codon.'</font>'.'|';
	$frame_note_data["$rf_numb"]["$c_numb"]['note_formated'] = 	
        '<font color="red">'.$note_dot.'</font>'.'|';
	$track_header['all_note_string']["$c_numb"] .= 
        '<font color="red">'.'.'.'</font>'; 	

	//$frame_note_data["$rf_numb"]["$c_numb"]['textCol'] = 		'red';
	
}
elseif($START_count == 1){
	$codon_type = 	'passed START';
	$on_vol = 		'127';
	$off_vol = 		'80';	
	$frame_note_data["$rf_numb"]["$c_numb"]['START_count'] = 	$START_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_type'] = 	$codon_type;
	$frame_note_data["$rf_numb"]["$c_numb"]['on_vol'] = 		$on_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['off_vol'] = 		$off_vol;
	
	
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_formated'] =	
        '<font color="#0000FF">'.$codon.'</font>'.'|';
	$frame_note_data["$rf_numb"]["$c_numb"]['note_formated'] = 	
        '<font color="#0000FF">'.$note_dot.'</font>'.'|';
	$track_header['all_note_string']["$c_numb"] .= 
        '<font color="#0000FF">'.$codon_data_arrays['note_1chr'].'</font>'; 	
	
	$frame_note_data["$rf_numb"]["$c_numb"]['textCol'] = 		'#0000FF';

}

else{
	$track_header['all_note_string']["$c_numb"] 	.= '<font color="black">'.$codon_data_arrays['note_1chr'].'</font>'; 	
	
	$frame_note_data["$rf_numb"]["$c_numb"]['on_vol'] = $track_header['on_vol'];
	//$frame_note_data["$rf_numb"]["$c_numb"]['on_vol'] = $track_header['off_vol'];

}

?>





