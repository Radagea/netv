<?php
	if (isset($_POST[gomb]))
	{
		mysql_query("UPDATE musorossz SET 
		musorok='$_POST[musor]'
		WHERE musorok='$_POST[regi]'");
		print mysql_error();
		print "<center>Sikeresen módosítottad ezt: $_POST[regi] erre -> $_POST[musor]</center>";
	}else
	{
		print "
			<form action=index.php?op=mumod method=post class=basic-grey>
				<h1>Műsor hozzáadása
					<span>Itt tudod módosítani műsort, amit később műsorra tudsz tűzni.</span>
				</h1>
				<label>
					<span>Műsor neve: </span>
					<input id=text type=text name=musor placeholder=MŰSOR_1 value=$_GET[name] />
				</label> 
				 <label>
					<span>&nbsp;</span> 
					<input type=hidden value=$_GET[name] name=regi>
					<input type=submit class=button name=gomb value=Hozzáadás /> 
				</label>    
			</form>
		";
	}
?>