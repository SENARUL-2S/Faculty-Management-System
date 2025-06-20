<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$results = [];
$search_term = '';
$selected_table = 'student';

$allowed_tables = ['student', 'teacher', 'staff', 'notice', 'department', 'course', 'result', 'dean_merit', 'massages'];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search_term = trim($_GET['search']);
    $selected_table = $_GET['table'];

    if (in_array($selected_table, $allowed_tables)) {
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

        $column = $search_columns[$selected_table] ?? null;

        if ($column) {
            $query = "SELECT * FROM $selected_table WHERE $column LIKE CONCAT('%', ?, '%')";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $search_term);
            $stmt->execute();
            $results = $stmt->get_result();
        } else {
            echo "Search column not defined for the selected table.";
            exit;
        }
    } else {
        echo "Invalid table selected.";
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search by Name</title>
    <style>
        body {
            font-family: Arial;
            padding: 30px;
            background: #f2f2f2;
        }
        .search-box {
            background: white;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        input[type="text"], select {
            padding: 10px;
            width: calc(100% - 24px);
            font-size: 16px;
            margin-bottom: 12px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
        }
        th {
            background: #007bff;
            color: white;
        }
    </style>
</head>
<body>
<div class="search-box">
    <h2>🔍 Search Name from Database</h2>
    <form method="GET" action="search_bar_result.php">
        <label>Choose Table:</label>
        <select name="table" required>
            <?php foreach ($allowed_tables as $table): ?>
                <option value="<?= $table ?>" <?= $selected_table == $table ? 'selected' : '' ?>><?= ucfirst($table) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Enter Name:</label>
        <input type="text" name="search" value="<?= htmlspecialchars($search_term) ?>" placeholder="Enter name to search..." required>

        <button type="submit">Search</button>
    </form>

    <?php if (!empty($search_term)): ?>
        <h3>Results from table: <strong><?= htmlspecialchars($selected_table) ?></strong></h3>
        <?php if ($results && $results->num_rows > 0): ?>
            <table>
                <tr>
                    <?php
                    // Show column names from the result
                    while ($fieldinfo = $results->fetch_field()) {
                        echo "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
                    }
                    ?>
                </tr>
                <?php
                // Move result pointer back to start
                $results->data_seek(0);
                while ($row = $results->fetch_assoc()):
                ?>
                    <tr>
                        <?php foreach ($row as $value): ?>
                            <td><?= htmlspecialchars($value) ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No results found for "<strong><?= htmlspecialchars($search_term) ?></strong>".</p>
        <?php endif; ?>
    <?php endif; ?>
</div>
</body>
</html>
