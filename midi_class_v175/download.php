<?php
if (isset($_GET['f'])){
	
	require('./classes/midi.class.php');
	
	$srcFile = $_GET['f'];
	$destFilename  = 'output.mid';
	
	$midi = new Midi();
	$midi->downloadMidFile($destFilename, $srcFile);
}
?>