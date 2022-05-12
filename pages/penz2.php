<?php
	/*$osszfiz = 0;
	$time = date("Y-m-d");
	$time = "2016-01-22";
	print "<h3>".$_GET[az]."   Által értékelt műsorok azonosítója:</h3>";
	$ertekeles = mysql_query("SELECT * FROM ertekeles");
	$dolgozo = mysql_query("SELECT * FROM dolgozo");
	while($row=mysql_fetch_array($ertekeles)) {
			$musor = mysql_query("SELECT * FROM musor WHERE maz='$row[maz]'");
			while($row2=mysql_fetch_array($musor)) {
				if (($row2[maz] == $row[maz]) && ($row[vekezd] == $row2[mkezd])) {
					$el = explode(' ',$row2[mkezd]);
					$el2 = strtotime($el[1]);
					$veg = strtotime($row2[mvege]);
					$hossz = $veg - $el2;
					$hossz=(int)$hossz/60;
					$perc=$hossz%60; 
					if ($perc < 0) $perc = $perc + 60;
					$hossz=(int)$hossz/60;
					$ora=$hossz%24;
					if ($ora < 0) $ora = $ora + 23;
				}
			}
			if (($ora == 0) && ($perc <= 40)) {
				$fiz = 400;
			}
			if (($ora == 0) && ($perc > 40)) {
				$fiz = 750;
			}
			if ($ora == 1) {
				$fiz = 1000;
			}
			$osszfiz = $osszfiz + $fiz;
			print $row[maz]." ".$ora." ".$perc." ".$fiz."<br>";
			while($row3=mysql_fetch_array($dolgozo)) {
				if($row[az] == $row3[az]) { 
					$szul = $row3[szulid];
					$kulszul = $time - $szul;
				}
						if ($kulszul <= 18) {
				if ($osszfiz> 15000) {
					$osszfiz = 15000;
				}
			} else {
				if ($osszfiz> 30000) {
					$osszfiz = 30000;
				}
			}
			}
			mysql_query("UPDATE dolgozo SET fiz='$osszfiz' WHERE az='$row[az]'");		
	}
	print $osszfiz;*/
	print "<table>";
	$kulszul = null;
	$time = $_SESSION[vdatum];
	$ertekeles = mysql_query("SELECT DISTINCT az FROM ertekeles");
	$dolgozo = mysql_query("SELECT * FROM dolgozo");
	while($row=mysql_fetch_array($ertekeles)) {
		while($row2=mysql_fetch_array($dolgozo)) {
			if ($row[az] == $row2[az]) {
				$szul = $row2[szulid];
				$kulszul = $time - $szul;
			}
		}
		print "<tr><td>Azonosító:</td><td>".$row[az]." ".$kulszul."</td></tr>";
	}
	print "</table>";
?>