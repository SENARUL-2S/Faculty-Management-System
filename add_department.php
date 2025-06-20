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
    $faculty_code = $_POST['Faculty_code'];
    $department_id = $_POST['Department_id'];
    $department_name = $_POST['Department_name'];
    $establishment_date = $_POST['Establishment_date'];

    $stmt = $conn->prepare("INSERT INTO department (faculty_code, department_id, dept_name, establishment_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $faculty_code, $department_id, $department_name, $establishment_date);

    if ($stmt->execute()) {
        $message = "<p style='color:green;'>Added successfully!</p>";
        $form_hide = true; 
    } else {
        $message = "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add dept</title>
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
        <h2>Add New Department</h2>
        <form action="" method="POST">
            <label for="Faculty_code">Faculty_code:</label>
            <input type="text" id="Faculty_code" name="Faculty_code" required>

            <label for="Department_id">Department_id:</label>
            <input type="number" id="Department_id" name="Department_id" required>
            
            <label for="teacher_name">Department_name:</label>
            <input type="text" id="Department_name" name="Department_name" required>

            <label for="Establishment_date">Establishment_date:</label>
            <input type="date" id="Establishment_date" name="Establishment_date" required>

            <input type="submit" value="Add">
        </form>
    <?php endif; ?>
    </div>
</body>
</html>