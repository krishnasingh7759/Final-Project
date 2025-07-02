<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register Student</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>📝 Student Registration</h2>
  <nav>
    <a href="index.php">🏠 Home</a>
    <a href="register.php">📝 Register</a>
    <a href="submit_fee.php">💰 Submit Fees</a>
    <a href="view_status.php">📄 View Status</a>
  </nav>
  <form method="POST">
  <input type="text" name="name" placeholder="Full Name" required>
  <input type="text" name="registration_no" placeholder="Registration No" required>
  <input type="text" name="course" placeholder="Course" required>
  <input type="submit" name="submit" value="Register">
</form>
  <img src="money1.php" class="payment" alt="Payment Icon">
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $registration_no = $_POST['registration_no'];
  $course = $_POST['course'];

  $sql = "INSERT INTO students (name, registration_no, course) VALUES ('$name', '$registration_no', '$course')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Student registered successfully');</script>";
  } else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
  }
}
?>
