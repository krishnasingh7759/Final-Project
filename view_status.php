<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Status</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Check Fee Status</h2>
  <form method="GET">
    Roll No: <input type="text" name="roll" required>
    <input type="submit" value="Search">
  </form>

  <?php
  if (isset($_GET['roll'])) {
    $roll = $_GET['roll'];
    $sql = "SELECT s.name, s.course,
      COALESCE(SUM(p.hostel_fee), 0) AS hostel,
      COALESCE(SUM(p.admission_fee), 0) AS admission,
      COALESCE(SUM(p.registration_fee), 0) AS registration
      FROM students s
      LEFT JOIN payments p ON s.roll = p.roll
      WHERE s.roll = '$roll'
      GROUP BY s.roll";

    $res = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
      echo "<p>Name: {$row['name']}<br>
            Course: {$row['course']}<br>
            Hostel Fee Paid: ₹{$row['hostel']}<br>
            Admission Fee Paid: ₹{$row['admission']}<br>
            Registration Fee Paid: ₹{$row['registration']}</p>";
    } else {
      echo "<p>No record found.</p>";
    }
  }
  ?>
</div>
</body>
</html>
