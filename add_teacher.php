<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
$message = "";
$form_hide = false; // ফর্ম দেখাবে কি না, তার জন্য ফ্ল্যাগ

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_id = $_POST['teacher_id'];
    $teacher_name = $_POST['teacher_name'];
    $teacher_designation = $_POST['teacher_designation'];
    $email = $_POST['email'];
    $join_date = $_POST['join_date'];
    $department_id = $_POST['department_id'];
    $salary = $_POST['salary'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO teacher (teacher_id, teacher_name, teacher_designation, email, join_date, department_id, salary,phone) VALUES (?, ?,?, ?,?, ?, ?, ?)");
    $stmt->bind_param("ssssssds", $teacher_id, $teacher_name, $teacher_designation, $email, $join_date, $department_id, $salary,$phone);

    if ($stmt->execute()) {
        $message = "<div class='success-message'>✅ শিক্ষক সফলভাবে যোগ করা হয়েছে!</div>";
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
    <title>Add Teacher</title>
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
            width: 5px;
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
        <h2>Add New Teacher</h2>
        <!-- form ta hide hobe add successfully dekhar time a -->
        <form action="" method="POST"> 
            <label for="teacher_id">teacher_id:</label>
            <input type="text" id="teacher_id" name="teacher_id" required>
            
            <label for="teacher_name">teacher_name:</label>
            <input type="text" id="teacher_name" name="teacher_name" required>

            <label for="teacher_designation">teacher_designation:</label>
            <input type="text" id="teacher_designation" name="teacher_designation" required>

            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>

            <label for="join_date">join_date:</label>
            <input type="date" id="join_date" name="join_date" required>

            <label for="department_id">department_id:</label>
            <input type="number" id="department_id" name="department_id" required>

            <label for="salary">salary:</label>
            <input type="number" id="salary" name="salary" required step="0.01">

            <label for="phone">phone:</label>
            <input type="number" id="phone" name="phone" required>

            <input type="submit" value="Add">
        </form>
      
    <?php endif; ?>
 </div>
</body>
</html>