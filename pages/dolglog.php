<?php
	if (isset($_POST[gomb]))
	{
		print "az='$_POST[text]' and email='$_POST[email]'";
		$result=mysql_query("SELECT * FROM dolgozo WHERE az='$_POST[text]' and email='$_POST[email]'");
		if (mysql_num_rows($result)>0)
		{
			$_SESSION[login_email]=mysql_result($result,0,'email');
			$_SESSION[datum]=mysql_result($result,0,'szulid');
			$_SESSION[kat]=mysql_result($result,0,'kat');
			$_SESSION[az]=mysql_result($result,0,'az');
			header('location: index.php');
			exit();
		}
		else 
		{
			print "Felhasználó és/vagy jelszó helytelen!";
		}
	} else	
	{
		print "
			<form action=index.php?op=dolglog method=post class=basic-grey>
				<h1>Bejelentkezés
					<span>Bejelentkezés dolgozóként.</span>
				</h1>
				<label>
					<span>E-mail cím: </span>
					<input id=email type=text name=email placeholder=pelda@pelda.hu />
				</label>
				<label>
					<span>Azonosító: </span>
					<input id=text type=text name=text placeholder=Azonosító />
				</label>  
				 <label>
					<span>&nbsp;</span> 
					<input type=submit class=button name=gomb value=Bejelentkezés /> 
				</label>    
			</form>
		";
	} 
?>