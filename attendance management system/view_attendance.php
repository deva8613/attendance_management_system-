<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Summary</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="width: 80%; max-width: 800px;">
        <h2>📊 Attendance Summary</h2>
        
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Total Days</th>
                    <th>Present</th>
                    <th>Attendance %</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetching summary using SQL Group By
                $query = "SELECT student_id, 
                          COUNT(*) as total, 
                          SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) as present 
                          FROM attendance GROUP BY student_id";
                
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()){
                    $percent = ($row['present'] / $row['total']) * 100;
                    
                    // Dynamic Color Logic
                    $colorClass = ($percent < 75) ? "low-attendance" : "high-attendance";
                    
                    echo "<tr>
                        <td><strong>{$row['student_id']}</strong></td>
                        <td>{$row['total']}</td>
                        <td>{$row['present']}</td>
                        <td class='{$colorClass}'>" . round($percent, 2) . "%</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        
        <a href='dashboard.html' style="display: inline-block; margin-top: 20px;">Back to Dashboard</a>
    </div>
</body>
</html>