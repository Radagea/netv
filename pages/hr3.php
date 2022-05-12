<?php 
$osszmin = mysql_query("SELECT * from ertekeles WHERE az='$_GET[az]' ORDER BY mbekuld DESC");
$osszmin2 = mysql_query("SELECT * from ertekeles WHERE az='$_GET[az]' ORDER BY mbekuld DESC");
while ($row = mysql_fetch_array($osszmin)) {
	$i++;
}
print "<br><center><h3>Értékelések száma összesen: ".$i."</h3>";
print "<br><h3>".$_GET[az]." értékeléseinek időpontjai időrendi csökkenő sorrendben</h3></center><br><table width=50%>";
while ($row2 = mysql_fetch_array($osszmin2)) {
	print "<tr><td align=center>".$row2[mbekuld]."</td></tr>";
						}
print "</table><br>";
						?>