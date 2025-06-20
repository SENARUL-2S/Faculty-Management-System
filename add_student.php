<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
$message = "";
$form_hide = false; 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['Student_id'];
    $student_name = $_POST['Student_name'];
    $registration = $_POST['Registration'];
    $email = $_POST['Email'];
    $semester= $_POST['semester'];
    $sessions = $_POST['Sessions'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO student (student_id, student_name, registration, email, semester, sessions, phone) VALUES (?, ?,?, ?, ?, ?, ?)");
    $stmt->bind_param("isissss",  $student_id, $student_name, $registration, $email, $semester, $sessions, $phone );

    if ($stmt->execute()) {
        $message = "<div class='success-message'>✅ ছাত্র সফলভাবে যোগ করা হয়েছে!</div>";
        $form_hide = true;
    } else {
        $message = "<div class='error-message'>❌ ত্রুটি: " . $stmt->error . "</div>";
    }
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <style>
        body {
            background: #e2e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            margin: 0; /* এটুকু নতুন করে যোগ করো */
        }
        .login-box {
            background: white;
            padding: 35px;
            border-radius: 6px;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 5px;
            color: #1e3c72;
        }

        form input[type="number"],
        form input[type="text"],
        form input[type="email"],
        form input[type="date"],
        form input[type="password"] {
            width: 100%;
            padding: 5px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: #eaf0ff;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #1e3c72;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #2a5298;
        }
        .error-msg {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="main-content">

            <?php if ($message): ?>
        <div style="text-align: center; padding: 200px;">
            <h1><?= $message ?></h1>
        </div>
    <?php endif; ?>

    <?php if (!$form_hide): ?>
        <h2>Add New Student</h2>
        <form action="" method="POST">

            <label for="Student_id">Student_id:</label>
            <input type="number" id="Student_id" name="Student_id" required>

            <label for="Student_name">Student Name:</label>
            <input type="text" id="Student_name" name="Student_name" required>

            <label for="Registration">Registration Number:</label>
            <input type="number" id="Registration" name="Registration" required>

            <label for="Email">Email:</label>
            <input type="email" id="Email" name="Email" required>

            <label for="semester">semester:</label>
            <input type="text" id="semester" name="semester" required>
            
            <label for="Sessions">Sessions:</label>
            <input type="text" id="Sessions" name="Sessions" required>

            <label for="phone">phone:</label>
            <input type="number" id="phone" name="phone" required>

            <input type="submit" value="Add">
        </form>
    <?php endif; ?>
    </div>
</body>
</html>
