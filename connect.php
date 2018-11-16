<?php
  $host = 'localhost';
  $user = 'root';
  $db_pass = '';
  $db_name = 'first_db';

  mysql_connect($host, $user, $db_pass) or die("cannot connect to database");
  mysql_select_db($db_name);
 ?>
