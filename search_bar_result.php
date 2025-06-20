<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$allowed_tables = ['student', 'teacher', 'staff', 'notice', 'department', 'course', 'result', 'dean_merit', 'massages'];
$search_columns = [
    'student' => 'student_name',
    'teacher' => 'teacher_name',
    'staff' => 'staff_name',
    'notice' => 'title',
    'department' => 'dept_name',
    'course' => 'course_title',
    'result' => 'result_id',
    'dean_merit' => 'merit_id',
    'massages' => 'subject'
];

$results = [];
$search_term = $_GET['search'] ?? '';
$selected_table = $_GET['table'] ?? '';

if ($search_term && in_array($selected_table, $allowed_tables)) {
    $column = $search_columns[$selected_table];

    // Sanitize table name
    $safe_table = $conn->real_escape_string($selected_table);

    // Use dynamic SQL (table and column cannot be bound in prepare)
    $sql = "SELECT * FROM $safe_table WHERE $column LIKE '%" . $conn->real_escape_string($search_term) . "%'";
    $results = $conn->query($sql);
} else {
    die("Invalid input.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Result</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; padding: 30px; }
        .result-box {
            background: white; padding: 20px;
            max-width: 1000px; margin: auto;
            border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%; border-collapse: collapse; margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc; padding: 10px;
        }
        th { background: #007bff; color: white; }
        td.highlight { color: green; font-weight: bold; }
        a.back-btn {
            display: inline-block; margin-top: 15px;
            background: #333; color: white; padding: 8px 15px;
            text-decoration: none; border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="result-box">
    <h2>📋 Results from <strong><?= htmlspecialchars($selected_table) ?></strong> for "<em><?= htmlspecialchars($search_term) ?></em>"</h2>

    <?php if ($results && $results->num_rows > 0): ?>
        <table>
            <tr>
                <?php foreach ($results->fetch_fields() as $field): ?>
                    <th><?= htmlspecialchars($field->name) ?></th>
                <?php endforeach; ?>
            </tr>
            <?php while ($row = $results->fetch_assoc()): ?>
                <tr>
                    <?php foreach ($row as $key => $value): ?>
                        <td class="<?= $key === $search_columns[$selected_table] ? 'highlight' : '' ?>">
                            <?= htmlspecialchars($value) ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>

    <a href="search_bar.php" class="back-btn">🔙 Back to Search</a>
</div>
</body>
</html>
