<div class="project">
<?php
	if (isset($_POST[dategomb]))
	{
		print "
		<form action=index.php?op=musorfuzet&az=$_GET[az] method=post class=basic-grey>
			<h1>Dátum választása
				<span>Dátum választása, régebbi vagy újabb műsor megtekintéséhez!</span>
			</h1>
			<label>
				<span><!--Dátum választás:--></span>
				<input type=date class=text name=datum>
			</label> 
			<label>
				<span>&nbsp;</span> 
				<input type=submit class=button name=dategomb value=Tovább /> 
			</label>    
		</form>
		";
		switch ($_GET[az]) {
			case "csat_1": 
				$csat="Csatorna 1";
			break;
			case "csat_2": 
				$csat="Csatorna 2";
			break;
			case "csat_3":
				$csat="Csatorna 3";
			break;
		}
		print "<h2>Ez itt a $csat $_POST[datum] műsor füzete!</h2>";
		$result=mysql_query("SELECT * FROM musor WHERE csataz='$_GET[az]' ORDER BY mkezd");
		print "<table border=0>
			<tr>
				<td>Műsor neve</td>
				<td>Kezdés</td>
				<td>Vége</td>
				<td>Korhatáros?</td>
				<td>Értékelés</td>
			</tr>
		";
		$tajm=date( 'G:i',time("H:m:s"));
		$tajm=$tajm.":"."00";
		while($row=mysql_fetch_array($result))
		{
			list($datum,$ido)=explode(" ",$row[mkezd]);
			if($datum==$_POST[datum])
			{
				print "
					<tr>
						<td>$row[maz]</td>
						<td>$ido</td>
						<td>$row[mvege]</td>
						<td>"; if($row[korhatar]=='K'){print "Igen";}else {print"Nem";}print"</td>
						<td>"; 
							if($datum<date("Y-m-d")){
								if ($row[mvege]<"01:00:00")
								{
										if($row[korhatar]=='K')
										{
											if (date("Y-m-d")-$_SESSION[datum]<18)
											{
											}else
											{
											print"<div class=proj-bwn>
												<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
											</div>";	
											}
										}
										else
										{
											print"<div class=proj-bwn>
												<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
											</div>";	
										}
								}else
								{
									if($row[korhatar]=='K')
										{
											if (date("Y-m-d")-$_SESSION[datum]<18)
											{
											}
											else
											{
											print"<div class=proj-bwn>
												<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
											</div>";	
											}
										}
										else
										{
											print"<div class=proj-bwn>
												<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
											</div>";	
										}
								}
							}else
							{
								if($datum>date("Y-m-d")){
								}
								else
								{
									if ($row[mvege]<"01:00:00")
									{
											if($row[korhatar]=='K')
											{
												if (date("Y-m-d")-$_SESSION[datum]<18)
												{
												}else
												{
												print"<div class=proj-bwn>
													<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
												</div>";	
												}
											}
											else
											{
												print"<div class=proj-bwn>
													<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
												</div>";	
											}
									}else
									{
										if($row[korhatar]=='K')
											{
												if (date("Y-m-d")-$_SESSION[datum]<18)
												{
												}
												else
												{
												print"<div class=proj-bwn>
													<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
												</div>";	
												}
											}
											else
											{
												print"<div class=proj-bwn>
													<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
												</div>";	
											}
									}
								}
							}
						print "</td>
					</tr>
				";
			}
		}
		print "</table><br><br>";
	}
	else 
	{
		print "
		<form action=index.php?op=musorfuzet&az=$_GET[az] method=post class=basic-grey>
			<h1>Dátum választása
				<span>Dátum választása, régebbi vagy újabb műsor megtekintéséhez!</span>
			</h1>
			<label>
				<span><!--Dátum választás:--></span>
				<input type=date class=text name=datum>
			</label> 
			<label>
				<span>&nbsp;</span> 
				<input type=submit class=button name=dategomb value=Tovább /> 
			</label>    
		</form>
		";
		switch ($_GET[az]) {
			case "csat_1": 
				$csat="Csatorna 1";
			break;
			case "csat_2": 
				$csat="Csatorna 2";
			break;
			case "csat_3":
				$csat="Csatorna 3";
			break;
		}
		print "<h2>Ez itt a $csat mai műsor füzete!</h2>";
		$result=mysql_query("SELECT * FROM musor WHERE csataz='$_GET[az]' ORDER BY mkezd");
		print "<table border=0>
			<tr>
				<td>Műsor neve</td>
				<td>Kezdés</td>
				<td>Vége</td>
				<td>Korhatáros?</td>
				<td>Értékelés</td>
			</tr>
		";
		$tajm=date( 'G:i',time("H:m:s"));
		$tajm=$tajm.":"."00";
		while($row=mysql_fetch_array($result))
		{
			list($datum,$ido)=explode(" ",$row[mkezd]);
			if($datum==Date("Y-m-d"))
			{
				print "
					<tr>
						<td>$row[maz]</td>
						<td>$ido</td>
						<td>$row[mvege]</td>
						<td>"; if($row[korhatar]=='K'){print "Igen";}else {print"Nem";}print"</td>
						<td>"; 
							if($row[mvege]<=$tajm){
								if ($row[mvege]<"01:00:00")
								{
									if($datum>=Date("Y-m-d+1"))
									{
										if($row[korhatar]=='K')
										{
											if (date("Y-m-d")-$_SESSION[datum]<18)
											{
											}else
											{
											print"<div class=proj-bwn>
												<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
											</div>";	
											}
										}
										else
										{
											print"<div class=proj-bwn>
												<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
											</div>";	
										}
									}
								}else
								{
									if($row[korhatar]=='K')
										{
											if (date("Y-m-d")-$_SESSION[datum]<18)
											{
											}
											else
											{
											print"<div class=proj-bwn>
												<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
											</div>";	
											}
										}
										else
										{
											print"<div class=proj-bwn>
												<a href=index.php?op=ertek&id=$row[id]>Értékelés</a>
											</div>";	
										}
								}
							}
						print "</td>
					</tr>
				";
			}
		}
		print "</table><br><br>";
	}
?>
</div>