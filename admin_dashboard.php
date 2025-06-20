<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f8;
        }

        .header1 {
            background: linear-gradient(to right, #002752, #004b8d);
            text-align: center;
            padding: 20px 0;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
        }

        .container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .menu-column {
            width: 350px;
            margin: 0 40px;
        }

        .menu-column ul {
            list-style: none;
            padding: 0;
        }

        .menu-column ul li {
            margin-bottom: 15px;
        }




        /* 🎯 Add this at the top or bottom of your style block */
@keyframes fadeSlideIn {
    0% {
        opacity: 0;
        transform: translateX(-30px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* 👇 Apply animation to each menu item */
.menu-column ul li {
    margin-bottom: 15px;
    opacity: 0; /* Start hidden */
    animation: fadeSlideIn 0.6s ease forwards;
}

/* Add delay for each item using nth-child */
.menu-column ul li:nth-child(1) { animation-delay: 0.1s; }
.menu-column ul li:nth-child(2) { animation-delay: 0.2s; }
.menu-column ul li:nth-child(3) { animation-delay: 0.3s; }
.menu-column ul li:nth-child(4) { animation-delay: 0.4s; }
.menu-column ul li:nth-child(5) { animation-delay: 0.5s; }
.menu-column ul li:nth-child(6) { animation-delay: 0.6s; }
.menu-column ul li:nth-child(7) { animation-delay: 0.7s; }


        .menu-column ul li a {
            text-decoration: none;
            color: #1a1a1a;
            font-size: 1rem;
            padding: 10px 14px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            transition: 0.3s;
            background: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-top: 4px solid #007bff;
        }

        .menu-column ul li a:hover {
            background: #f0f2f5;
            color: #1a237e;
        }

        .menu-column ul li a i {
            margin-right: 10px;
            font-size: 18px;
        }

        /* Icon Colors */
        .icon-blue { color: #3498db; }
        .icon-purple { color: #9b59b6; }
        .icon-green { color: #2ecc71; }
        .icon-orange { color: #e67e22; }
        .icon-yellow { color: #f1c40f; }
        .icon-red { color: #e74c3c; }
        .icon-darkgreen { color: #16a085; }
        .icon-skyblue { color: #00bcd4; }
    </style>
</head>
<body>

    <div class="header1">Welcome To Admin Dashboard !</div>

    <div class="container">
        <!-- Left Menu -->
        <div class="menu-column">
            <ul>
                <li><a href="add_teacher.php"><i class="fas fa-chalkboard-teacher icon-blue"></i>Manage Teacher</a></li>
                <li><a href="add_student.php"><i class="fas fa-user-graduate icon-purple"></i>Manage Student</a></li>
                <li><a href="add_staff.php"><i class="fas fa-users icon-darkgreen"></i>Manage Staff</a></li>
                <li><a href="add_department.php"><i class="fas fa-building icon-red"></i>Manage Department</a></li>
                <li><a href="add_course.php"><i class="fas fa-book icon-green"></i>Manage Course</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt icon-red"></i>Logout</a></li>
            </ul>
        </div>

        <!-- Right Menu -->
        <div class="menu-column">
            <ul>
                <li><a href="notice.php"><i class="fas fa-bell icon-orange"></i>Manage Notice</a></li>
                <li><a href="result.php"><i class="fas fa-poll icon-yellow"></i>Manage Result</a></li>
                <li><a href="view_complin.php"><i class="fas fa-comment-dots icon-skyblue"></i>View Complaint</a></li>
                <li><a href="send_message.php"><i class="fas fa-sms icon-purple"></i>Send Message</a></li>
                <li><a href="email_sender.php"><i class="fas fa-envelope icon-blue"></i>Send Email</a></li>
                <li><a href="search_bar.php"><i class="fas fa-search icon-green"></i>Search</a></li>
            </ul>
        </div>
    </div>
<!-- Footer -->
<footer style="
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #ffffff;
    border-top: 1px solid #e0e0e0;
    padding: 10px 20px;
    font-size: 14px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 -1px 5px rgba(0,0,0,0.05);
    color: #555;">
    
    <div>
        &copy; Admin Dashboard System Developed by Mr 
    </div>
    
    <div>
        . <strong style="color:#3498db;">Senarul</strong>
    </div>
</footer>

</body>
</html>
