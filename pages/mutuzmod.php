<?php
	if(isset($_POST[gomb]))
	{
		if($_POST[korhatar]=="")
		{
			$_POST[korhatar]="N";
		}
		$mkezd=$_POST[kdatum].' '.$_POST[kido];
		mysql_query("UPDATE musor SET 
		csataz='$_POST[csat]',
		maz='$_POST[musor]',
		mkezd='$mkezd',
		mvege='$_POST[bido]',
		korhatar='$_POST[korhatar]'
		WHERE id='$_POST[regi]'");
		print mysql_error();
		print "<center>Sikeresen módosítottad!</center>";
	}else
	{
		$result=mysql_query("SELECT * FROM musor WHERE id='$_GET[id]'");
		$csat=mysql_result ($result,0,'csataz');
		$maz=mysql_result ($result,0,'maz');
		$mkezd=mysql_result ($result,0,'mkezd');
		$mvege=mysql_result ($result,0,'mvege');
		$korhatar=mysql_result ($result,0,'korhatar');
		list($mdate,$mtime)=explode(" ",$mkezd);
		print "
			<form action=index.php?op=mutuzmod method=post class=basic-grey>
				<h1>Műsortűzés
					<span>Itt lehet már műsorra tűzött műsört módosítani.</span>
				</h1>
				<section id=intro>				
				<label>
					<span>Műsor választás:</span>
					<select name=musor>";
					$result=mysql_query("SELECT * FROM musorossz ORDER BY musorok");
					while($mus=mysql_fetch_array($result))
					{
						print "<option value=$mus[musorok]"; if($mus[musorok==$maz]) {print " selected";}print ">$mus[musorok]</option>";
					}
					print "</select>
				</label>
				</section>
				<label>
					<span>Csatorna választása:</span><select name=csat>
					<option value=CSAT_1"; if($csat=="CSAT_1"){print " selected";} print">Csatorna 1</option>
					<option value=CSAT_2"; if($csat=="CSAT_2"){print " selected";} print">Csatorna 2</option>
					<option value=CSAT_3"; if($csat=="CSAT_3"){print " selected";} print">Csatorna 3</option>
					</select>
				</label> 
				<label>
					<span>Kezdési dátum: </span>
					<input type=date name=kdatum value=$mdate>
				</label>
				<label>
					<span>Kezdési idő: </span>
					<input type=time name=kido value=$mtime>
				</label>
				<label>
					<span>Befejezési idő: </span>
					<input type=time name=bido value=$mvege>
				</label>
				<label>
					<span>Korhatáros</span>
					<input type=checkbox name=korhatar value=K"; if($korhatar=='K'){print " checked";} print" >
				</label><br>
				<label>
					<span>&nbsp;</span> 
					<input type=hidden value=$_GET[id] name=regi>
					<input type=submit class=button name=gomb value='Műsorra tűzés' /> 
				</label>    
			</form>
		";
	}
?>