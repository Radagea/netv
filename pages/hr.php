<?php
	include("../adatb.php");
	$dolgozo = mysql_query("SELECT * FROM dolgozo");
	$time = $_SESSION[vdatum];
	$honap = explode ("-",$time);
	$kat1 = 0;
	$kat2 = 0;
	$kat3 = 0;
	$kat4 = 0;
	$kat5 = 0;
	$kat6 = 0;
	$max = 0;
	print "
	
	<center><h1>".$time."</h1><table width=90%>";
	while($row=mysql_fetch_array($dolgozo)) {
		$meghivc = 0;
		$osszert = 0;
		/*$szul = $row[szulid];
		$kulszul = $time - $szul;
		print $kulszul."<br>";
		print $szul."<br>";
		print $time."<br>";
		if ($row[nem] == 'F') {
				$nem = 1;
			} else {
				$nem = 2;
			}
		if ($kulszul < 25) {
			//$kat[$nem] ++;
			if ($nem == 1) {
				//Férfi
				$kat = 1;
			} else {
				//Nő
				$kat = 2;
			}
		}
		if (($kulszul > 25) && ($kulszul < 60)) {
			//$kat[2+$nem] ++;
			if ($nem == 1) {
				//Férfi
				$kat = 3;
			} else {
				//Nő
				$kat = 4;
			}
		}
		if ($kulszul > 60) {
			//$kat[4+$nem] ++;
			if ($nem == 1) {
				//Férfi
				$kat = 5;
			} else {
				//Nő
				$kat = 6;
			}
		}
		mysql_query("UPDATE dolgozo SET kat='$kat' WHERE az='$row[az]'");*/
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
			$dhonap = explode ("-",$row[belepd]);
			if ($dhonap[1] == $honap[1]) {
				print "<tr><td align=right>Azonosító:</td><td align=left>".$row[az]."<td><a href=index.php?op=hr2&az=$row[az]>Meghívott emberek</a></td><td><a href=index.php?op=hr3&az=$row[az]>Értékelések</a></td><td align=right>E-mail:  </td><td align=left>".$row[email]."</td></tr>"; 
			}
		}
	}
	print "</table></center>";
	
		
		//print "<tr><td>".$row[az]."</td><td>".$kulszul."</td><td>".$kat[1]."</td><td>".$kat[2]."</td><td>".$kat[3]."</td><td>".$kat[4]."</td><td>".$kat[5]."</td><td>".$kat[6]."</td></tr>";
?>