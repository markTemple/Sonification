<?php 
include("header.php");
include("./functions.php");
?>
<h1>Examples of Sonification as a Science tool</h1>
<p>The following examples show how the sonification tool can be used to identify the characteristics of genomic DNA sequences
</p>	
<fieldset>
<h2>Human Telomeric DNA </h2>
<p>Human DNA sequence that consists of tandem arrays of the hexanucleotide sequence (TTAGGG)n, for example: 
</p>
<?php 
$txt = wraptxt('TTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGAGTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTTAGGGTGTTAGGGTTAGGGTTAGGG', 60);
echo '<p class="DNA_seq">' .$txt . '</p>';
echo '<h2>Play sonified Human Telomeric DNA sequence</h2>';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/telomeric_seq.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo 'The audio from this sequence is highly repetitive and repeats approximately every 6 bases. This sequence was sonified using the "reading frame algorithm" that reads groups of three (3) bases at a time (as triplets) hence after TWO sets of triplets the notes repeat. Notice the change in the repetitive sound that occurs at approx 13 sec that reflects a subtle change in the DNA sequence at bp 79 (insertion of AG in place of T) in addition to a change at 41 sec (due to the insertion of TG). This is clearly apparent in the sonification but not so apparent by visual inspection of the sequence';
echo '</fieldset>';
echo '<br />';
echo 'Sequence data published by: <br />';
echo '<i>Moyzis, R. K., J. M. Buckingham, et al. (1988). "A highly conserved repetitive DNA sequence, (TTAGGG)n, present at the telomeres of human chromosomes." PNAS. 85, 6622-6626.</i>';
echo '</fieldset>';
?>

<fieldset>
<h2>Alphoid Repetitive DNA </h2>
<p>Human DNA sequence that consists of tandem arrays of the pentanucleotide sequence (CCATT)n, for example: 
</p>
<?php 
$txt = wraptxt('CCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTCCATTATAGTCCATTCCATTCCATTCCATTCCATTCAATTCCATTCCATTACAATTCGTTCCATTCCATTCTATTCCGTACCATTCGATTCCATTCCATACCATCCATTCCATTCCATTCCATTCATTCCATTCCGTTCCATTCCGTTCATTCATTCATTCCATTCTATTCGGATTAATTCCAATCTATTCCATTCATTGCATTCTATTCCATTCCATTGCAATCGAGTTGAATACATTGCATTCTATTCATTCATTCATTCCATTCCATTCCGGAAGATTA
', 50);
echo '<p class="DNA_seq">' .$txt . '</p>';
echo '<h2>Play sonified Alphoid sequence</h2>';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/alphoid.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo 'The audio from this sequence is clearly repetitive but notice that the audio sound is more complex than the previous telomeric DNA sequence. This is because the sequence repeats approximately every 5 bases whereas the "reading frame algorithm" reads groups of three bases at a time, hence the melody repeats every 15 bases, that is FIVE sets of triplets occur before the notes repeat. The first 17 sec (100 bp) is a synthetic alphoid sequence that is purly repetitive with no sequence variation. Following this an actual alphoid repetitive sequence in that contains sequence variations that are clearly audable';
echo '</fieldset>';
echo '<br />';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/alphoid_2.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo 'This audio was generated from the same alphoid DNA sequence using the "Di-nucleotide pairs" algorithm, this simpler algorithm works well for the repetitive DNA. Again note the first 17 sec is purly repetitive with no sequence variation whereas the actual alphoid repetitive sequence that follows contains sequence variations that are clearly audable';
echo '</fieldset>';
echo 'Sequence data taken from: <br />';
echo '<i>Pfütz M., Gileadi O. et al. (1992) "Identification of human satellite DNA sequences associated with chemically resistant nonhistone polypeptide adducts." Chromosoma 101, 609-617.</i>';
echo '</fieldset>';
?>

<fieldset>
<h2>Alu repeat DNA </h2>
<p>Human DNA sequence of approx. 300 bp that occurs frequently in the genome: 
</p>
<?php 
$txt = wraptxt('GCCGGGCGCGGTGGCGCGTGCCTGTAGTCCCAGCTACTCGGGAGGCTGAGGCTGGAGGATCGCTTGAGTCCAGGAGTTCTGGGCTGTAGTGCGCTATGCCGATCGGGTGTCCGCACTAAGTTCGGCATCAATATGGTGACCTCCCGGGAGCGGGGGACCACCAGGTTGCCTAAGGAGGGGTGAACCGGCCCAGGTCGGAAACGGAGCAGGTCAAAACTCCCGTGCTGATCAGTAGTGGGATCGCGCCTGTGAATAGCCACTGCACTCCAGCCTGGGCAACATAGCGAGACCCCGTCTCT
', 60);
echo '<p class="DNA_seq">' .$txt . '</p>';
echo '<h2>Play sonified Alu sequence</h2>';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/Alu.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo 'Alu elements are thought to be derived from the 7SL RNA gene and sequencing of the human genome has revealed that there are more than 1 million copies of these elements dispersed throughout the human genome. Unlike simple tandem repeat, such as the telomeric or alphoid DNA repeats shown above, the Alu  sequences are more complex and subsequently the sonification of these produces a complex audio pattern. This sequence was sonified using the "reading frame algorithm"';
echo '</fieldset>';
echo 'Sequence data taken from: <br />';
echo '<i>Homo sapiens RNA, 7SL, cytoplasmic 1 (RN7SL1), small cytoplasmic RNA, NCBI Reference Sequence: NR_002715.1</i>';
echo '</fieldset>';
?>

<fieldset>
<h2>ras coding sequence (cDNA) </h2>
<p>Human DNA sequence that codes for the ras protein, an important gene in cell signalling and human disease: 
</p>
<?php 
$txt = wraptxt('ATGACGGAATATAAGCTGGTGGTGGTGGGCGCCGGCGGTGTGGGCAAGAGTGCGCTGACCATCCAGCTGATCCAGAACCATTTTGTGGACGAATACGACCCCACTATAGAGGATTCCTACCGGAAGCAGGTGGTCATTGATGGGGAGACGTGCCTGTTGGACATCCTGGATACCGCCGGCCAGGAGGAGTACAGCGCCATGCGGGACCAGTACATGCGCACCGGGGAGGGCTTCCTGTGTGTGTTTGCCATCAACAACACCAAGTCTTTTGAGGACATCCACCAGTACAGGGAGCAGATCAAACGGGTGAAGGACTCGGATGACGTGCCCATGGTGCTGGTGGGGAACAAGTGTGACCTGGCTGCACGCACTGTGGAATCTCGGCAGGCTCAGGACCTCGCCCGAAGCTACGGCATCCCCTACATCGAGACCTCGGCCAAGACCCGGCAGGGAGTGGAGGATGCCTTCTACACGTTGGTGCGTGAGATCCGGCAGCACAAGCTGCGGAAGCTGAACCCTCCTGATGAGAGTGGCCCCGGCTGCATGAGCTGCAAGTGTGTGCTCTCCTGA
', 60);
echo '<p class="DNA_seq">' .$txt . '</p>';
echo '<h2>Play sonified ras cDNA coding sequence</h2>';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/ras.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo 'This sequence was sonified using the "reading frame algorithm" in which a different instument is used to sonify each reading frame, in this example a bright piano, electric bass (pick) and timpani were used to sound each frame. In addition the "use Start/Stop codons" option was selected, so that whenever a stop codon is detected in either reading frame the instrument is silenced as are the following 10 codons (notes). Notice how the bright piano plays throughout (i.e the ras open reading frame) whereas both the bass and timpani cut out repeatedly as stop codons occur in these respective reading frames. This leads to  sections of audio with solo piano (e.g. at 3 sec and 1:30 min), piano and timpani (eg. 9 to 17 sec) or piano and bass duets (predomimantly from 45 sec to 1:00 min) plus the full trio ensemble (eg from 30 sec and 1:05 mins).';
echo '</fieldset>';
echo 'Sequence data taken from: <br />';
echo '<i>Homo sapiens chromosome 11 genomic contig, GRCh37.p5 Primary Assembly, NCBI Reference Sequence: NT_009237.18 (beginning at position 189)</i>';
echo '</fieldset>';
?>


<fieldset>
<h2>15S rRNA sequence </h2>
<p>Yeast mitochondrial DNA sequence that codes for the 15S ribosomal RNA 
</p>
<?php 
$txt = wraptxt('GTAAAAAATTTATAAGAATATGATGTTGGTTCAGATTAAGCGCTAAATAAGGACATGACACATGCGAATCATACGTTTATTATTGATAAGATAATAAATATGTGGTGTAAACGTGAGTAATTTTATTAGGAATTAATGAACTATAGAATAAGCTAAATACTTAATATATTATTATATAAAAATAATTTATATAATAAAAAGGATATATATATAATATATATTTATCTATAGTCAAGCCAATAATGGTTTAGGTAGTAGGTTTATTAAGAGTTAAACCTAGCCAACGATCCATAATCGATAATGAAAGTTAGAACGATCACGTTGACTCTGAAATATAGTCAATATCTATAAGATACAGCAGTGAGGAATATTGGACAATGATCGAAAGATTGATCCAGTTACTTATTAGGATGATATATAAAAATATTTTATTTTATTTATAAATATTAAATATTTATAATAATAATAATAATAATATATATATATAAATTGATTAAAAATAAAATCCATAAATAATTAAAATAATGATATTAATTACCATATATATTTTTATATGGATATATATATTAATAATAATATTAATTTTATTATTATTAATAATATATTTTAATAGTCCTGACTAATATTTGTGCCAGCAGTCGCGGTAACACAAAGAGGGCGAGCGTTAATCATAATGGTTTAAAGGATCCGTAGAATGAATTATATATTATAATTTAGAGTTAATAAAATATAATTAAAGAATTATAATAGTAAAGATGAAATAATAATAATAATTATAAGACTAATATATGTGAAAATATTAATTAAATATTAACTGACATTGAGGGATTAAAACTAGAGTAGCGAAACGGATTCGATACCCGTGTAGTTCTAGTAGTAAACTATGAATACAATTATTTATAATATATATTATATATAAATAATAAATGAAAATGAAAGTATTCCACCTGAAGAGTACGTTAGCAATAATGAAACTCAAAACAATAGACGGTTACAGACTTAAGCAGTGGAGCATGTTATTTAATTCGATAATCCACGACTAACCTTACCATATTTTGAATATTATAATAATTATTATAATTATTATATTACAGGCGTTACATTGTTGTCTTTAGTTCGTGCTGCAAAGTTTTAGATTAAGTTCATAAACGAACAAAACTCCATATATATAATTTTAATTATATATAATTTTATATTATTTATTAATATAAAGAAAGGAATTAAGACAAATCATAATGATCCTTATAATATGGGTAATAGACGTGCTATAATAAAATGATAATAAAATTATATAAAATATATTTAATTATATTTAATTAATAATATAAAACATTTTAATTTTTAATATATTTTTTTATTATATATTAATATGAATTATAATCTGAAATTCGATTATATGAAAAAAGAATTGCTAGTAATACGTAAATTAGTATGTTACGGTGAATATTCTAACTGTTTCGCACTAATCACTCATCACGCGTTGAAACATATTATTATCTTATTATTTATATAATATTTTTTAATAAATATTAATAATTATTAATTTATATTTATTTATATCAGAAATAATATGAATTAATGCGAAGTTGAAATACAGTTACCGTAGGGGAACCTGCGGTGGGCTTATAAATATCTTAAATATTCTTACA
', 60);
echo '<p class="DNA_seq">' .$txt . '</p>';
echo '<h2>Play sonified the 15S ribosomal RNA sequence</h2>';
echo '<fieldset>';
?>
<audio controls>
  <source src="./example_mp3/15s RNA.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<?php 
echo 'This sequence was process in the same way as the ras sequence above and likewise has no discernable melodic patterns such as those used to detect tandem repeats in repetitive DNA, however, the audio is still highly recognisable. This audio is characterised by the complete absence of any "triplet" note passages and the presence of repeated sections of silence. All passages are either single notes or pairs of notes with in each triplet (deriving from each of three reading frames). This is because of repeated stop codons occuring in all reading frames (including TGA). The rRNA is not translated and therefore stop codons have no effect (or act to inhibit translation if it were to occur). Clearly the "reading frame algorithm" combined with the "Start/Stop codons" option is effective in sonifying the rRNA into a distinctive audio stream.';
echo '</fieldset>';
echo 'Sequence data taken from: <br />';
echo '<i>15S_rRNA 15S_RRNA SGDID:S000007287, Chr Mito from 6546-8194 (downloaded from http://downloads.yeastgenome.org/sequence/S288C_reference/genome_releases/S288C_reference_genome_R64-1-1_20110203.tgz/</i>';
echo '</fieldset>';
?>

<?php
include("footer.php");?>

