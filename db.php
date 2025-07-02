<?php
$conn = mysqli_connect("localhost", "root", "", "college_fees");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
