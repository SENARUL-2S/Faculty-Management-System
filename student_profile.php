<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit;
}

$student_id = $_SESSION['student_id'];
$sql = "SELECT * FROM student WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
    body {
        margin: 0;
        background: linear-gradient(135deg, #f2f5f9, #e0ecff);
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        animation: fadeIn 0.6s ease-in-out;
    }

    .profile-box {
        background: #ffffff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        width: 450px;
        position: relative;
        text-align: center;
        transition: transform 0.3s ease;
        animation: slideUp 0.6s ease-in-out;
    }

    .profile-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
    }

    .logout-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 10px 18px;
        background: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 30px;
        font-size: 14px;
        transition: background 0.3s;
    }

    .logout-btn:hover {
        background: #0056b3;
    }

    .profile-box img {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 5px solid #007bff;
        object-fit: cover;
        margin-bottom: 20px;
        animation: zoomIn 0.8s ease;
    }

    .profile-box h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .profile-info {
        text-align: left;
        margin: 0 auto 30px;
        display: inline-block;
    }

    .profile-info p {
        font-size: 16px;
        margin: 10px 0;
        color: #444;
    }

    .profile-info i {
        width: 20px;
        margin-right: 10px;
        color: #007bff;
    }

    .profile-info strong {
        font-weight: 600;
        color: #000;
    }

    /* Animations */
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes slideUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes zoomIn {
        0% {
            transform: scale(0.7);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>

</head>
<body>

<div class="profile-box">
    <!-- Logout Button (Top Right) -->
    <a href="student_dashboard.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>

    <!-- Profile Content -->
    <img src="image/<?php echo htmlspecialchars($student['picture']); ?>" alt="Profile Picture">
    <h2><?php echo htmlspecialchars($student['student_name']); ?></h2>
    <div class="profile-info">
        <p><i class="fa-solid fa-id-card"></i><strong>Student ID:</strong> <?php echo htmlspecialchars($student['student_id']); ?></p>
        <p><i class="fa-solid fa-hashtag"></i><strong>Registration:</strong> <?php echo htmlspecialchars($student['registration']); ?></p>
        <p><i class="fa-solid fa-envelope"></i><strong>Email:</strong> <?php echo htmlspecialchars($student['email']); ?></p>
        <p><i class="fa-solid fa-phone"></i><strong>Phone:</strong> <?php echo htmlspecialchars($student['phone']); ?></p>
        <p><i class="fa-solid fa-layer-group"></i><strong>Semester:</strong> <?php echo htmlspecialchars($student['semester']); ?></p>
        <p><i class="fa-solid fa-calendar-days"></i><strong>Session:</strong> <?php echo htmlspecialchars($student['sessions']); ?></p>
        <p><i class="fa-solid fa-building-columns"></i><strong>Hall:</strong> <?php echo htmlspecialchars($student['hall']); ?></p>
    </div>
</div>

</body>
</html>
