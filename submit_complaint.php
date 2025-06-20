<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO complaints (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        $success_message = "✅ Complain sent successfully!";
    } else {
        $error_message = "❌ Sorry, Complain could not be sent.";
    }
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Complain</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 40px;
            display: flex;
            justify-content: center;
        }
        .container {
            background: white;
            width: 480px;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
        }
        select, input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            gap: 20px;
            font-size: 15px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        select:focus, input[type="text"]:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        button {
            width: 100%;
            margin-top: 25px;
            background: #007bff;
            border: none;
            padding: 12px;
            font-size: 16px;
            color: white;
            font-weight: 700;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            margin-top: 15px;
            border-radius: 6px;
            font-weight: 600;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            margin-top: 15px;
            border-radius: 6px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2> Write Complain Here</h2>
     <form method="POST">
       <label for="name">Your Name</label>
       <input type="text" name="name" placeholder="Your Name" required><br>
       <label for="email">Your Email</label>
       <input type="email" name="email" placeholder="Your Email" required><br>
       <label for="subject">Subject</label>
       <input type="text" name="subject" placeholder="Subject" required><br>
       <label for="message">Complaint Details</label>
       <textarea name="message" placeholder="Complaint Details" required></textarea><br>
       <button type="submit">Submit</button>
      </form>

    <?php if (!empty($success_message)): ?>
        <div class="success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <?php if (!empty($error_message)): ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>
    </div>
 </body>
</html>
