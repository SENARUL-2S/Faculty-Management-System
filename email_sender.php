<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname); 

$success = "";
$error = "";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $emails = [];

    if ($recipient == "all_students") {
        $result = $conn->query("SELECT email FROM student");
    } elseif ($recipient == "all_teachers") {
        $result = $conn->query("SELECT email FROM teacher");
    } elseif ($recipient == "all_staff") {
        $result = $conn->query("SELECT email FROM staff");
    } elseif ($recipient == "individual") {
        $emails[] = $_POST['individual_email'];
        $result = null;
    }

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $emails[] = $row['email'];
        }
    }

    // File attachment path
    $file_uploaded = false;
    $file_path = "";
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $file_path = "uploads/" . basename($_FILES['attachment']['name']);
        move_uploaded_file($_FILES['attachment']['tmp_name'], $file_path);
        $file_uploaded = true;
    }

    // Send emails
    $sent = 0;
    foreach ($emails as $to) {
        $body = $message;
        if ($file_uploaded) {
            $body .= "\n\nAttachment: " . $file_path;
        }

        if (mail($to, $subject, $body, "From: mdsenarul72@gmail.com")) {
            $sent++;
        }
    }

    if ($sent > 0) {
        $success = "✅ $sent email(s) sent successfully!";
    } else {
        $error = "❌ Failed to send email.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Sender</title>
    <style>
        body {
            font-family: Arial;
            padding: 50px;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 500px;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        select, input[type="text"], input[type="email"], input[type="file"], textarea, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-top: 10px;
            border-radius: 6px;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-top: 10px;
            border-radius: 6px;
        }
    </style>
    <script>
        function toggleIndividualEmail() {
            var select = document.getElementById('recipient');
            var individualDiv = document.getElementById('individual_email_div');
            individualDiv.style.display = (select.value === 'individual') ? 'block' : 'none';
        }
    </script>
</head>
<body>
<div class="container">
    <h2>📨 Send Email</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Select Recipient:</label>
        <select name="recipient" id="recipient" onchange="toggleIndividualEmail()" required>
            <option value="">-- Choose --</option>
            <option value="all_students">All Students</option>
            <option value="all_teachers">All Teachers</option>
            <option value="all_staff">All Staff</option>
            <option value="individual">Individual Email</option>
        </select>

        <div id="individual_email_div" style="display:none;">
            <label>Enter Email Address:</label>
            <input type="email" name="individual_email">
        </div>

        <label>Email Subject:</label>
        <input type="text" name="subject" required>

        <label>Message:</label>
        <textarea name="message" rows="5" required></textarea>

        <label>Attach a file:</label>
        <input type="file" name="attachment">

        <button type="submit">Send Email</button>
    </form>

    <?php if ($success): ?>
        <div class="success"><?= $success ?></div>
    <?php elseif ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
</div>
</body>
</html>