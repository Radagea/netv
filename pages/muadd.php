<?php
	if(isset($_POST[gomb]))
	{
		if ($_POST[musor]=="")
		{
			print "<center>A műsor neve mező nem lehet üres!</center>
			<form action=index.php?op=muadd method=post class=basic-grey>
				<h1>Műsor hozzáadása
					<span>Itt lehet műsort hozzáadni, amit később műsorra lehet tűzni.</span>
				</h1>
				<label>
					<span>Műsor neve :</span>
					<input id=text type=text name=musor placeholder=MŰSOR_1 />
				</label> 
				 <label>
					<span>&nbsp;</span> 
					<input type=submit class=button name=gomb value=Hozzáadás /> 
				</label>    
			</form>
			";
		} else
		{
			mysql_query("INSERT INTO musorossz VALUES ('$_POST[musor]','','','','','','','','','')");
			print "<center>Műsor hozzáadása sikeres volt!</center>
			<form action=index.php?op=muadd method=post class=basic-grey>
				<h1>Műsor hozzáadása
					<span>Itt lehet műsort hozzáadni, amit később műsorra lehet tűzni.</span>
				</h1>
				<label>
					<span>Műsor neve :</span>
					<input id=text type=text name=musor placeholder=MŰSOR_1 />
				</label> 
				 <label>
					<span>&nbsp;</span> 
					<input type=submit class=button name=gomb value=Hozzáadás /> 
				</label>    
			</form>
			";
		}
	}else
	{
		print "
			<form action=index.php?op=muadd method=post class=basic-grey>
				<h1>Műsor hozzáadása
					<span>Itt lehet műsort hozzáadni, amit később műsorra lehet tűzni.</span>
				</h1>
				<label>
					<span>Műsor neve :</span>
					<input id=text type=text name=musor placeholder=MŰSOR_1 />
				</label> 
				 <label>
					<span>&nbsp;</span> 
					<input type=submit class=button name=gomb value=Hozzáadás /> 
				</label>    
			</form>
		";
		$result=mysql_query("SELECT * FROM musorossz ORDER BY musorok");
		print "<table border=0>
		<tr>
			<td>Műsor neve</td>
			<td>Módosítás</td>
			<td>Törlés</td>
		</tr>
		";
		while($mus=mysql_fetch_array($result))
		{
			print "
				<tr>
					<td>$mus[musorok]</td>
					<td><a href=index.php?name=$mus[musorok]&op=mumod>Módosítás</a></td>
					<td><a href=index.php?name=$mus[musorok]&op=mutor>Törlés</a></td>
				</tr>
			";
		}
		print "</table>";
	}
?>