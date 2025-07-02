<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Fee Status</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>📄 View Fee Status</h2>
  <nav>
    <a href="index.php">🏠 Home</a>
    <a href="register.php">📝 Register</a>
    <a href="submit_fee.php">💰 Submit Fees</a>
    <a href="view_status.php">📄 View Status</a>
  </nav>
  <form method="GET">
    <input type="text" name="registration_no" placeholder="Enter Registration No" required>
    <input type="submit" value="Check Status">
  </form>

  <?php
  if (isset($_GET['registration_no'])) {
  $registration_no = $_GET['registration_no'];
  $sql = "SELECT s.name, s.course,
    COALESCE(SUM(p.hostel_fee), 0) AS hostel,
    COALESCE(SUM(p.admission_fee), 0) AS admission,
    COALESCE(SUM(p.registration_fee), 0) AS registration
    FROM students s
    LEFT JOIN payments p ON s.registration_no = p.registration_no
    WHERE s.registration_no = '$registration_no'
    GROUP BY s.registration_no";


    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
      echo "<p><strong>Name:</strong> {$row['name']}<br>
            <strong>Course:</strong> {$row['course']}<br>
            <strong>Hostel Fee Paid:</strong> ₹{$row['hostel']}<br>
            <strong>Admission Fee Paid:</strong> ₹{$row['admission']}<br>
            <strong>Registration Fee Paid:</strong> ₹{$row['registration']}</p>";
    } else {
      echo "<p>No record found for Roll No: <strong>$roll</strong></p>";
    }
  }
  ?>
</div>
</body>
</html>
