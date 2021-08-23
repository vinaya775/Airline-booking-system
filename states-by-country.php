<?php
   require_once "db.php";
   $country_id = $_POST["country_id"];
   $result = mysqli_query($conn,"SELECT * FROM cities where country_id = $country_id");
?>
<option value="">Select State</option>
<?php
   while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["code"];?>"><?php echo $row["code"];?></option>
<?php
}