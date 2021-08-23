<?php
    $servername='localhost';
    $username='letsgoairlines_user';
    $password='pass@123';
    $dbname = "letsgoairlines";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>