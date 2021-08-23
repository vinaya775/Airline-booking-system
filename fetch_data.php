<?php
if(isset($_POST['get_option']))
{
 $host = 'localhost';
 $user = 'letsgoairlines_user';
 $pass = 'pass@123';
 mysql_connect($host, $user, $pass);
 mysql_select_db('letsgoairlines');

 $state = $_POST['get_option'];
 $find=mysql_query("select code from cities where code='$code'");
 while($row=mysql_fetch_array($find))
 {
  echo "<option>".$row['code']."</option>";
 }
 exit;
}
?>