<?php
$db_name = "first_db";
  mysql_connect("localhost", "root", "")or die(mysql_error());
  mysql_select_db($db_name) or die("cannot connect to database");
   if (isset($_POST['username']) and isset($_POST['Password'])){
     $username = $_POST['username'];
     $password = $_POST['password'];

     // $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
     $result = mysql_query("SELECT * FROM users WHERE username='$username' and password='$password'") or die(mysql_error());
     $count = mysql_num_rows($result);

     if ($count == 1){
       $_SESSION['username'] = $username;

     }else{
       $fmsg = "invalid login credentials";
     }
   }
   if (isset($_SESSION['username'])){
     $username = $_SESSION['username'];
     echo "Hai" . $username . "";
     echo "This is the users Area";
     echo "<a href='logout.php'>Logout</a>";
   }else{
     Print '<script>alert("user not exists") </script>';
     Print '<script>window.location.assign("login.php")</script>';

   }

 ?>
