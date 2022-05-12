<div class="project">
	<?php
		if (isset($_SESSION[login_email]))
		{
			if(isset($_SESSION[login_rang]))
			{
				switch ($_SESSION[login_rang]) {
				case 1:
					include "szvmain.php";
					break;
				case 2:
					include "rszmain.php";
					break;
				case 3:
					include "penzmain.php";
					break;
				case 4:
					include "ellmain.php";
					break;
				case 5:
					include "pfmain.php";
					break;
				case 6:
					include "hrmain.php";
					break;
				}
			}
			else
			{
				include "dolgmain.php";
			}
		}else
		{
			print "
			<h3>Az oldalra be kell jelentkezned!</h3>
			<p>Be kell jelentkezned az oldalra, hogy elkezdd a munkát! Regisztrációhoz meghívót kell kapnod!</p>
			";
		}
	?>
</div>