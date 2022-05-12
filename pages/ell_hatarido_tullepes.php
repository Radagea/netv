<?php
	include "adatb.php";
	//$ThatTime ="11:08:10";
    //if (time() >= strtotime($ThatTime)) 
	//{ echo "ok"; }
	$result=mysql_query("SELECT * FROM ertekeles WHERE vekezd!='0000-00-00 00:00:00'");
	$i=1;
	while($row=mysql_fetch_assoc($result))
	{
		//a mûsor hossz lekérdezése
		$res2=mysql_query("SELECT mkezd, mvege FROM musor WHERE maz='$row[maz]' and mkezd='$row[vekezd]'"); 
		$kezd=mysql_result($res2,0,'mkezd');
		$kezd2=substr($kezd,strlen($kezd)-8,8);
		$vege=mysql_result($res2,0,'mvege');
		
		$bekuld=substr($row[mbekuld],strlen($row[mbekuld])-8,8);
		$bekuld=strtotime($bekuld);
		//$hossz=date("H:i:s",strtotime($vege)-strtotime($kezd));
		$harmincperc="00:30:00";
		$hatarido=date("H:i:s",strtotime($vege)-strtotime($harmincperc));
		$hatarido2=strtotime($hatarido);
		if ($hatarido2<$bekuld)
		{
			print "$i - $row[az] - $row[maz] - $kezd<br>";
			$i++;
		}
		//print "$kezd - $vege = $hossz<br>$hatarido --- $row[mbekuld]<br>";
		//print "... $hatarido2 < $bekuld<br>";
 	}
?>