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
    $staff_id = $_POST['staff_id'];
    $staff_name = $_POST['staff_name'];
    $staff_designation = $_POST['staff_designation'];
    $email = $_POST['email'];
    $join_date = $_POST['join_date'];
    $department_id = $_POST['department_id'];
    $salary = $_POST['salary'];

    $stmt = $conn->prepare("INSERT INTO staff (staff_id, staff_name, staff_designation, email, join_date, department_id, salary, phone) VALUES (?,?, ?, ?,?, ?, ?, ?)");
    $stmt->bind_param("ssssssds", $staff_id, $staff_name, $staff_designation, $email, $join_date, $department_id, $salary,$phone);

    if ($stmt->execute()) {
        $message = "<div class='success-message'>✅ successfully add!</div>";
        $form_hide = true;
    } else {
        $message = "<div class='error-message'>❌ error: " . $stmt->error . "</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Staff</title>
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
   <div class="login-box">
        <h2>Add New Staff</h2>
        <form action="" method="POST">
    <label for="staff_id">Staff ID:</label>
    <input type="text" id="staff_id" name="staff_id" required>
    
    <label for="staff_name">Staff Name:</label>
    <input type="text" id="staff_name" name="staff_name" required>

    <label for="staff_designation">Staff Designation:</label>
    <input type="text" id="staff_designation" name="staff_designation" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="join_date">Join Date:</label>
    <input type="date" id="join_date" name="join_date" required>

    <label for="department_id">Department ID:</label>
    <input type="number" id="department_id" name="department_id" required>

    <label for="salary">Salary:</label>
    <input type="number" id="salary" name="salary" required>

    <label for="phone">phone:</label>
    <input type="number" id="phone" name="phone" required>

   <input type="submit" value="Add Staff" style="display: block; margin: 20px auto 0; width: 40%; padding: 6px; background:rgb(176, 200, 245); color: black; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">

</form>
</div>
    <?php endif; ?>
    </div>
</body>
</html>