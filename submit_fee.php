<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Submit Fees</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>💰 Submit Student Fees</h2>
  <nav>
    <a href="index.php">🏠 Home</a>
    <a href="register.php">📝 Register</a>
    <a href="submit_fee.php">💰 Submit Fees</a>
    <a href="view_status.php">📄 View Status</a>
  </nav>
  <form method="POST">
    <input type="text" name="registration_no" placeholder="Registration No" required>
    <input type="number" name="hostel" placeholder="Hostel Fee (₹)" value="0" required>
    <input type="number" name="admission" placeholder="Admission Fee (₹)" value="0" required>
    <input type="number" name="registration" placeholder="Registration Fee (₹)" value="0" required>
    <input type="submit" name="submit_fee" value="Submit Payment">
  </form>
  <img src="money2.php" class="payment" alt="Payment Icon">
</div>
</body>
</html>

<?php
if (isset($_POST['submit_fee'])) {
  $registration_no = $_POST['registration_no'];
  $hostel = $_POST['hostel'];
  $admission = $_POST['admission'];
  $registration = $_POST['registration'];
  $date = date("Y-m-d");

  $sql = "INSERT INTO payments (registration_no, hostel_fee, admission_fee, registration_fee, payment_date)
          VALUES ('$registration_no', '$hostel', '$admission', '$registration', '$date')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Payment submitted successfully!');</script>";
  } else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
  }
}
?>
