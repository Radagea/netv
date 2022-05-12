<?php session_start();

ob_start();?>
<html>
<head>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<title>Magyar NeTV</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/jquery.min.js"></script>
	<script src="js/zelect.js"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/input.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/tablazatok.css" rel="stylesheet" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/bars-1to10.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }>
	</script>
	<meta name="keywords" content="Online TV műsorok" />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/move-top.js"></script>
	<!-- cdn for modernizr, if you haven't included it already -->
	<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
	<!-- polyfiller file to detect and load polyfills -->
	<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
	<script>
	  webshims.setOptions('waitReady', false);
	  webshims.setOptions('forms-ext', {types: 'date'});
	  webshims.polyfill('forms forms-ext');
	</script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<script>
    $(setup)

    function setup() {
      $('#intro select').zelect({ placeholder:'Válassz...' })
    }
	</script>
</head>
<div class="mother-grid">

	<div class="container">
	
	  <div class="temp-padd">
	  
		 <div class="top-strip">
		 <script> </script>
		 <?php echo "Oldal betöltve: " . date("Y.m.d") . " ";?>
		 <?php echo date( 'G:i',time("H:m:s"));?>
			<!--<div class="address">
				<ul>
					<li><a href="#"><span class="link"> </span>Webcím</a></li>
					<li><a href="mailto:email@email.hu"><span class="mes"> </span>email@email.hu</a></li>
					<li><span class="ph"> </span>0612/34-56-789</li>
				</ul>
			</div>
			<div class="social-icons">
				<ul>
					<li><a href="#"> <span class="w-f"> </span></a></li>
                   <li><a href="#"> <span class="w-tw"> </span></a></li>
                   <li><a href="#"> <span class="w-in"> </span></a></li>
				</ul>
			</div>-->
		  <div class="clearfix"> </div>
	</div>
<div class="title-main">
<img src="images/NeTV_logo_blue_head.png"></img><br>

	<a href="index.php"><h1>Magyar NeTV</h1></a> <?php include"adatb.php";?>
	
	<?php 
			
			if(isset($_SESSION[login_email]))
			{
				if(isset($_SESSION[login_rang]))
				{
					print "Üdv itt: ";
					switch ($_SESSION[login_rang]) {
					case 1:
						echo "szakmai vezető";
						break;
					case 2:
						echo "rendszergazda";
						break;
					case 3:
						echo "pénzügyi vezető";
						break;
					case 4:
						echo "ellenőr";
						break;
					case 5:
						echo "programfelelős";
						break;
					case 6:
						echo "HR-es";
						break;
					}
				}else
				{
				print "<div align=left>Üdv itt $_SESSION[login_email]!";
				}
			}
	?>
</div>
<div class="header">
	<div class=navg>
	<section id="wrapper">
		<nav>
			<ul>
				<li><a href="index.php">Főoldal</a></li>
				<?php 
				if (isset($_SESSION[login_email]))
				{
					if (isset($_SESSION[login_rang]))
					{	
						switch ($_SESSION[login_rang]) {
							case 1: //szakmai vezető menük
								print "<li><a href=index.php?op=atlagpont>Átlagosan adott pontok</a></i>";
								print "<li><a href=index.php?op=szakvez>Legjobb/Legrosszabb</a></i>";
								break;
							case 2: //rendszergazda menük
								break;
							case 3: //pénzügyi menük
								print "<li><a href=index.php?op=penz2>Kifizetés</a></i>";
								break;
							case 4: //ellenőr menük
								print "<li><a href=index.php?op=ell_hatarido_tullepes>Határidő túllépés</a></i>";
								print "<li><a href=index.php?op=ell_kiskoru_korhataros>Kiskorú korhatáros</a></i>";
								break;
							case 5:  //programfelelős menük
								print "<li><a href=index.php?op=muadd>Műsor hozzáadása</a></i>";
								print "<li><a href=index.php?op=mutuz>Műsor műsorra tűzése</a></i>";
								break;
							case 6: //HR-es menük
								print "<li><a href=index.php?op=hr>Listázás</a></i>
										<li><a href=index.php?op=hrdolgfelv>Ajánlások kezelése</a></i>
										<li><a href=index.php?op=hr4>Inaktív dolgozók</a></i>";
								break;
						}
				}
					else {
						print "
						<li><a href=index.php?op=dolgdolgfelv>Dolgozó ajánlása</a></i>
						<li>
							<a class=dropdown href=>Műsorfüzet</a>
							<ul>
								<li><a href=index.php?op=musorfuzet&az=csat_1>Csatorna 1</a></li>
								<li><a href=index.php?op=musorfuzet&az=csat_2>Csatorna 2</a></li>
								<li><a href=index.php?op=musorfuzet&az=csat_3>Csatorna 3</a></li>
							</ul>
						</li>
						";
					}
					print " <li><a href=index.php?op=destroy>Kijelentkezés</a></li>";
				}else
				{
					print "
					<li><a href=index.php?op=dolglog>Dolgozó bejelentkezés</a></li>
					<li><a href=index.php?op=munklog>Munkatárs bejelentkezés</a></li>
					<!--<li><a href=>otodik</a></li>-->
					";
				}
				?>
			</ul>
		</nav>
	</section>
</div>	
 </div>
 	<div class="clearfix"> </div>
	<div class="nuncdig">
		<?php
			if(isset($_GET["op"]) && $_GET["op"]!="") {
				$op = $_GET["op"];
				if(file_exists("pages/".$op.".php")) {
					include_once ("pages/".$op.".php");
				} else {
					include_once ("pages/404.php");
				}
			} else {
				include_once("pages/main.php");
			}
		?>
	</div>
	<div class="clearfix"> </div>
</div>

 <div class="footer">
		<div class="footer-main">

		<!--
			<div class="footer-top">
				<div class="col-md-4 footer-grid">
					<img src="images/ftr-fa.png" alt=""/>
				<a href="#"><h3>@john doe</h3></a>
					<p>Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis eupulvinar nuncint</p>
					<h4>3 hrs ago</h4>
				</div>
				<div class="col-md-4 footer-grid">
					<img src="images/tw.png" alt=""/>
					<a href="#"><h3>@Malorum</h3></a>
					<p>Jovined semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis.</p>
					<h4>3 hrs ago</h4>
				</div>
				<div class="col-md-4 footer-grid">
					<img src="images/drib.png" alt=""/>
					<a href="#"><h3>@Bonorum</h3></a>
					<p>Citened semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis egesti ante</p>
					<h4>3 hrs ago</h4>
				</div> 
			  <div class="clearfix"> </div>
			</div>-->
			<div class="footer-bottom">
			<table><tr>
				<td><h4 align=left style="color:white">Címünk:</h4><p align=left>Budapest, Intenet utca 101.</p></td>
				<td><p align=center>Magyar NeTV kft.</p></td>
				<td><p align=right>Készítette: <a href="index.php?op=vyrus"><img src="images/Vyrus_80.png"></img></a></p></td>
			</tr></table>
		</div>
	   </div>
	</div>
</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

	<script src="js/jquery.barrating.js"></script>
	<script src="js/examples.js"></script>
</body>
</html>

