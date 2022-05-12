<?php
	 /* include"adatb.php";
	$result=mysql_query("SELECT DISTINCT maz FROM musor");
	print mysql_error();
	while($row=mysql_fetch_array($result))
	{
		mysql_query("INSERT INTO musorossz VALUES ('$row[maz]','','','','','','','','','')");
	}
	
	$result=mysql_query("SELECT * FROM musorossz ORDER BY musorok");
	$result2=mysql_query("SELECT * FROM ertekeles ORDER BY maz");
	$result3=mysql_query("SELECT * FROM dolgozo ORDER BY az");
	
	while($dolg=mysql_fetch_array($result3))
	{
		mysql_query("UPDATE ertekeles SET 
		kat='$dolg[kat]'
		WHERE az='$dolg[az]'");
		print mysql_error();
	} 
	
	while($ert=mysql_fetch_array($result2))
	{
		$result4=mysql_query("SELECT * FROM musorossz WHERE musorok='$ert[maz]'");
		$n25=mysql_result ($result4,0,'25N');
		$f25=mysql_result ($result4,0,'25F');
		$n2565=mysql_result ($result4,0,'2565N');
		$f2565=mysql_result ($result4,0,'2565F');
		$n65=mysql_result ($result4,0,'65N');
		$f65=mysql_result ($result4,0,'65F');
		switch ($ert[kat]) {
		case 1:
			$f25++;
			break;
		case 2:
			$n25++;
			break;
		case 3:
			$f2565++;
			break;
		case 4:
			$n2565++;
			break;
		case 5:
			$f65++;
			break;
		case 6:
			$n65++;
			break;
		}
		mysql_query("UPDATE musorossz SET 
		25N='$n25',
		25F='$f25',
		2565N='$n2565',
		2565F='$f2565',
		65N='$n65',
		65F='$f65'
		WHERE musorok='$ert[maz]'");
		print mysql_error();
	}
	
	$result=mysql_query("SELECT * FROM musorossz ORDER BY musorok");
	$result2=mysql_query("SELECT * FROM ertekeles ORDER BY maz");
	$result3=mysql_query("SELECT * FROM dolgozo ORDER BY az");
	while($ert=mysql_fetch_array($result2))
	{
		$result5=mysql_query("SELECT * FROM musorossz WHERE musorok='$ert[maz]'");
		$szorakoz=mysql_result ($result5,0,'szorakoz');
		$erheto=mysql_result ($result5,0,'ertheto');
		$aktual=mysql_result ($result5,0,'aktual');
		$szorakoz=$szorakoz+$ert[szorakozp];
		$erheto=$erheto+$ert[erhetop];
		$aktual=$aktual+$ert[aktp];
		mysql_query("UPDATE musorossz SET 
		szorakoz='$szorakoz',
		aktual='$aktual',
		ertheto='$erheto'
		WHERE musorok='$ert[maz]'");
		print mysql_error();
	} */
	$result6=mysql_query("SELECT * FROM musor ORDER BY id");
	while($row=mysql_fetch_array($result6))
	{
		$result7=mysql_query("SELECT * FROM musor WHERE id=$row[id]");
		$mkezd=mysql_result ($result7,0,'mkezd');
		$mvege=mysql_result ($result7,0,'mvege');
		list($ev,$ido)=explode(" ",$mkezd);
		$kido = strtotime($ido);
		$bido = strtotime($mvege);
		$kido = $kido/60;
		$bido = $bido/60;
		$kulonb = $bido-$kido;
		if($kulonb>60)
		{
			$zsozso=1000;
		}else
		{
			if($kulon>40)
			{
				$zsozso=750;
			}else
			{
				$zsozso=500;
			}
		}
		
		print "k1";
	}
	print "ok";
?>