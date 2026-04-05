<?php
include 'db.php';
$name = $_POST['name'];

$conn->query("INSERT INTO students(name) VALUES('$name')");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="success-icon">✔️</div>
        <h2>Student Added!</h2>
        <p>The record for <strong><?php echo htmlspecialchars($name); ?></strong> has been saved.</p>
        <a href='dashboard.html'>Back to Dashboard</a>
    </div>
</body>
</html>