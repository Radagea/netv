<?php
	include("../adatb.php");
	$result=mysql_query("SELECT * FROM kategoria ORDER BY katszam");
	print mysql_error();
	while($row=mysql_fetch_assoc($result))
	{
		switch ($row[katszam])
		{
			case 1: $cim='25 év alatti férfiak'; break;
			case 2: $cim='25 év alatti nők'; break;
			case 3: $cim='25-60 közötti férfiak'; break;
			case 4: $cim='25-60 közötti nők'; break;
			case 5: $cim='60 év feletti férfiak'; break;
			case 6: $cim='60 év feletti nők'; break;
		}
		
		//print $_SESSION[vhonap]."<br>";
		print "<br><b>Kategória - $cim  (aktuális hónapban - $_SESSION[vhonap])</b><br><br> &nbsp&nbsp&nbsp Legjobb értékelésű filmek:<br>";
		$res2=mysql_query("SELECT maz, avg(szorakozp) as atlag FROM ertekeles WHERE 
		kat='$row[katszam]' and month(mbekuld)='$_SESSION[vhonap]' GROUP BY maz ORDER BY atlag DESC LIMIT 0,3");
		print mysql_error();
		while($row2=mysql_fetch_assoc($res2))
		{
			print "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row2[maz] - $row2[atlag] <br>";
		}
		
		print "&nbsp&nbsp&nbsp Legrosszabb értékelésű filmek:<br>";
	    $res2=mysql_query("SELECT maz, avg(szorakozp) as atlag FROM ertekeles WHERE 
		kat='$row[katszam]' and month(mbekuld)='$_SESSION[vhonap]' GROUP BY maz ORDER BY atlag LIMIT 0,3");
		print mysql_error();
		while($row2=mysql_fetch_assoc($res2))
		{
			print "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row2[maz] - $row2[atlag] <br>";
		}

		//print $_SESSION[vhonap]."<br>";
		print "<br><b>Kategória - $cim  (összesítve - $_SESSION[vhonap])</b><br><br> &nbsp&nbsp&nbsp Legjobb értékelésű filmek:<br>";
		$res2=mysql_query("SELECT maz, avg(szorakozp) as atlag FROM ertekeles WHERE 
		kat='$row[katszam]' GROUP BY maz ORDER BY atlag DESC LIMIT 0,3");
		print mysql_error();
		while($row2=mysql_fetch_assoc($res2))
		{
			print "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row2[maz] - $row2[atlag] <br>";
		}
		
		print "&nbsp&nbsp&nbsp Legrosszabb értékelésű filmek:<br>";
	    $res2=mysql_query("SELECT maz, avg(szorakozp) as atlag FROM ertekeles WHERE 
		kat='$row[katszam]' GROUP BY maz ORDER BY atlag LIMIT 0,3");
		print mysql_error();
		while($row2=mysql_fetch_assoc($res2))
		{
			print "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row2[maz] - $row2[atlag] <br>";
		}
	}
?>