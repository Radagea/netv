<?php
	/*print "<table>";
	$time = "2016-01-22";
	$ertekeles = mysql_query("SELECT DISTINCT az FROM ertekeles");
	$dolgozo = mysql_query("SELECT * FROM dolgozo");
	while($row=mysql_fetch_array($ertekeles)) {
		while($row2=mysql_fetch_array($dolgozo)) {
			if ($row[az] == $row2[az]) {
				$time = date("Y-m-d");
				$szul = $row2[szulid];
			$kulszul = $time - $szul;}
		}
		print "<tr><td>Azonosító:</td><td><a href=index.php?op=penz2&az=$row[az]>".$row[az]."</a></td></tr>";
	}
	print "</table>";*/
	print "a. Leadott minősítésekre fizetendő bér napi bontásban<br>
b.	Bérelszámoló lap dolgozónként<br>
c.	Hó végi utalások összege dolgozónként<br>
d.	Ellenőr jogkörrel rendelkezők felületének ismertetése<br>
e.	Gyanús minősítések listája az elkövetett szabálytalanságok szerint dolgozókkal<br>";
?>