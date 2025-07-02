<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Submit Fees</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Submit Fees</h2>
  <form method="POST">
    Roll No: <input type="text" name="roll" required><br>
    Hostel Fee: <input type="number" name="hostel" value="0"><br>
    Admission Fee: <input type="number" name="admission" value="0"><br>
    Registration Fee: <input type="number" name="registration" value="0"><br>
    <input type="submit" name="submit_fee" value="Submit Fees">
  </form>
</div>
</body>
</html>

<?php
if (isset($_POST['submit_fee'])) {
  $roll = $_POST['roll'];
  $hostel = $_POST['hostel'];
  $admission = $_POST['admission'];
  $registration = $_POST['registration'];
  $date = date("Y-m-d");

  $sql = "INSERT INTO payments (roll, hostel_fee, admission_fee, registration_fee, payment_date) 
          VALUES ('$roll', '$hostel', '$admission', '$registration', '$date')";
  if (mysqli_query($conn, $sql)) {
    echo "<p>Fees submitted successfully!</p>";
  } else {
    echo "<p>Error: " . mysqli_error($conn) . "</p>";
  }
}
?>
