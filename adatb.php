<?php
  $connect=mysql_connect("localhost","dusza09_01","RI8pd48alqt1iQNF")
  or print mysql_error();
  mysql_select_db("dusza09_01",$connect) or print mysql_error();
?>