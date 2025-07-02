<?php
$conn = mysqli_connect("localhost:3307", "root", "", "college_fees");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
