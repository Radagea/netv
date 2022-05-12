<?php
print "<br><center><h3>".$_GET[az]." Által meghívott emberek</h3></center><br><table>";
$dolgozo2 = mysql_query("SELECT * FROM dolgozo WHERE meghivta='$_GET[az]'");
					while ($row=mysql_fetch_array($dolgozo2)) {
						print "<tr><td align=right>Azonosító</td><td align=left>".$row[az]."</td><td align=right>E-mail:  </td><td align=left>".$row[email]."</td></tr>"; 
					}
						print "</table><br>";
?>