<header>
<title>base64convert.php</title>
</header>

<br />

<?PHP
$bas64MIDfile =(base64_encode(file_get_contents("_HumanTelomericDNA.mid" )));
echo $bas64MIDfile;

?>