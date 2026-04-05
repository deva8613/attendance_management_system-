<?php
include 'db.php';

$id = $_POST['student_id'];
$date = $_POST['date'];
$status = $_POST['status'];

$conn->query("INSERT INTO attendance(student_id,date,status) VALUES('$id','$date','$status')");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="success-icon">📅</div>
        <h2>Attendance Saved</h2>
        <p>Status: <strong><?php echo $status; ?></strong></p>
        <a href='dashboard.html'>Back to Dashboard</a>
    </div>
</body>
</html>