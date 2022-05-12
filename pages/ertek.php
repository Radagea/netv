<center>
<div class="project">
<?php
	if (isset($_POST[gomb]))
	{
		$result=mysql_query("SELECT * FROM musorossz WHERE musorok='$_POST[maz]'");
		$f25=mysql_result ($result,0,'25F');
		$n25=mysql_result ($result,0,'25N');
		$f2565=mysql_result ($result,0,'2565F');
		$n2565=mysql_result ($result,0,'2565N');
		$f65=mysql_result ($result,0,'65F');
		$n65=mysql_result ($result,0,'65N');
		$szorakoz=mysql_result ($result,0,'szorakoz');
		$ertheto=mysql_result ($result,0,'ertheto');
		$aktual=mysql_result ($result,0,'aktual');
		$szorakoz=$szorakoz+$_POST[szor];
		$ertheto=$ertheto+$_POST[erth];
		$aktual=$aktual+$_POST[akt];
		switch ($_SESSION[kat]) {
			case 1: //25alatti férfi
				if ($f25<=10)
				{
					$mostdatum=date("Y-m-d");
					mysql_query("INSERT INTO ertekeles VALUES ('$_POST[maz]','$_SESSION[az]','$_POST[vekezd]','$mostdatum','$_POST[szor]','$_POST[erth]','$_POST[akt]')");			
					$f25++;
					mysql_query("UPDATE musorossz SET 
					25F='$f25',
					szorakoz='$szorakoz',
					ertheto='$ertheto',
					aktual='$aktual'
					WHERE musorok='$_POST[maz]'");
					print mysql_error();
					print "Értékelés sikeresen beküldve!";
				}
				else { print"Nem tölthetsz fel ehhez a műsorhoz több értékelést a kategóriádban";}
				break;
			case 2: //25 alatti nő
				if ($n25<=10)
				{
					$mostdatum=date("Y-m-d");
					mysql_query("INSERT INTO ertekeles VALUES ('$_POST[maz]','$_SESSION[az]','$_POST[vekezd]','$mostdatum','$_POST[szor]','$_POST[erth]','$_POST[akt]')");
					$n25++;
					mysql_query("UPDATE musorossz SET 
					25N='$n25',
					szorakoz='$szorakoz',
					ertheto='$ertheto',
					aktual='$aktual'
					WHERE musorok='$_POST[maz]'");
					print mysql_error();
					print "Értékelés sikeresen beküldve!";
				}
				else { print"Nem tölthetsz fel ehhez a műsorhoz több értékelést a kategóriádban";}
				break;
			case 3: //25-65 férfi
				if ($f2565<=10)
				{
					$mostdatum=date("Y-m-d");
					mysql_query("INSERT INTO ertekeles VALUES ('$_POST[maz]','$_SESSION[az]','$_POST[vekezd]','$mostdatum','$_POST[szor]','$_POST[erth]','$_POST[akt]')");
					$f2565++;
					mysql_query("UPDATE musorossz SET 
					2565F='$f2565',
					szorakoz='$szorakoz',
					ertheto='$ertheto',
					aktual='$aktual'
					WHERE musorok='$_POST[maz]'");
					print mysql_error();
					print "Értékelés sikeresen beküldve!";
				}
				else { print"Nem tölthetsz fel ehhez a műsorhoz több értékelést a kategóriádban";}
				break;
			case 4: //25-65 nő
				if ($n2565<=10)
				{
					$mostdatum=date("Y-m-d");
					mysql_query("INSERT INTO ertekeles VALUES ('$_POST[maz]','$_SESSION[az]','$_POST[vekezd]','$mostdatum','$_POST[szor]','$_POST[erth]','$_POST[akt]')");
					$n2565++;
					mysql_query("UPDATE musorossz SET 
					2565N='$n2565',
					szorakoz='$szorakoz',
					ertheto='$ertheto',
					aktual='$aktual'
					WHERE musorok='$_POST[maz]'");
					print mysql_error();
					print "Értékelés sikeresen beküldve!";
				}
				else { print"Nem tölthetsz fel ehhez a műsorhoz több értékelést a kategóriádban";}
				break;
			case 5: // 65 férfi
				if ($f65<=10)
				{
					$mostdatum=date("Y-m-d");
					mysql_query("INSERT INTO ertekeles VALUES ('$_POST[maz]','$_SESSION[az]','$_POST[vekezd]','$mostdatum','$_POST[szor]','$_POST[erth]','$_POST[akt]')");
					$f65++;
					mysql_query("UPDATE musorossz SET 
					65F='$f65',
					szorakoz='$szorakoz',
					ertheto='$ertheto',
					aktual='$aktual'
					WHERE musorok='$_POST[maz]'");
					print mysql_error();
					print "Értékelés sikeresen beküldve!";
				}
				else { print"Nem tölthetsz fel ehhez a műsorhoz több értékelést a kategóriádban";}
				break;
			case 6:  //65 nő
				if ($n25<=10)
				{
					$mostdatum=date("Y-m-d");
					mysql_query("INSERT INTO ertekeles VALUES ('$_POST[maz]','$_SESSION[az]','$_POST[vekezd]','$mostdatum','$_POST[szor]','$_POST[erth]','$_POST[akt]')");
					$n65++;
					mysql_query("UPDATE musorossz SET 
					65N='$n65',
					szorakoz='$szorakoz',
					ertheto='$ertheto',
					aktual='$aktual'
					WHERE musorok='$_POST[maz]'");
					print mysql_error();
					print "Értékelés sikeresen beküldve!";
				}
				else { print"Nem tölthetsz fel ehhez a műsorhoz több értékelést a kategóriádban";}
				break;
		}
	}else
	{
		$result=mysql_query("SELECT * FROM musor WHERE id='$_GET[id]'");
		$csat=mysql_result ($result,0,'csataz');
		$maz=mysql_result ($result,0,'maz');
		$vekezd=mysql_result ($result,0,'vekezd');
		$mvege=mysql_result ($result,0,'mvege');
		$korhatar=mysql_result ($result,0,'korhatar');
		switch ($csat) {
			case "CSAT_1": 
				$csat2="Csatorna 1";
			break;
			case "CSAT_2": 
				$csat2="Csatorna 2";
			break;
			case "CSAT_3":
				$csat2="Csatorna 3";
			break;
		}
		if ($korhatar=='K')
		{
			$k="Igen";
		}
		else {$k="Nem";}
		print "
		<form action=index.php?op=ertek method=post class=basic-grey>
		<h5>Értékelni kívánt műsor:</h6>
		<h7><b>Csatorna</b>: $csat2</h7><br><input type=hidden value=$csat name=csataz><input type=hidden value=$vekezd name=vekezd>
		<h7><b>Műsor</b>: $maz</h7><br><input type=hidden value=$maz name=maz>
		<h7><b>Vége lett: </b>: $mvege</h7><br>
		<h7><b>Korhatáros:</b>: $k</h7><br><br>
			<label>
				<span>Szórakoztatás értékelése: </span>
					<select id=example-1to10 name=szor>
						<option value=1 >1</option>
						<option value=2 >2</option>
						<option value=3 >3</option>
						<option value=4 >4</option>
						<option value=5 >5</option>
						<option value=6 >6</option>
						<option value=7 >7</option>
						<option value=8 >8</option>
						<option value=9 >9</option>
					</select>
			</label><br><br>
			<label>
				<span>Érthetőség értékelése: </span>
					<select id=example-1to102 name=erth>
						<option value=1 >1</option>
						<option value=2 >2</option>
						<option value=3 >3</option>
						<option value=4 >4</option>
						<option value=5 >5</option>
						<option value=6 >6</option>
						<option value=7 >7</option>
						<option value=8 >8</option>
						<option value=9 >9</option>
					</select>
			</label><br><br>
			<label>
				<span>Aktualitás értékelése: </span>
					<select id=example-1to103 name=akt>
						<option value=1 >1</option>
						<option value=2 >2</option>
						<option value=3 >3</option>
						<option value=4 >4</option>
						<option value=5 >5</option>
						<option value=6 >6</option>
						<option value=7 >7</option>
						<option value=8 >8</option>
						<option value=9 >9</option>
					</select>
			</label><br><br>
			<label>
					<span>&nbsp;</span> 
					<input type=submit class=button name=gomb value='Értékelés elküldése' /> 
			</label>    
		</form>
		";
	}
?>
</div>
</center>