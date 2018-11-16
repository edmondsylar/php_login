<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>register</title>
  </head>
  <body>

    <a href="index.php">Click here to go back</a>
    <h2>Registration Page</h2>
    <form class="" action="register.php" method="POST">
      Enter username: <input type="text" name="username" required><br>
      Enter password: <input type="password" name="password" required> <br>
      <input type="submit" name="" value="Register"/>
    </form>
  </body>
</html>
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
      Print '<script>alert("Username already taken");</script>';
      Print '<script>
        window,location.assign("register.php");
        </script>';
        
    }else{
    mysql_query("INSERT INTO users(username, password)VALUES('$username', '$password')") or die(mysql_error());
    Print '<script>alert("User created");</script>';
    Print '<script>
      window,location.assign("register.php");
      </script>';
    }
  }
?>
