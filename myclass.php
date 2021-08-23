<?php

$link = mysqli_connect("localhost", "letsgoairlines_user", "pass@123", "letsgoairlines");
 
// Checking connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$phone_number = mysqli_real_escape_string($link, $_REQUEST['phone_number']);
// Attempt insert query execution
$sql = "INSERT INTO customer (first_name, last_name, email_address , age , gender,phone_number) VALUES ('$first_name', '$last_name', '$email','$age', '$gender', '$phone_number')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>