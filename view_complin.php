<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch last 7 days complaints
$sql = "SELECT id, email, subject, message, reply, created_at 
        FROM complaints 
        WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
        ORDER BY created_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Last 7 Days Complaints</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }
        h2 {
            text-align: center;
            color: #1a237e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background: #1a237e;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        .no-data {
            text-align: center;
            color: #999;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>Complaints from Last 7 Days</h2>

<?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Reply</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['subject']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                    <td><?php echo $row['reply'] ? htmlspecialchars($row['reply']) : '<em>Pending</em>'; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="no-data">No complaints found in the last 7 days.</div>
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
