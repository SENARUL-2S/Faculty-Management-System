<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed']));
}

$type = $_GET['type'] ?? '';
$table = '';
$name_field = '';

switch($type) {
    case 'students':
        $table = 'student';
        $name_field = 'student_name';
        break;
    case 'teachers':
        $table = 'teacher';
        $name_field = 'teacher_name';
        break;
    case 'staff':
        $table = 'staff';
        $name_field = 'staff_name';
        break;
}

if ($table) {
    $sql = "SELECT id, $name_field as name FROM $table ORDER BY $name_field";
    $result = $conn->query($sql);
    $data = [];
    
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    echo json_encode($data);
} else {
    echo json_encode([]);
}

$conn->close();