<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube"; // <-- এখানে আপনার ডেটাবেজের নাম দিন

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT merit_id, student_name, session, picture FROM dean_merit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dean Merit Students</title>
  <link rel="stylesheet" href="home.css"> 
  <link rel="stylesheet" href="dean_merit.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<section class="header1">
  <nav>
    <div class="nav-links">
      <ul>
        <li><a href="home.html"><i class="fas fa-home icon icon-blue"></i><span>Home</span></a></li>
        <li><a href="about.html"><i class="fas fa-info-circle icon icon-purple"></i><span>About</span></a></li>
        <li><a href="dept_teacher.html"><i class="fas fa-chalkboard-teacher icon icon-green"></i><span>Teachers</span></a></li>
        <li><a href="dept_teacher.html"><i class="fas fa-chalkboard-teacher icon icon-green"></i><span>Staffs</span></a></li>
        <li><a href="levels.html"><i class="fas fa-layer-group icon icon-orange"></i><span>Levels</span></a></li>
        <li><a href="contact.html"><i class="fas fa-envelope icon icon-red"></i><span>Contact</span></a></li>
        <li><a href="notice.php"><i class="fas fa-bell icon icon-yellow"></i><span>Notice</span></a></li>
        <li><a href="dean_merit.php"><i class="fas fa-medal icon icon-gold"></i><span>Merit</span></a></li>
        <li><a href="portal.html"><i class="fas fa-sign-in-alt icon icon-yellow"></i><span>Login</span></a></li>
      </ul>
    </div>
  </nav> 
</section>

   <div class="dashboard-title"> Dean Merit List Students Based On Session </div>

<div class="teachers-grid">
<?php
if ($result->num_rows > 0) {
    $delay = 0.1;
    while($row = $result->fetch_assoc()) {
        echo '<div class="teacher-card" style="animation-delay: '.$delay.'s;">';
        echo '<img src="image/' . htmlspecialchars($row["picture"]) . '" class="teacher-image" />';
        echo '<div class="teacher-info">';
        echo '<div class="teacher-name">' . htmlspecialchars($row["student_name"]) . '</div>';
        echo '<div class="teacher-designation">Session: ' . htmlspecialchars($row["session"]) . '</div>';
        echo '<div class="teacher-contact">Merit ID: ' . htmlspecialchars($row["merit_id"]) . '</div>';
        echo '</div></div>';
        $delay += 0.1;
    }
} else {
    echo "<p style='text-align:center;'>No dean merit records found.</p>";
}
$conn->close();
?>
</div>

<footer class="footer">
  <div class="footer-links">
    <a href="#"><i class="fab fa-facebook-f" style="color: blue;"></i> <span>Facebook</span></a>
    <a href="#"><i class="fab fa-linkedin-in" style="color: blue;"></i> <span>LinkedIn</span></a>
    <a href="#"><i class="fab fa-youtube" style="color: #fc198a;"></i> <span>YouTube</span></a>
  </div>
  <p>© 2025 CSE at PSTU. All rights reserved. Developed by Senarul</p>
</footer>

</body>
</html>
