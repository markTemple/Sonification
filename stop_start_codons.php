<?php

if(('TAA' == $codon) or ('TGA' == $codon) or ('TAG' == $codon)){
	$STOP_count = 	1;
	$START_count = 	0;
	$codon_type = 	'STOP';
	$on_vol = 		'127';//highlight first STOP codon as red
	$off_vol = 		'1';	
	$frame_note_data["$rf_numb"]["$c_numb"]['STOP_count']       = 	$STOP_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['START_count']      = 	$START_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_type']       = 	$codon_type;
	$frame_note_data["$rf_numb"]["$c_numb"]['on_vol']           = 	$on_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['off_vol']          = 	$off_vol;

	$frame_note_data["$rf_numb"]["$c_numb"]['codon_formated']   =	'<font color="red">'.$codon.'</font>'.'|';
	$frame_note_data["$rf_numb"]["$c_numb"]['note_formated']    = 	'<font color="red">'.$note_dot.'</font>'.'|';
 	$frame_note_data["$rf_numb"]["$c_numb"]['textCol']          = 	'red';       
                
	$track_header['all_note_string']["$c_numb"] .= '<font color="red">'.'.'.'</font>'; 	
}
elseif('ATG' == $codon){
	$STOP_count = 	0;
	$START_count = 	1;
	$codon_type = 	'START';
	$on_vol = 		'127';
	$off_vol = 		'2';	
	$frame_note_data["$rf_numb"]["$c_numb"]['STOP_count'] = 	$STOP_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['START_count'] = 	$START_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_type'] = 	$codon_type;
	$frame_note_data["$rf_numb"]["$c_numb"]['on_vol'] = 		$on_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['off_vol'] = 		$off_vol;
        
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_formated'] =	'<font color="#0000FF">'.$codon.'</font>'.'|';
	$frame_note_data["$rf_numb"]["$c_numb"]['note_formated'] = 	'<font color="#0000FF">'.$note_dot.'</font>'.'|';		
	$frame_note_data["$rf_numb"]["$c_numb"]['textCol'] = 		'darkgreen';
	
	$track_header['all_note_string']["$c_numb"] .= '<font color="#0000FF">'.$codon_data_arrays['note_1chr'].'</font>'; 	
}
elseif(($STOP_count >=1) and ($STOP_count <= 9)){
	$STOP_count		++;		
	$codon_type = 	'passed STOP';
	$on_vol = 		'3';	
	$frame_note_data["$rf_numb"]["$c_numb"]['STOP_count'] = 	$STOP_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_type'] = 	$codon_type;
	$frame_note_data["$rf_numb"]["$c_numb"]['on_vol'] = 		$on_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['off_vol'] = 		$off_vol;
	
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_formated'] =	'<font color="red">'.$codon.'</font>'.'|';
	$frame_note_data["$rf_numb"]["$c_numb"]['note_formated'] = 	'<font color="red">'.$note_dot.'</font>'.'|';
	$track_header['all_note_string']["$c_numb"] .= '<font color="red">'.'.'.'</font>'; 	

	if($STOP_count == 10){
//		$STOP_count = 	$track_header['STOP_count'];
//		$codon_type = 	$track_header['codon_type'];		
		$on_vol = 		$track_header['on_vol'];
		$off_vol = 		$track_header['off_vol'];
		
	}else{}
	//$frame_note_data["$rf_numb"]["$c_numb"]['textCol'] = 		'red';
	
}
elseif(($START_count >=1) and ($START_count <= 9)){
	$START_count	++;
	$codon_type = 	'passed START';
	$on_vol = 		'127';
	$off_vol = 		'81';	
	$frame_note_data["$rf_numb"]["$c_numb"]['START_count'] = 	$START_count;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_type'] = 	$codon_type;
	$frame_note_data["$rf_numb"]["$c_numb"]['on_vol'] = 		$on_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['off_vol'] = 		$off_vol;
	$frame_note_data["$rf_numb"]["$c_numb"]['codon_formated'] =	'<font color="#0000FF">'.$codon.'</font>'.'|';
	$frame_note_data["$rf_numb"]["$c_numb"]['note_formated'] = 	'<font color="#0000FF">'.$note_dot.'</font>'.'|';
	$track_header['all_note_string']["$c_numb"] .= '<font color="#0000FF">'.$codon_data_arrays['note_1chr'].'</font>'; 	
	
	$frame_note_data["$rf_numb"]["$c_numb"]['textCol'] = 		'#0000FF';	
	if($START_count == 10){//silly can not be fulfiled!
//		$START_count = 	$track_header['START_count'];
//		$codon_type = 	$track_header['codon_type'];
		$on_vol = 		$track_header['on_vol'];
		$off_vol = 		$track_header['off_vol'];
	}else{}

}

else{
	$track_header['all_note_string']["$c_numb"] 	.= '<font color="black">'.$codon_data_arrays['note_1chr'].'</font>'; 	
	
	//$frame_note_data["$rf_numb"]["$c_numb"]['on_vol'] = $track_header['on_vol'];
	//$frame_note_data["$rf_numb"]["$c_numb"]['off_vol'] = $track_header['off_vol'];

}

?>





