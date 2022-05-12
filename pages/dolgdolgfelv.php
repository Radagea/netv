<?php
	$ajanl = mysql_query("SELECT * FROM dolgozo");
	$i = 1;
	$time = $_SESSION[vdatum];
	while($row = mysql_fetch_array($ajanl)) {
		if ($row[aktiv] == 'A') {
			$i++;
		}
		if ($_POST[ajemail] == $row[email]) {
				$ajanlhat = true;
		}
	}
	if ($i<600) {
	print "<center><h3>".$_SESSION[az]."</h3></center>";
	print "<form method=POST class='basic-grey' action='index.php?op=dolgdolgfelv'>
	<label>
			<span>E-mail:</span>
			<input type=email name=ajemail></input>
		</label>
		<label>
		<span><!--Születési dátum--></span>
		<input type=date name=szulid></input>
		</label>
		<label>
		<label>
		<span>Nem</span>
			<select name=nem>
				<option value=F>Férfi</option>
				<option value=N>Nő</option>
			</select>
		</label>
		<center><input class=button type=submit name=gomb value=Ajánlás></input><center>
		<br>
	</label>
	</form>";
	$ajanl2 = mysql_query("SELECT * FROM ajanlott");
	while ($row2=mysql_fetch_array($ajanl2)) {
			if ($_POST[ajemail] == $row2[email]) {
				$ajanlhat = true;
			}
	}
	 if ((!isset($ajanlhat)) && (isset($_POST[gomb])))   {
		if ((!empty($_POST[ajemail])) && (!empty($_POST[szulid]))) {
		 if (mysql_query("INSERT INTO ajanlott VALUES ('$_SESSION[az]','$_POST[ajemail]','$_POST[szulid]','$_POST[nem]','')")) {
			print "Sikeres ajánlás!";
			$ajanl3 = mysql_query("SELECT * FROM ajanlott");
	while ($row3=mysql_fetch_array($ajanl3)) {
			$szul = $row3[szulid];	
		$kulszul = $time - $szul;
			if ($row3[nem] == 'F') {
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
		mysql_query("UPDATE ajanlott SET kat='$kat' WHERE email='$row3[email]'");
	}
			} else {print "Ismeretlen eredetű hiba!";}
		}else {
		 print "Töltsön ki minden adatot!";
	 } 
	 }
	} else {
		print "Sajnáljuk de nincs szabad hely a rendszerünkben!";
	}
?>