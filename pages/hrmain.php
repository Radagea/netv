<?php
$kat1 = 0;
$kat2 = 0;
$kat3 = 0;
$kat4 = 0;
$kat5 = 0;
$kat6 = 0;
$dolgozo = mysql_query("SELECT * FROM dolgozo");
while($row=mysql_fetch_array($dolgozo)) {
if ($row[aktiv] == 'A') {
			switch ($row[kat]) {
						case 1: 
							$kat1 ++;
							mysql_query("UPDATE kategoria SET letszam='$kat1' WHERE katszam='1'");
						break;
						case 2:
							$kat2 ++;
							mysql_query("UPDATE kategoria SET letszam='$kat2' WHERE katszam='2'");
						break;
						case 3:
							$kat3 ++;
							mysql_query("UPDATE kategoria SET letszam='$kat3' WHERE katszam='3'");
						break;
						case 4:
							$kat4 ++;
							mysql_query("UPDATE kategoria SET letszam='$kat4' WHERE katszam='4'");
						break;
						case 5:
							$kat5 ++;
							mysql_query("UPDATE kategoria SET letszam='$kat5' WHERE katszam='5'");
						break;
						case 6:
							$kat6 ++;
							mysql_query("UPDATE kategoria SET letszam='$kat6' WHERE katszam='6'");
						break;
					}
}}
	print "<center><table width=50%>";
	$lekeer = mysql_query("SELECT * FROM kategoria");
	while ($row2=mysql_fetch_array($lekeer)) {
		switch($row2[katszam]) {
			case 1:
				$kat = "Fiatal férfi";
				break;
			case 2:
				$kat = "Fiatal nő";
				break;
			case 3:
				$kat = "Középkorú férfi";
				break;
			case 4:
				$kat = "Középkorú nő";
				break;
			case 5:
				$kat = "Idős férfi";
				break;
			case 6:
				$kat = "Idős nő";
				break;
		}
		print "<td align=right width=25%>Kategória: </td><td align=left width=25%>".$kat."</td><td align=right width=25%>Létszám:  </td><td align=left width=25%>".$row2[letszam]."</td></tr>";
	}
	print "</table><br><br>a.	Egyes dolgozói kategóriák létszáma<br>
b.	Dolgozók elérhetősége és eddig leadott összes minősítésének száma<br>
c.	Inaktív dolgozók neve az utolsó minősítés alapján csökkenő sorrendben<br>
d.	Kilépett dolgozók elérhetősége<br>
e.	Meghívót küldő dolgozók és az általuk ajánlott munkavállalók<br>
f.	Új dolgozók felvételére szolgáló felület<br>
g.	Munkaszerződés sablon<br>
</center>";
?>