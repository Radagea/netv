<?php
	$i = 0;
	print "<br><table>";
	$dolgozo = mysql_query("SELECT * FROM dolgozo");
	while($row=mysql_fetch_array($dolgozo)) {
		if ($row[aktiv] == 'N') {
			$i++;
			print "<tr><td align=right width=20%>Azonosító: </td><td width=20%><form method=POST action=index.php?op=hr4><input type=submit name='gomb$i'></input></form></td><td align=left width=20%>".$row[az]."</td><td align=right width=20%>Fizetés:</td><td align=left width=20%>".$row[fiz]."</td></tr>";
			print $i;
			if (isset($_POST['gomb'.$i])) {
			mysql_query("INSERT INTO elbocsajtott VALUES ('$row[az]','$row[szulid]','$row[nem]','$row[meghivta]','$row[email]','$row[kat]')");
			mysql_query("DELETE FROM dolgozo WHERE az='$row[az]'");
			header("location: index.php?op=hr4");
		}
		}
	}
	print "</table><br>";
?>