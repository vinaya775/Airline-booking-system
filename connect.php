
<?php  
$host = 'localhost';  
$user = 'letsgoairlines_user';  
$pass = 'pass@123';  
$conn = mysqli_connect($host, $user, $pass);  
if(! $conn )  
{  
  die('Could not connect: ' . mysqli_error());  
}  

mysqli_close($conn);  
?>  

