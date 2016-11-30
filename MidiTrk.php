<?php
$MidiTrk = makeMIDIheader(
	$track_header['tracks'], 
	$tracks_for_midi_header,
	$track_header['division'], 
	$track_header['tempo'], 
	$track_header['TrkEnd'], 
	$track_header['start_track']);

foreach($frame_note_data as $rf_numb => $array){
	$start_track = 	$track_header['start_track'];	
	$rf = 			$mididata["$rf_numb"]['reading_frame'];
	$on_vol = 		$track_header['on_vol'];
	$instr_numb = 	$mididata["$rf_numb"]['instr_numb'];
	$channel_numb = 	$mididata["$rf_numb"]['channel_numb'];
	
	// IMPORTAMT
	$channel_numb = intval($channel_numb);
	//dump($channel_numb);
	
	$MidiTrk .= "MTrk"."\n";
	$MidiTrk .= $start_track." Meta Text ".$rf."\n";
	$MidiTrk .= $start_track." Par ch=".$channel_numb." c=6 v=".$on_vol."\n"; 
	$MidiTrk .= $start_track." Pb ch=".$channel_numb." v=".$on_vol."\n";  
	$MidiTrk .= $start_track." PrCh ch=".$channel_numb." p=".$instr_numb."\n"; 
		
	foreach($array as $c_numb => $codon_data_arrays){
		$start_note = 	$codon_data_arrays['play_note'];
		$stop_note = 	$codon_data_arrays['stop_note'];
		$on_vol = 		$codon_data_arrays['on_vol'];
		$off_vol = 		$codon_data_arrays['off_vol'];
		$note_numb = 	$codon_data_arrays['note_numb'];

//$MidiTrk_array[] = array($start_note =>" On ch=".'10'." n=".'57'." v=".'110'."\n");
//$MidiTrk_array[] = array($stop_note =>" Off ch=".'10'." n=".'57'." v=".'110'."\n");
					
		$MidiTrk_array[] = array($start_note =>" On ch=".$channel_numb." n=".$note_numb." v=".$on_vol."\n");
		$MidiTrk_array[] = array($stop_note =>" Off ch=".$channel_numb." n=".$note_numb." v=".$off_vol."\n");
	}
	foreach($MidiTrk_array as $i => $v){
		foreach($v as $i2 => $v2){
		$arrah[$i2] = $v2;
		}
	}
	ksort(&$arrah);
	foreach($arrah as $i2 => $v2){
		$MidiTrk .= $i2.$v2;
	}
	$stop_note = $stop_note + $track_header['duration'];
	$MidiTrk .= $stop_note." Meta TrkEnd"."\n";
	$MidiTrk .= "TrkEnd"."\n";
	unset($MidiTrk_array);
	unset($arrah);	
}
//echo '<pre>'.$Motif_Trk.'<pre>';///////////////////////////////////
?> 
