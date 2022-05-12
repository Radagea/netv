<?php
	$i = 0;
	print "<br>";
	$dolgozo = mysql_query("SELECT * FROM dolgozo");
	while($row=mysql_fetch_array($dolgozo)) {
		if ($row[aktiv] == 'A') {
			$azgen = explode('_',$row[az]);
			if ($azgen[1] > $azgen2) {
				$azgen2 = $azgen[1];
			}
			switch ($row[kat]) {
				case 1:
					$kat1 ++;
				break;
				case 2:
					$kat2 ++;
				break;
				case 3:
					$kat3 ++;
				break;
				case 4:
					$kat4 ++;
				break;
				case 5:
					$kat5 ++;
				break;
				case 6:
					$kat6 ++;
				break;
			}
		}
	}
		$time = $_SESSION[vdatum];

	$elfogad = mysql_query("SELECT * FROM ajanlott");
	while($row2=mysql_fetch_array($elfogad)) {
		$szul = $row2[szulid];
		$kulszul = $time - $szul;
		if ($row2[nem] == 'F') {
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
		switch($row2[kat]) {
			case 1:
				$kkat = "Fiatal férfi";
				break;
			case 2:
				$kkat = "Fiatal nő";
				break;
			case 3:
				$kkat = "Középkorú férfi";
				break;
			case 4:
				$kkat = "Középkorú nő";
				break;
			case 5:
				$kkat = "Idős férfi";
				break;
			case 6:
				$kkat = "Idős nő";
				break;
		}
		switch ($kat) {
			case 1:
				if ($kat1 < 100) print "<form method=POST class='basic-grey' action=index.php?op=hrdolgfelv><label><table><tr><td colspan=2 align=center><input type=submit class=button value=Elfogad name='gomb$i'></td><tr><td height=20px></td></tr></tr><tr><td align=left width=50%>Email:".$row2[email]."</td><td align=right width=50%>Kategória:".$kkat."</td></tr></table></label></form><br>";
				$_SESSION[r] = 'yes';
			break;
			case 2:
				if ($kat2 < 100) print "<form method=POST class='basic-grey' action=index.php?op=hrdolgfelv><label><table><tr><td colspan=2 align=center><input type=submit class=button value=Elfogad name='gomb$i'></td><tr><td height=20px></td></tr></tr><tr><td align=left width=50%>Email:".$row2[email]."</td><td align=right width=50%>Kategória:".$kkat."</td></tr></table></label></form><br>";
				$_SESSION[r] = 'yes';
			break;
			case 3:
				if ($kat3 < 100) print "<form method=POST class='basic-grey' action=index.php?op=hrdolgfelv><label><table><tr><td colspan=2 align=center><input type=submit class=button value=Elfogad name='gomb$i'></td><tr><td height=20px></td></tr></tr><tr><td align=left width=50%>Email:".$row2[email]."</td><td align=right width=50%>Kategória:".$kkat."</td></tr></table></label></form><br>";
				$_SESSION[r] = 'yes';
			break;
			case 4:
				if ($kat4 < 100) print "<form method=POST class='basic-grey' action=index.php?op=hrdolgfelv><label><table><tr><td colspan=2 align=center><input type=submit class=button value=Elfogad name='gomb$i'></td><tr><td height=20px></td></tr></tr><tr><td align=left width=50%>Email:".$row2[email]."</td><td align=right width=50%>Kategória:".$kkat."</td></tr></table></label></form><br>";
				$_SESSION[r] = 'yes';
			break;
			case 5:
				if ($kat5 < 100) print "<form method=POST class='basic-grey' action=index.php?op=hrdolgfelv><label><table><tr><td colspan=2 align=center><input type=submit class=button value=Elfogad name='gomb$i'></td><tr><td height=20px></td></tr></tr><tr><td align=left width=50%>Email:".$row2[email]."</td><td align=right width=50%>Kategória:".$kkat."</td></tr></table></label></form><br>";
				$_SESSION[r] = 'yes';
			break;
			case 6:
				if ($kat6 < 100) print "<form method=POST class='basic-grey' action=index.php?op=hrdolgfelv><label><table><tr><td colspan=2 align=center><input type=submit class=button value=Elfogad name='gomb$i'></td><tr><td height=20px></td></tr></tr><tr><td align=left width=50%>Email:".$row2[email]."</td><td align=right width=50%>Kategória:".$kkat."</td></tr></table></label></form><br>";
				$_SESSION[r] = 'yes';
			break;
		}
		if (isset($_POST['gomb'.$i])) {
			$azgen2 = $azgen2+1;
			//adatbázis ellenőrzése és beírás a dolgozo táblába már meg van szűrve
			mysql_query("INSERT INTO dolgozo VALUES('D_$azgen2','$row2[szulid]','$row2[nem]','$row2[meghivta]','','$row2[email]','A','$row2[kat]','')");
			mysql_query("DELETE FROM ajanlott WHERE email='$row2[email]'");
			if (!empty($_SESSION[r])) {
				header("Refresh: 0"); 
				$_SESSION[r] = null;
			}
		}
		$i++;
	}
	if ($_SESSION[r] == null) {
			print "<center>Jelenleg nincs a kritériumoknak megfelelő ajánlott dolgozó</center>";
		}
	print "<br>";
?>