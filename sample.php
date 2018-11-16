<?php
  require('connect.php');
  $result = mysql_query("SELECT * FROM users");

  echo "<table>";
  while ($row = mysql_fetch_array($result)){
    echo "<tr><td>". $row['username'] . "</td><td>" . $row['password'] . "</td></tr>";
  }
echo "</table>";
mysql_close();
 ?>
