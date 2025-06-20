<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <section class="header1">
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="senarul.html"><i class="fas fa-user icon-blue"></i> <span>Profile</span></a></li>
                    <li><a href="#"><i class="fas fa-plus-circle icon-green"></i><span>Marking</span></a></li>
                    <li><a href="#"><i class="fas fa-file-alt icon-purple"></i><span>Results</span></a></li>
                    <li><a href="#"><i class="fas fa-chalkboard icon-orange"></i><span>Class Schedule</span></a></li>
                    <li><a href="#"><i class="fas fa-file-alt icon-orange"></i> <span>Assignment</span></a></li>
                    <li><a href="#"><i class="fas fa-user icon-blue"></i> <span>Students</span></a></li>
                    <li><a href="submit_complaint.php"><i class="fas fa-exclamation-circle icon-red"></i><span>Complain</span></a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt icon-red"></i> <span>Logout</span></a></li>

                </ul>
            </div>
        </nav>
    </section>
</body>
</html>