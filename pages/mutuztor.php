<?php
mysql_query("DELETE FROM musor WHERE id='$_GET[id]'");
print "Műsorra tűzött elem törlése sikeresen megtörtént!";
include "pages/mutuz.php";
?>