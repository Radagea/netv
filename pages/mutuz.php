<?php
	if(isset($_POST[gomb]))
	{
	/*	if ($_POST[musor]=="" || $_POST[csat]=="" || $_POST[kdatum]=="" || $_POST[kido]=="" || $_POST[bido]=="")
		{
			print"Egy mezőt sem hagyhatsz üresen!!";
		} */
		/* else { */
			if($_POST[korhatar]=="")
			{
				$_POST[korhatar]="N";
			}
			$datum = $_POST[kdatum]." ".$_POST[kido];
			$kido = strtotime($_POST[kido]);
			$bido = strtotime($_POST[bido]);
			$kido = $kido/60;
			$bido = $bido/60;
			$kulonb = $bido-$kido;
			if($kulonb>60)
			{
				$zsozso=1000;
			}else
			{
				if($kulon>40)
				{
					$zsozso=750;
				}else
				{
					$zsozso=500;
				}
			}
			mysql_query("INSERT INTO musor VALUES ('$_POST[csat]','','$_POST[musor]','$datum','$_POST[bido]','$_POST[korhatar]','$zsozso')");
			print "Műsor tűzés sikeresen megtörtént";
		//}
	}else {
		print "
			<form action=index.php?op=mutuz method=post class=basic-grey>
				<h1>Műsortűzés
					<span>Itt lehet műsort műsorra tűzni.</span>
				</h1>
				<section id=intro>				
				<label>
					<span>Műsor választás::</span>
					<select name=musor>";
					$result=mysql_query("SELECT * FROM musorossz ORDER BY musorok");
					while($mus=mysql_fetch_array($result))
					{
						print "<option value=$mus[musorok]>$mus[musorok]</option>";
					}
					print "</select>
				</label>
				</section>
				<label>
					<span>Csatorna választása:</span><select name=csat>
					<option value=CSAT_1>Csatorna 1</option>
					<option value=CSAT_2>Csatorna 2</option>
					<option value=CSAT_3>Csatorna 3</option>
					</select>
				</label> 
				<label>
					<span>Kezdési dátum: </span>
					<input type=date name=kdatum>
				</label>
				<label>
					<span>Kezdési idő: </span>
					<input type=time name=kido>
				</label>
				<label>
					<span>Befejezési idő: </span>
					<input type=time name=bido>
				</label>
				<label>
					<span>Korhatáros</span>
					<input type=checkbox name=korhatar value=K >
				</label><br>
				<label>
					<span>&nbsp;</span> 
					<input type=submit class=button name=gomb value='Műsorra tűzés' /> 
				</label>    
			</form>
		";
		$result=mysql_query("SELECT * FROM musor ORDER BY csataz,maz");
		print "<table border=0>
		<tr>
			<td>Csatorna azonosító</td>
			<td>Műsor neve</td>
			<td>Kezdés</td>
			<td>Vége</td>
			<td>Korhatár</td>
			<td>Módosítás</td>
			<td>Törlés</tđ>
		</tr>
		";
		while($mus=mysql_fetch_array($result))
		{
			print "
				<tr>
					<td>$mus[csataz]</td>
					<td>$mus[maz]</td>
					<td>$mus[mkezd]</td>
					<td>$mus[mvege]</td>
					<td>$mus[korhatar]</td>
					<td><a href=index.php?id=$mus[id]&op=mutuzmod	>Módosítás</a></td>
					<td><a href=index.php?id=$mus[id]&op=mutuztor >Törlés</a></td>
				</tr>
			";
		}
		print "</table><br><br>";
	}
?>