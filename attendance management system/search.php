<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>🔍 Student Attendance</h2>
        
        <?php
        if(isset($_GET['student_id']) && !empty($_GET['student_id'])) {
            $id = $_GET['student_id'];
            $result = $conn->query("SELECT * FROM attendance WHERE student_id='$id'");

            if ($result->num_rows > 0) {
                echo "<table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>";
                
                while($row = $result->fetch_assoc()){
                    // Adding a dynamic class for Present/Absent colors
                    $statusClass = ($row['status'] == 'Present') ? 'status-present' : 'status-absent';
                    
                    echo "<tr>
                            <td>{$row['date']}</td>
                            <td class='{$statusClass}'>{$row['status']}</td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No records found for ID: <strong>$id</strong></p>";
            }
        }
        ?>

        <a href="search.html" style="display: inline-block; margin-top: 20px;">New Search</a>
        <a href="dashboard.html">Dashboard</a>
    </div>
</body>
</html>