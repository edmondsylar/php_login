<?php
  if ($_SERVER['REQUEST_METHOD']=='POST'){
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $db_name = 'first_db';

    mysql_connect("localhost", "root", "") or die (mysql_error());
    mysql_select_db($db_name);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $sqlsearch = mysql_query($query);
    $resultcount = mysql_numrows($sqlsearch);

    if ($resultcount > 0){
      $checker = "SELECT * FROM users where username='$username'";
      $result = mysql_query($checker);
      $new_pass = mysql_fetch_array($result) or die("cannot execute the command");
      if ($new_pass['password'] == $password){
        echo "Passwords match";
      }else{
        echo "Wrong password";
      }
    }else{

    Print '<script>alert("User Doesnt Exist");</script>';
    Print '<script>
      window,location.assign("login.php");
      </script>';
    }
  }
?>
