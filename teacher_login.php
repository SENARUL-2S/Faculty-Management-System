<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";

if (isset($_POST['login'])) {
    $teacher_id = $_POST['teacher_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Teacher ID, Email এবং Password একসাথে চেক করা হবে
    $stmt = $conn->prepare("SELECT * FROM teacher WHERE teacher_id = ? AND email = ? AND password = ?");
    $stmt->bind_param("sss", $teacher_id, $email, $password); // তিনটা string bind করা হয়েছে
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $teacher = $result->fetch_assoc();
        $_SESSION['teacher_logged_in'] = true;
        $_SESSION['teacher_id'] = $teacher['teacher_id'];
        header("Location: teacher_dashboard.php");
        exit();
    } else {
        $error = "❌ Invalid Teacher ID, Email, or Password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Teacher Login</title>
    <style>
        body {
            background: #e2e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3c72;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
            width: 100%;
            padding: 10px;
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
    <div class="login-box">
        <h2>LOGIN HERE</h2>
        <?php if (!empty($error)) echo "<div class='error-msg'>$error</div>"; ?>
        <form method="POST" autocomplete="off">
            <input type="number" name="teacher_id" placeholder="Teacher ID" required autocomplete="off" />
            <input type="email" name="email" placeholder="Email" required autocomplete="off" />
            <input type="password" name="password" placeholder="Password" required autocomplete="off" />
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
