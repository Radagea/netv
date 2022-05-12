<?php
mysql_query("DELETE FROM musorossz WHERE musorok='$_GET[name]'");
print "<cente>Sikeresen törölve lett ez a műsor: $_GET[name]</center>";
include "pages/muadd.php";
?>