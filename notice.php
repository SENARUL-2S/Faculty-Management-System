<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Check if 'show_all' is set in URL
$show_all = isset($_GET['show_all']) && $_GET['show_all'] == 1;

// SQL to get either all or only 3 notices
$sql = $show_all
    ? "SELECT notice_id, title, publish_date FROM notice ORDER BY publish_date DESC"
    : "SELECT notice_id, title, publish_date FROM notice ORDER BY publish_date DESC LIMIT 5";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notices</title>
     <link rel="stylesheet" href="home.css"> 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom right, #f0f4ff, #ffffff);
        margin: 0;
        padding: 0;
    }

    .tab-box {
        width: 800px;
        border-radius: 10px;
        background: #ffffff;
        margin: 10px auto;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.6s ease;
    }

    .tab-header {
        background: #007bff;
        color: white;
        padding: 20px;
        text-align: center;
        font-weight: bold;
        font-size: 1.4em;
        border-bottom: 1px solid #0056b3;
    }

    .notices {
        padding: 20px;
    }

    .notice-item {
        border-bottom: 1px solid #e0e0e0;
        padding: 15px 0;
        transition: background 0.3s ease;
    }

    .notice-item:last-child {
        border-bottom: none;
    }

    .notice-item:hover {
        background: #f9f9f9;
    }

    .notice-item a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.05em;
        transition: color 0.3s;
    }

    .notice-item a:hover {
        color: #0056b3;
    }

    .notice-date {
        font-size: 13px;
        color: #888;
        margin-top: 5px;
        display: inline-block;
    }

    .footer-actions {
        display: flex;
        justify-content: space-between;
        padding: 15px 20px;
        background: #f8f9fa;
        border-top: 1px solid #ddd;
    }

    .footer-actions a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s;
    }

    .footer-actions a:hover {
        color: #0056b3;
    }

    /* Animation */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

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

<div style="display: flex; justify-content: center; margin-top: 40px;">
    <div class="tab-box">
        <div class="tab-header">📋 Notices</div>

        <div class="notices" id="notice-list">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="notice-item">
                        <a href="notice_pdf.php?notice_id=<?php echo $row['notice_id']; ?>">✳️ <?= htmlspecialchars($row['title']); ?></a><br>
                        <span class="notice-date">📅 <?= date('M d, Y', strtotime($row['publish_date'])); ?></span>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="notice-item">No notices found.</div>
            <?php endif; ?>
        </div>

        <div class="footer-actions">
            <div>
                <?php if (!$show_all): ?>
                    <a href="?show_all=1">➤ View All</a>
                <?php endif; ?>
            </div>
            <div>
                <a href="home.html">⬅️ Back</a>
            </div>
        </div>
    </div>
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
