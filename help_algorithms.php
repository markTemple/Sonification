<?php include("header.php");
include("./functions.php");
include("./arrays.php");
include("sonify.java");
include("help_menu.php");
?>

<h1>Algorithms</h1>
<ul>
	<li><b>Algorithm 1 - Codon note mapping (three reading frames)</b>
	  <ul>
		<li>Has inherent biological logic</li>
		<li>Codons (groups of three nucleotides) are mapped to 21 musical notes</li>
		<li>Mapping is degenerate (more than one codons can map to the same musical note)</li>
		<li>Each of the 3 possible reading frames are mapped to 3 separate instruments</li>
		<li>Start codons are emphesised</li>
		<li>Stop codons are silenced</li>
	</ul>
	</li>
</ul>

<table class="box-table-a" summary="DNA reading frames">
<caption align="bottom"></caption>
<tr>
	<th scope="col" width="200px"></th>
	<th align="left" width="800px">Audio generated from <b>Enter Name</b>
	</th>
</tr>
<tr>
	<th scope="col" width="200px">"Reading frame 1"</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">ACT</font>|<font color="black">CAC</font>|<font color="black">CCT</font>|<font color="black">GAA</font>|<font color="black">GTT</font>|<font color="black">CTC</font>|<font color="black">AGG</font>|<font color="black">ATC</font>|<font color="black">CAC</font>|<font color="black">GTG</font>|<font color="black">CAG</font>|<font color="black">CTT</font>|<font color="black">GTC</font>|<font color="black">ACA</font>|<font color="black">GTG</font>|<font color="black">CAG</font>|<font color="black">CTC</font>|<font color="black">ACT</font>|<font color="black">CAG</font>|<font color="black">TGT</font>|	</td>
</tr>
<tr>
	<th scope="col" width="200px">Acoustic Grand Piano</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">A#5</font>|<font color="black">F.4</font>|<font color="black">F.5</font>|<font color="black">C.4</font>|<font color="black">F.6</font>|<font color="black">G.4</font>|<font color="black">D#3</font>|<font color="black">F#4</font>|<font color="black">F.4</font>|<font color="black">F.6</font>|<font color="black">A#3</font>|<font color="black">G.4</font>|<font color="black">F.6</font>|<font color="black">A#5</font>|<font color="black">F.6</font>|<font color="black">A#3</font>|<font color="black">G.4</font>|<font color="black">A#5</font>|<font color="black">A#3</font>|<font color="black">G.3</font>|	</td>
</tr>
<tr>
	<th scope="col" width="200px">"Reading frame 2"</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">CTC</font>|<font color="black">ACC</font>|<font color="black">CTG</font>|<font color="black">AAG</font>|<font color="black">TTC</font>|<font color="black">TCA</font>|<font color="black">GGA</font>|<font color="black">TCC</font>|<font color="black">ACG</font>|<font color="black">TGC</font>|<font color="black">AGC</font>|<font color="black">TTG</font>|<font color="black">TCA</font>|<font color="black">CAG</font>|<font color="black">TGC</font>|<font color="black">AGC</font>|<font color="black">TCA</font>|<font color="black">CTC</font>|<font color="black">AGT</font>|	</td>
</tr>
<tr>
	<th scope="col" width="200px">Acoustic Guitar (steel)</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">G.4</font>|<font color="black">A#5</font>|<font color="black">G.4</font>|<font color="black">A#4</font>|<font color="black">D#5</font>|<font color="black">F#5</font>|<font color="black">D#4</font>|<font color="black">F#5</font>|<font color="black">A#5</font>|<font color="black">G.3</font>|<font color="black">F#5</font>|<font color="black">G.4</font>|<font color="black">F#5</font>|<font color="black">A#3</font>|<font color="black">G.3</font>|<font color="black">F#5</font>|<font color="black">F#5</font>|<font color="black">G.4</font>|<font color="black">F#5</font>|	</td>
</tr>
<tr>
	<th scope="col" width="200px">"Reading frame 3"</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">TCA</font>|<font color="black">CCC</font>|<font color="black">TGA</font>|<font color="black">AGT</font>|<font color="black">TCT</font>|<font color="black">CAG</font>|<font color="black">GAT</font>|<font color="black">CCA</font>|<font color="black">CGT</font>|<font color="black">GCA</font>|<font color="black">GCT</font>|<font color="black">TGT</font>|<font color="black">CAC</font>|<font color="black">AGT</font>|<font color="black">GCA</font>|<font color="black">GCT</font>|<font color="black">CAC</font>|<font color="black">TCA</font>|<font color="black">GTG</font>|	</td>
</tr>
<tr>
	<th scope="col" width="200px">Percussive Organ</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">F#5</font>|<font color="black">F.5</font>|<font color="black">G.5</font>|<font color="black">F#5</font>|<font color="black">F#5</font>|<font color="black">A#3</font>|<font color="black">F#3</font>|<font color="black">F.5</font>|<font color="black">D#3</font>|<font color="black">C.3</font>|<font color="black">C.3</font>|<font color="black">G.3</font>|<font color="black">F.4</font>|<font color="black">F#5</font>|<font color="black">C.3</font>|<font color="black">C.3</font>|<font color="black">F.4</font>|<font color="black">F#5</font>|<font color="black">F.6</font>|	</td>
</tr>
<tr>
	<th scope="col">All Instrument Notes</th>
	<td align="left" class="col_two_note_table"><font color="black">A</font><font color="black">G</font><font color="black">F</font>|<font color="black">F</font><font color="black">A</font><font color="black">F</font>|<font color="black">F</font><font color="black">G</font><font color="black">G</font>|<font color="black">C</font><font color="black">A</font><font color="black">F</font>|<font color="black">F</font><font color="black">D</font><font color="black">F</font>|<font color="black">G</font><font color="black">F</font><font color="black">A</font>|<font color="black">D</font><font color="black">D</font><font color="black">F</font>|<font color="black">F</font><font color="black">F</font><font color="black">F</font>|<font color="black">F</font><font color="black">A</font><font color="black">D</font>|<font color="black">F</font><font color="black">G</font><font color="black">C</font>|<font color="black">A</font><font color="black">F</font><font color="black">C</font>|<font color="black">G</font><font color="black">G</font><font color="black">G</font>|<font color="black">F</font><font color="black">F</font><font color="black">F</font>|<font color="black">A</font><font color="black">A</font><font color="black">F</font>|<font color="black">F</font><font color="black">G</font><font color="black">C</font>|<font color="black">A</font><font color="black">F</font><font color="black">C</font>|<font color="black">G</font><font color="black">F</font><font color="black">F</font>|<font color="black">A</font><font color="black">G</font><font color="black">F</font>|<font color="black">A</font><font color="black">F</font><font color="black">F</font>|<font color="black">G</font>|	</td>
</tr>
</table>

	<p>
In this approach tri-nucleotides are processed in an analogous way to the biological rules of the genetic code (in which a codon consists of three consecutive bases coding for one of 20 amino acid building blocks of a protein). Each of 64 possible codons are mapped to one of 20 musical notes rather than amino acids, as is the STOP codon. Each of the three possible open reading frames is mapped to a separate instruments. In the absence of further DNA sequence annotation to indicate the actual reading frame of the sequence, each open reading frame (instrument) is voiced sequentially with equal bias. </p>

<p>&nbsp;</p>

	<ul>
	<li><b>Algorithm 2 - Protein note mapping (one reading frame)</b>
	  <ul>
		<li>Has inherent biological logic</li>
		<li>Codons (groups of three nucleotides) are mapped to 21 musical notes</li>
		<li>Mapping is degenerate (more than one codons can map to the same musical note)</li>
		<li>Only the first reading frames is mapped to an instrument</li>
		<li>DNA sequence is akin to a gene coding region with introns removed (cDNA)</li>
	</ul>
	<br />
    </li>
<table class="box-table-a" summary="DNA reading frames">
<caption align="bottom"></caption>
<tr>
	<th scope="col" width="200px"></th>
	<th align="left" width="800px">Audio generated from <b>Enter Name</b>
	</th>
</tr>	
<tr>
	<th scope="col" width="200px">DNA sequence</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">ACT</font>|<font color="black">CAC</font>|<font color="black">CCT</font>|<font color="black">GAA</font>|<font color="black">GTT</font>|<font color="black">CTC</font>|<font color="black">AGG</font>|<font color="black">ATC</font>|<font color="black">CAC</font>|<font color="black">GTG</font>|<font color="black">CAG</font>|<font color="black">CTT</font>|<font color="black">GTC</font>|<font color="black">ACA</font>|<font color="black">GTG</font>|<font color="black">CAG</font>|<font color="black">CTC</font>|<font color="black">ACT</font>|<font color="black">CAG</font>|<font color="black">TGT</font>|</td>
</tr>
<tr>
	<th scope="col" width="200px">"Protein (AA residues)"</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">Thr</font>|<font color="black">His</font>|<font color="black">Pro</font>|<font color="black">Glu</font>|<font color="black">Val</font>|<font color="black">Leu</font>|<font color="black">Arg</font>|<font color="black">Ile</font>|<font color="black">His</font>|<font color="black">Val</font>|<font color="black">Gln</font>|<font color="black">Leu</font>|<font color="black">Val</font>|<font color="black">Thr</font>|<font color="black">Val</font>|<font color="black">Gln</font>|<font color="black">Leu</font>|<font color="black">Thr</font>|<font color="black">Gln</font>|<font color="black">Cys</font>|</td>
</tr>
<tr>
	<th scope="col" width="200px">Acoustic Grand Piano</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">A#4</font>|<font color="black">F.3</font>|<font color="black">F.4</font>|<font color="black">C.3</font>|<font color="black">F.5</font>|<font color="black">G.3</font>|<font color="black">D#2</font>|<font color="black">F#3</font>|<font color="black">F.3</font>|<font color="black">F.5</font>|<font color="black">A#2</font>|<font color="black">G.3</font>|<font color="black">F.5</font>|<font color="black">A#4</font>|<font color="black">F.5</font>|<font color="black">A#2</font>|<font color="black">G.3</font>|<font color="black">A#4</font>|<font color="black">A#2</font>|<font color="black">G.2</font>|</td>
</tr>
</table>

<p>&nbsp;</p>
	
	<li><b>Algorithm 3 - Tri-nucleotides note mapping (one reading frame)</b>
	  <ul>
		<li>Has no inherent biological logic</li>
		<li>Each of 64 codons (groups of three nucleotides) are mapped to distinct musical notes</li>
		<li>Only the first reading frames is mapped to an instrument</li>
		<li>DNA sequence is akin to a gene coding region with introns removed (cDNA)</li>
	</ul>
	<br />
    </li>
	
<table class="box-table-a" summary="DNA reading frames">
<caption align="bottom"></caption>
<tr>
	<th scope="col" width="200px"></th>
	<th align="left" width="800px">Audio generated from <b>Enter Name</b>
	</th>
</tr>		
<tr>
	<th scope="col" width="200px">DNA sequence</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">ACT</font>|<font color="black">CAC</font>|<font color="black">CCT</font>|<font color="black">GAA</font>|<font color="black">GTT</font>|<font color="black">CTC</font>|<font color="black">AGG</font>|<font color="black">ATC</font>|<font color="black">CAC</font>|<font color="black">GTG</font>|<font color="black">CAG</font>|<font color="black">CTT</font>|<font color="black">GTC</font>|<font color="black">ACA</font>|<font color="black">GTG</font>|<font color="black">CAG</font>|<font color="black">CTC</font>|<font color="black">ACT</font>|<font color="black">CAG</font>|<font color="black">TGT</font>|</td>
</tr>
<tr>
	<th scope="col" width="200px">Acoustic Grand Piano</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">G#6</font>|<font color="black">C.4</font>|<font color="black">G.5</font>|<font color="black">F#3</font>|<font color="black">D#7</font>|<font color="black">F#4</font>|<font color="black">F.2</font>|<font color="black">D#4</font>|<font color="black">C.4</font>|<font color="black">D.7</font>|<font color="black">F.3</font>|<font color="black">G#4</font>|<font color="black">C#7</font>|<font color="black">F.6</font>|<font color="black">D.7</font>|<font color="black">F.3</font>|<font color="black">F#4</font>|<font color="black">G#6</font>|<font color="black">F.3</font>|<font color="black">D#3</font>|	</td>
</tr>
</table>

<p>&nbsp;</p>

	<li><b>Algorithm 4 - Di-nucleotides note mapping (one reading frame)</b>
	  <ul>
		<li>Has no inherent biological logic</li>
		<li>Groups of 16 possible two nucleotides pairs are mapped to distinct musical notes</li>
		<li>Only the first reading frames is mapped to an instrument</li>
	</ul>
	<br />
    </li>
	
<table class="box-table-a" summary="DNA reading frames">
<caption align="bottom"></caption>
<tr>
	<th scope="col" width="200px"></th>
	<th align="left" width="800px">Audio generated from <b>Enter Name</b>
	</th>
</tr>
<tr>
	<th scope="col" width="200px">DNA sequence</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">AC</font>|<font color="black">TC</font>|<font color="black">AC</font>|<font color="black">CC</font>|<font color="black">TG</font>|<font color="black">AA</font>|<font color="black">GT</font>|<font color="black">TC</font>|<font color="black">TC</font>|<font color="black">AG</font>|<font color="black">GA</font>|<font color="black">TC</font>|<font color="black">CA</font>|<font color="black">CG</font>|<font color="black">TG</font>|<font color="black">CA</font>|<font color="black">GC</font>|<font color="black">TT</font>|<font color="black">GT</font>|<font color="black">CA</font>|<font color="black">CA</font>|<font color="black">GT</font>|<br /><font color="black">GC</font>|<font color="black">AG</font>|<font color="black">CT</font>|<font color="black">CA</font>|<font color="black">CT</font>|<font color="black">CA</font>|<font color="black">GT</font>|<font color="black">GT</font>|</td>
</tr>
<tr>
	<th scope="col" width="200px">Acoustic Grand Piano</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">D#</font>|<font color="black">A#</font>|<font color="black">D#</font>|<font color="black">F#</font>|<font color="black">F.</font>|<font color="black">A#</font>|<font color="black">F.</font>|<font color="black">A#</font>|<font color="black">A#</font>|<font color="black">G.</font>|<font color="black">D#</font>|<font color="black">A#</font>|<font color="black">D#</font>|<font color="black">C.</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">F#</font>|<font color="black">G.</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">D#</font>|<font color="black">F.</font>|<br /><font color="black">F#</font>|<font color="black">G.</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">F.</font>|<font color="black">F.</font>|</td>
</tr>
</table>

<p>&nbsp;</p>

	<li><b>Algorithm 5 - Di-nucleotides note mapping (two reading frames)</b>
	  <ul>
		<li>Has no inherent biological logic</li>
		<li>Groups of 16 possible two nucleotides pairs are mapped to distinct musical notes</li>
		<li>Each of the 2 possible reading frames are mapped to 2 separate instruments</li>
	</ul>
	<br />
    </li>
	


<table class="box-table-a" summary="DNA reading frames">
<caption align="bottom"></caption>
<tr>
	<th scope="col" width="200px"></th>
	<th align="left" width="800px">Audio generated from <b>Enter Name</b>
	</th>
</tr>
<tr>
	<th scope="col" width="200px">"Di-nucleotides pairs 1"</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">AC</font>|<font color="black">TC</font>|<font color="black">AC</font>|<font color="black">CC</font>|<font color="black">TG</font>|<font color="black">AA</font>|<font color="black">GT</font>|<font color="black">TC</font>|<font color="black">TC</font>|<font color="black">AG</font>|<font color="black">GA</font>|<font color="black">TC</font>|<font color="black">CA</font>|<font color="black">CG</font>|<font color="black">TG</font>|<font color="black">CA</font>|<font color="black">GC</font>|<font color="black">TT</font>|<font color="black">GT</font>|<font color="black">CA</font>|<font color="black">CA</font>|<font color="black">GT</font>|<br /><font color="black">GC</font>|<font color="black">AG</font>|<font color="black">CT</font>|<font color="black">CA</font>|<font color="black">CT</font>|<font color="black">CA</font>|<font color="black">GT</font>|<font color="black">GT</font>|</td>
</tr>
<tr>
	<th scope="col" width="200px">Acoustic Grand Piano</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">D#</font>|<font color="black">A#</font>|<font color="black">D#</font>|<font color="black">F#</font>|<font color="black">F.</font>|<font color="black">A#</font>|<font color="black">F.</font>|<font color="black">A#</font>|<font color="black">A#</font>|<font color="black">G.</font>|<font color="black">D#</font>|<font color="black">A#</font>|<font color="black">D#</font>|<font color="black">C.</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">F#</font>|<font color="black">G.</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">D#</font>|<font color="black">F.</font>|<br /><font color="black">F#</font>|<font color="black">G.</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">F.</font>|<font color="black">F.</font>|</td>
</tr>	
<tr>
	<th scope="col" width="200px">"Di-nucleotides pairs 2"</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">CT</font>|<font color="black">CA</font>|<font color="black">CC</font>|<font color="black">CT</font>|<font color="black">GA</font>|<font color="black">AG</font>|<font color="black">TT</font>|<font color="black">CT</font>|<font color="black">CA</font>|<font color="black">GG</font>|<font color="black">AT</font>|<font color="black">CC</font>|<font color="black">AC</font>|<font color="black">GT</font>|<font color="black">GC</font>|<font color="black">AG</font>|<font color="black">CT</font>|<font color="black">TG</font>|<font color="black">TC</font>|<font color="black">AC</font>|<font color="black">AG</font>|<font color="black">TG</font>|<br /><font color="black">CA</font>|<font color="black">GC</font>|<font color="black">TC</font>|<font color="black">AC</font>|<font color="black">TC</font>|<font color="black">AG</font>|<font color="black">TG</font>|</td>
</tr>
<tr>
	<th scope="col" width="200px">Acoustic Guitar (steel)</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">F.</font>|<font color="black">D#</font>|<font color="black">F#</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">G.</font>|<font color="black">G.</font>|<font color="black">F.</font>|<font color="black">D#</font>|<font color="black">C.</font>|<font color="black">C.</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">F.</font>|<font color="black">F#</font>|<font color="black">G.</font>|<font color="black">F.</font>|<font color="black">F.</font>|<font color="black">A#</font>|<font color="black">D#</font>|<font color="black">G.</font>|<font color="black">F.</font>|<br /><font color="black">D#</font>|<font color="black">F#</font>|<font color="black">A#</font>|<font color="black">D#</font>|<font color="black">A#</font>|<font color="black">G.</font>|<font color="black">F.</font>|</td>
</tr>
<tr>
	<th scope="col">All Instrument Notes</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">D</font><font color="black">F</font>|<font color="black">A</font><font color="black">D</font>|<font color="black">D</font><font color="black">F</font>|<font color="black">F</font><font color="black">F</font>|<font color="black">F</font><font color="black">D</font>|<font color="black">A</font><font color="black">G</font>|<font color="black">F</font><font color="black">G</font>|<font color="black">A</font><font color="black">F</font>|<font color="black">A</font><font color="black">D</font>|<font color="black">G</font><font color="black">C</font>|<font color="black">D</font><font color="black">C</font>|<font color="black">A</font><font color="black">F</font>|<font color="black">D</font><font color="black">D</font>|<font color="black">C</font><font color="black">F</font>|<font color="black">F</font><font color="black">F</font>|<font color="black">D</font><font color="black">G</font>|<font color="black">F</font><font color="black">F</font>|<font color="black">G</font><font color="black">F</font>|<font color="black">F</font><font color="black">A</font>|<font color="black">D</font><font color="black">D</font>|<font color="black">D</font><font color="black">G</font>|<font color="black">F</font><font color="black">F</font>|<br /><font color="black">F</font><font color="black">D</font>|<font color="black">G</font><font color="black">F</font>|<font color="black">F</font><font color="black">A</font>|<font color="black">D</font><font color="black">D</font>|<font color="black">F</font><font color="black">A</font>|<font color="black">D</font><font color="black">G</font>|<font color="black">F</font><font color="black">F</font>|<font color="black">F</font>|	</td>
</tr>
</table>	

<p>&nbsp;</p>

	<li><b>Algorithm 6 - Single-nucleotides note mapping (one reading frame)</b>
	  <ul>
		<li>Has no inherent biological logic</li>
		<li>Each of the 4 possible nucleotides pairs are mapped to 4 distinct musical notes</li>
		<li>Only one reading frames can be created mapping to a single instrument</li>
	</ul>
    </li>
</ul>

<table class="box-table-a" summary="DNA reading frames">
<caption align="bottom"></caption>
<tr>
	<th scope="col" width="200px"></th>
	<th align="left" width="800px">Audio generated from <b>Enter Name</b>
	</th>
</tr>
<tr>
	<th scope="col" width="200px">DNA sequence</th>
	<td align="left" width="800px" class="col_two_note_table" ><font color="black">A</font> |<font color="black">C</font> |<font color="black">T</font> |<font color="black">C</font> |<font color="black">A</font> |<font color="black">C</font> |<font color="black">C</font> |<font color="black">C</font> |<font color="black">T</font> |<font color="black">G</font> |<font color="black">A</font> |<font color="black">A</font> |<font color="black">G</font> |<font color="black">T</font> |<font color="black">T</font> |<font color="black">C</font> |<font color="black">T</font> |<font color="black">C</font> |<font color="black">A</font> |<font color="black">G</font> |<font color="black">G</font> |<font color="black">A</font> |<br /><font color="black">T</font> |<font color="black">C</font> |<font color="black">C</font> |<font color="black">A</font> |<font color="black">C</font> |<font color="black">G</font> |<font color="black">T</font> |<font color="black">G</font> |<font color="black">C</font> |<font color="black">A</font> |<font color="black">G</font> |<font color="black">C</font> |<font color="black">T</font> |<font color="black">T</font> |<font color="black">G</font> |<font color="black">T</font> |<font color="black">C</font> |<font color="black">A</font> |<font color="black">C</font> |<font color="black">A</font> |<font color="black">G</font> |<font color="black">T</font> |<br /><font color="black">G</font> |<font color="black">C</font> |<font color="black">A</font> |<font color="black">G</font> |<font color="black">C</font> |<font color="black">T</font> |<font color="black">C</font> |<font color="black">A</font> |<font color="black">C</font> |<font color="black">T</font> |<font color="black">C</font> |<font color="black">A</font> |<font color="black">G</font> |<font color="black">T</font> |<font color="black">G</font> |<font color="black">T</font> |</td>
</tr>
<tr>
	<th scope="col" width="200px">Acoustic Grand Piano</th>
	<td align="left" width="800px" class="col_two_note_table"><font color="black">D#</font>|<font color="black">F#</font>|<font color="black">F.</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">F#</font>|<font color="black">F#</font>|<font color="black">F#</font>|<font color="black">F.</font>|<font color="black">C.</font>|<font color="black">D#</font>|<font color="black">D#</font>|<font color="black">C.</font>|<font color="black">F.</font>|<font color="black">F.</font>|<font color="black">F#</font>|<font color="black">F.</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">C.</font>|<font color="black">C.</font>|<font color="black">D#</font>|<br /><font color="black">F.</font>|<font color="black">F#</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">F#</font>|<font color="black">C.</font>|<font color="black">F.</font>|<font color="black">C.</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">C.</font>|<font color="black">F#</font>|<font color="black">F.</font>|<font color="black">F.</font>|<font color="black">C.</font>|<font color="black">F.</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">C.</font>|<font color="black">F.</font>|<br /><font color="black">C.</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">C.</font>|<font color="black">F#</font>|<font color="black">F.</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">F#</font>|<font color="black">F.</font>|<font color="black">F#</font>|<font color="black">D#</font>|<font color="black">C.</font>|<font color="black">F.</font>|<font color="black">C.</font>|<font color="black">F.</font>|</td>
</tr>
</table>

<p>&nbsp;</p>

<?php include("footer.php");?>
