<?php
	if (isset($_POST[gomb]))
	{
		if ($_POST[honap]>date("m"))
		{
			print "<center>Erről a hónapról még nincsen adatunk! <br></center>
			<form action=index.php?op=atlagpont method=post class=basic-grey>
				<h1>Hónap választás
					<span>Kérem válassz hónapot!</span>
				</h1>
				<label>
					<span>Hónap:</span><select name=honap>
					<option value=1>Január</option>
					<option value=2>Február</option>
					<option value=3>Március</option>
					<option value=4>Április</option>
					<option value=5>Május</option>
					<option value=6>Június</option>
					<option value=7>Július</option>
					<option value=8>Augusztus</option>
					<option value=9>Szeptember</option>
					<option value=10>Október</option>
					<option value=11>November</option>
					<option value=12>December</option>
					</select>
				</label> 
				<label>
					<span>&nbsp;</span> 
					<input type=submit class=button name=gomb value=Tovább /> 
				</label>    
			</form>
			";
		}else {
			print "<h3>Átlagos értékelések ebben a hónapban: </h3><br>
			<h4>25 évnél fiatalabb férfiak: </h4>
			";
			$sz = 0;
			$szo = 0;
			$er= 0;;
			$akt = 0;
			$result2=mysql_query("SELECT * FROM ertekeles ORDER BY maz");
			while($ert=mysql_fetch_array($result2))
			{
				$honap = substr($ert[mbekuld], 5, 2);
				if ($honap==$_POST[honap])
				{
					if ($ert[kat]=='1')
					{
						$szo=$szo+$ert[szorakozp];
						$er=$er+$ert[erhetop];
						$akt=$akt+$ert[aktp];
						$sz++;
					}
				}
			}
			$szoatlag=round($szo/$sz,2);
			$eratlag=round($er/$sz,2);
			$aktatlag=round($akt/$sz,2);
			print "
				<h5>Szórakoztatói átlag: $szoatlag </h5>
				<h5>Érthetőség átlaga: $eratlag</h5>
				<h5>Aktualitás átlaga: $aktatlag</h5>
			<h4>25 évnél fiatalabb nők: </h4>
			";
			$sz = 0;
			$szo = 0;
			$er= 0;;
			$akt = 0;
			$result2=mysql_query("SELECT * FROM ertekeles ORDER BY maz");
			while($ert=mysql_fetch_array($result2))
			{
				$honap = substr($ert[mbekuld], 5, 2);
				if ($honap==$_POST[honap])
				{
					if ($ert[kat]=='2')
					{
						$szo=$szo+$ert[szorakozp];
						$er=$er+$ert[erhetop];
						$akt=$akt+$ert[aktp];
						$sz++;
					}
				}
			}
			$szoatlag=round($szo/$sz,2);
			$eratlag=round($er/$sz,2);
			$aktatlag=round($akt/$sz,2);
			print "
				<h5>Szórakoztatói átlag: $szoatlag </h5>
				<h5>Érthetőség átlaga: $eratlag</h5>
				<h5>Aktualitás átlaga: $aktatlag</h5>
			<h4>25-60 éves férfiak: </h4>
			";
			$sz = 0;
			$szo = 0;
			$er= 0;
			$akt = 0;
			$result2=mysql_query("SELECT * FROM ertekeles ORDER BY maz");
			while($ert=mysql_fetch_array($result2))
			{
				$honap = substr($ert[mbekuld], 5, 2);
				if ($honap==$_POST[honap])
				{
					if ($ert[kat]=='3')
					{
						$szo=$szo+$ert[szorakozp];
						$er=$er+$ert[erhetop];
						$akt=$akt+$ert[aktp];
						$sz++;
					}
				}
			}
			$szoatlag=round($szo/$sz,2);
			$eratlag=round($er/$sz,2);
			$aktatlag=round($akt/$sz,2);
			print "
				<h5>Szórakoztatói átlag: $szoatlag </h5>
				<h5>Érthetőség átlaga: $eratlag</h5>
				<h5>Aktualitás átlaga: $aktatlag</h5>
			<h4>25-60 éves nők: </h4>
			";
			$sz = 0;
			$szo = 0;
			$er= 0;
			$akt = 0;
			$result2=mysql_query("SELECT * FROM ertekeles ORDER BY maz");
			while($ert=mysql_fetch_array($result2))
			{
				$honap = substr($ert[mbekuld], 5, 2);
				if ($honap==$_POST[honap])
				{
					if ($ert[kat]=='4')
					{
						$szo=$szo+$ert[szorakozp];
						$er=$er+$ert[erhetop];
						$akt=$akt+$ert[aktp];
						$sz++;
					}
				}
			}
			$szoatlag=round($szo/$sz,2);
			$eratlag=round($er/$sz,2);
			$aktatlag=round($akt/$sz,2);
			print "
				<h5>Szórakoztatói átlag: $szoatlag </h5>
				<h5>Érthetőség átlaga: $eratlag</h5>
				<h5>Aktualitás átlaga: $aktatlag</h5>
			<h4>60- éves férfiak: </h4>
			";
			$sz = 0;
			$szo = 0;
			$er= 0;
			$akt = 0;
			$result2=mysql_query("SELECT * FROM ertekeles ORDER BY maz");
			while($ert=mysql_fetch_array($result2))
			{
				$honap = substr($ert[mbekuld], 5, 2);
				if ($honap==$_POST[honap])
				{
					if ($ert[kat]=='5')
					{
						$szo=$szo+$ert[szorakozp];
						$er=$er+$ert[erhetop];
						$akt=$akt+$ert[aktp];
						$sz++;
					}
				}
			}
			$szoatlag=round($szo/$sz,2);
			$eratlag=round($er/$sz,2);
			$aktatlag=round($akt/$sz,2);
			print "
				<h5>Szórakoztatói átlag: $szoatlag </h5>
				<h5>Érthetőség átlaga: $eratlag</h5>
				<h5>Aktualitás átlaga: $aktatlag</h5>
			<h4>60- éves nők: </h4>
			";
			$sz = 0;
			$szo = 0;
			$er= 0;
			$akt = 0;
			$result2=mysql_query("SELECT * FROM ertekeles ORDER BY maz");
			while($ert=mysql_fetch_array($result2))
			{
				$honap = substr($ert[mbekuld], 5, 2);
				if ($honap==$_POST[honap])
				{
					if ($ert[kat]=='6')
					{
						$szo=$szo+$ert[szorakozp];
						$er=$er+$ert[erhetop];
						$akt=$akt+$ert[aktp];
						$sz++;
					}
				}
			}
			$szoatlag=round($szo/$sz,2);
			$eratlag=round($er/$sz,2);
			$aktatlag=round($akt/$sz,2);
			print "
				<h5>Szórakoztatói átlag: $szoatlag </h5>
				<h5>Érthetőség átlaga: $eratlag</h5>
				<h5>Aktualitás átlaga: $aktatlag</h5>
			";
		}
	} else
	{
		print "
		<form action=index.php?op=atlagpont method=post class=basic-grey>
			<h1>Hónap választás
				<span>Kérem válassz hónapot!</span>
			</h1>
			<label>
				<span>Hónap:</span><select name=honap>
				<option value=1>Január</option>
				<option value=2>Február</option>
				<option value=3>Március</option>
				<option value=4>Április</option>
				<option value=5>Május</option>
				<option value=6>Június</option>
				<option value=7>Július</option>
				<option value=8>Augusztus</option>
				<option value=9>Szeptember</option>
				<option value=10>Október</option>
				<option value=11>November</option>
				<option value=12>December</option>
				</select>
			</label> 
			<label>
				<span>&nbsp;</span> 
				<input type=submit class=button name=gomb value=Tovább /> 
			</label>    
		</form>
		";
	}
?>