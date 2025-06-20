<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient_type = $_POST['recipient_type'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sender = $_POST['sender'];

    $recipient_phones = [];

    if ($recipient_type === 'individual') {
        // সরাসরি ফোন নম্বর ইনপুট থেকে নাও
        $phone = trim($_POST['individual_phone']);
        if (!empty($phone)) {
            $recipient_phones[] = $phone;
        }
    } else {
        $table = '';
        switch($recipient_type) {
            case 'students': $table = 'student'; break;
            case 'teachers': $table = 'teacher'; break;
            case 'staff': $table = 'staff'; break;
        }

        if ($table) {
            $sql = "SELECT phone FROM $table WHERE phone IS NOT NULL AND phone <> ''";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $recipient_phones[] = $row['phone'];
            }
        }
    }

    // মেসেজ ডাটাবেজে সংরক্ষণ
    $sql = "INSERT INTO messages (recipient_type, subject, message, sender, send_date) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $recipient_type, $subject, $message, $sender);

    if ($stmt->execute()) {
        $success_message = "Message send successfully! Total phones: " . count($recipient_phones);
    } else {
        $error_message = "Sorry, message could not be send.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Send Message</title>
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
        select, input[type="text"], textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
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
        #individual_phone_div {
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>📲 Send Message</h2>
    <form method="POST" action="">
        <label for="recipient_type">Recipient Type:</label>
        <select name="recipient_type" id="recipient_type" required>
            <option value="">-- Select Recipient --</option>
            <option value="students">All Students</option>
            <option value="teachers">All Teachers</option>
            <option value="staff">All Staff</option>
            <option value="individual">Individual Recipient</option>
        </select>

        <div id="individual_phone_div">
            <label for="individual_phone">Enter Phone Number:</label>
            <input type="text" name="individual_phone" id="individual_phone" placeholder="e.g. +8801XXXXXXXXX">
        </div>

        <label for="sender">Sender:</label>
        <input type="text" id="sender" name="sender" placeholder="Your name" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" placeholder="Message subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" placeholder="Type your message here" required></textarea>

        <button type="submit">Send Message</button>
    </form>

    <?php if ($success_message): ?>
        <div class="success"><?= htmlspecialchars($success_message) ?></div>
    <?php endif; ?>
    <?php if ($error_message): ?>
        <div class="error"><?= htmlspecialchars($error_message) ?></div>
    <?php endif; ?>
</div>

<script>
document.getElementById('recipient_type').addEventListener('change', function() {
    var phoneDiv = document.getElementById('individual_phone_div');
    if (this.value === 'individual') {
        phoneDiv.style.display = 'block';
        document.getElementById('individual_phone').required = true;
    } else {
        phoneDiv.style.display = 'none';
        document.getElementById('individual_phone').required = false;
    }
});
</script>
</body>
</html>
