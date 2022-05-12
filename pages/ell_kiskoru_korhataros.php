<?php
	include "adatb.php";
	$result=mysql_query("SELECT * FROM ertekeles");
	$i=1;
	while($row=mysql_fetch_assoc($result))
	{
		//a mûsor hossz lekérdezése
		$res2=mysql_query("SELECT korhatar, maz, mkezd FROM musor WHERE maz='$row[maz]'"); 
		print mysql_error();
		$korhatar=mysql_result($res2,0,'korhatar');
		//print "$korhatar<br>";
		if ($korhatar=='K')
		{
			$res3=mysql_query("SELECT szulid FROM dolgozo WHERE az='$row[az]'"); 
		    print mysql_error();
			$szulido=mysql_result($res3,0,'szulid');
			$kezd=mysql_result($res2,0,'mkezd');

			$eletkor=date('Y',strtotime($kezd)) - date('Y',strtotime($szulido) )."</br>";
			//print $eletkor;
			if ($eletkor<18)
			{
				print "$i - $row[az] --- $row[maz] --- $kezd<br>";
				$i++;
			}
		}
 	}
?>