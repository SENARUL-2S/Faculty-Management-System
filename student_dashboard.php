<?php
session_start();

?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <section class="header1">
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="student_profile.php"><i class="fas fa-user icon-blue"></i> <span>Profile</span></a></li>
<li><a href="#"><i class="fas fa-book icon-purple"></i> <span>Result</span></a></li>
<li><a href="#"><i class="fas fa-calendar-alt icon-green"></i> <span>Class Schedule</span></a></li>
<li><a href="#"><i class="fas fa-file-alt icon-orange"></i> <span>Assignment</span></a></li>
<li><a href="#"><i class="fas fa-certificate icon-gold"></i> <span>Certificate</span></a></li>
<li><a href="submit_complaint.php"><i class="fas fa-exclamation-circle icon-red"></i><span>Complain</span></a></li>
<li><a href="logout.php"><i class="fas fa-sign-out-alt icon-red"></i> <span>Logout</span></a></li>

                </ul>
            </div>
        </nav>
    </section>
    
</body>
</html>