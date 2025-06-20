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
    $course_code = $_POST['course_code'];
    $course_title = $_POST['course_title'];
    $credits = $_POST['credits'];
 
    $department_id = $_POST['department_id'];


    $stmt = $conn->prepare("INSERT INTO teacher (course_code, course_title, credits, department_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $course_code, $course_title, $credits, $join_date, $department_id);

    if ($stmt->execute()) {
        $message = "<p style='color:green;'>add course successfully</p>";
        $form_hide = true; 
    } else {
        $message = "<p style='color:red;'>error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Course</title>
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
            padding: 35px;
            border-radius: 6px;
            width: 550px;
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

        <h2>Add New Course</h2>
        <form action="" method="POST">
            <label for="course_code">course_code:</label>
            <input type="text" id="course_code" name="course_code" required>
            
            <label for="course_title">course_title:</label>
            <input type="text" id="course_title" name="course_title" required>

            <label for="credits">credits:</label>
            <input type="number" id="credits" name="credits" required>

            <label for="department_id">department_id:</label>
            <input type="number" id="department_id" name="department_id" required>

            <input type="submit" value="add">
        </form>
        <?php endif; ?>
    </div>
</body>
</html>