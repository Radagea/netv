<?php
	if (isset($_POST[gomb]))
	{
		$result=mysql_query("SELECT * FROM munklog WHERE belepokod='$_POST[belepkod]'");
		if (mysql_num_rows($result)>0)
		{
			$_SESSION[login_email]=mysql_result($result,0,'belepokod');
			$_SESSION[login_rang]=mysql_result($result,0,'rang');
			$_SESSION[belepesd]=date("Y-m-d");
			if(empty($_POST[datum]))
			{
				$datum=date("Y-m-d");
				list($ev,$honap,$nap)=explode("-",$datum);
				$_SESSION[vhonap]=$honap;
			}else
			{
				$_SESSION[vdatum]=$_POST[datum];
				list($ev,$honap,$nap)=explode("-",$_POST[datum]);
				$_SESSION[vhonap]=$honap;
			}
				
			header('location: index.php');
			exit();
		}
		else 
		{
			print "Helytelen belépőkód!!";
		}
	} else	
	{
		print "
			<form action=index.php?op=munklog method=post class=basic-grey>
				<h1>Bejelentkezés
					<span>Bejelentkezés munkatársként</span>
				</h1>
				<label>
					<span>Belépőkód: </span>
					<input id=text type=text name=belepkod placeholder=Belépőkód />
				</label>
				<label>
					<span><!--Dátum választás:--></span>
					<input id=text type=date name=datum />
				</label>
				 <label>
					<span>&nbsp;</span> 
					<input type=submit class=button name=gomb value=Bejelentkezés /> 
				</label>    
			</form>
			<center>
				<br><h1>Segítség a bejelentkezéshez:</h1><br>
				<p>Rang: Szakmai Vezető | Belépőkód: Qv6zWqxq</p><br>
				<p>Rang: Rendszergazda | Belépőkód: KhvkpYEM</p><br>
				<p>Rang: Pénzügyi Vezető | Belépőkód: yDhm9vhz</p><br>
				<p>Rang: Ellenőr | Belépőkód: bWU4V4Zy</p><br>
				<p>Rang: Programfelelő | Belépőkód: rbFNnyRK</p><br>
				<p>Rang: HR-es | Belépőkód: g25cm6Fp </p><br><br>
			</center>
		";
	} 
?>