<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Register Student</h2>
  <form method="POST">
    Name: <input type="text" name="name" required><br>
    Roll No: <input type="text" name="roll" required><br>
    Course: <input type="text" name="course" required><br>
    <input type="submit" name="submit" value="Register">
  </form>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $course = $_POST['course'];

  $sql = "INSERT INTO students (name, roll, course) VALUES ('$name', '$roll', '$course')";
  if (mysqli_query($conn, $sql)) {
    echo "<p>Student registered successfully!</p>";
  } else {
    echo "<p>Error: " . mysqli_error($conn) . "</p>";
  }
}
?>
