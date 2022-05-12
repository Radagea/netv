<?php
	include "adatb.php";
	/* $handle = @fopen("file/dolgozo.txt", "r");
	$values='';

	while (!feof($handle))
	{
		$buffer = fgets($handle, 40960); 
		list($az,$szulid,$nem,$meghivta,$bdatum,$email,$akt)=explode(";",$buffer);
		mysql_query("INSERT INTO dolgozo VALUES ('$az','$szulid','$nem','$meghivta','$bdatum','$email','$akt','','')");
	} */
	/*
	$handle = @fopen("file/ertekeles.txt", "r");
	$values='';
	while (!feof($handle))
	{
		$buffer = fgets($handle, 4096); 
		list($maz,$az,$vekezd,$mbekuld,$szorakozp,$erhetop,$aktp)=explode(";",$buffer);
		mysql_query("INSERT INTO ertekeles VALUES ('$maz','$az','$vekezd','$mbekuld','$szorakozp','$erhetop','$aktp')");
	}
	$handle = @fopen("file/musor.txt", "r");
	$values='';
	while (!feof($handle))
	{
		$buffer = fgets($handle, 4096); 
		list($csataz,$maz,$mkezd,$mvege,$korhatar)=explode(";",$buffer);
		list($elso,$masodik)=explode(".",$mvege);
		if(strlen($elso)==1)
		{
			$elso="0".$elso;
		}
		if(strlen($masodik)==1)
		{
			$masodik="0".$masodik;
		}
		$mvege=$elso.":".$masodik.":00";
		mysql_query("INSERT INTO musor VALUES ('$csataz','$maz','$mkezd','$mvege','$korhatar')"); 
	}
	*/
	print "OKÉÉ!";
?>