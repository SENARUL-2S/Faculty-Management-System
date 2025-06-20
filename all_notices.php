<?php
/*******************************
 *  all_notices.php
 *  Lists every notice (paginated)
 *******************************/
$conn = new mysqli("localhost", "root", "", "w3youtube");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// ---------- Pagination setup ----------
$perPage = 10;                           // items per page
$page    = isset($_GET['page']) && $_GET['page'] > 0
         ? (int)$_GET['page']
         : 1;
$offset  = ($page - 1) * $perPage;

// total rows (for page count)
$totalRes = $conn->query("SELECT COUNT(*) AS total FROM notice");
$totalRows = $totalRes->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $perPage);

// fetch page data
$sql  = "SELECT id, title, publish_date
         FROM notice
         ORDER BY publish_date DESC
         LIMIT $perPage OFFSET $offset";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>All Notices</title>
    <style>
        body{font-family:Arial, sans-serif;margin:0;padding:20px;background:#f8f9fa}
        .container{max-width:800px;margin:auto;background:#fff;padding:20px;border:1px solid #ddd;border-radius:6px}
        h2{margin-top:0;text-align:center}
        .notice{padding:12px 0;border-bottom:1px solid #ececec}
        .notice a{color:#007bff;text-decoration:none;font-weight:bold}
        .date{font-size:13px;color:#666}
        .pagination{text-align:center;margin-top:20px}
        .pagination a{margin:0 5px;text-decoration:none;color:#007bff}
        .pagination .current{font-weight:bold;color:#333}
        .top-link{text-align:right;margin-bottom:10px}
        .top-link a{color:#007bff;text-decoration:none}
    </style>
</head>
<body>
<div class="container">
    <div class="top-link"><a href="notices.php">← Back to Home</a></div>
    <h2>All Notices</h2>

    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="notice">
            <a href="notice_pdf.php?id=<?= $row['id']; ?>">✳️ <?= htmlspecialchars($row['title']); ?></a><br>
            <span class="date">📅 <?= date('M d, Y', strtotime($row['publish_date'])); ?></span>
        </div>
    <?php } ?>

    <!-- Pagination links -->
    <?php if ($totalPages > 1) { ?>
        <div class="pagination">
            <?php if ($page > 1) { ?>
                <a href="?page=<?= $page-1; ?>">« Prev</a>
            <?php } ?>

            <?php
            // show max 5 page buttons
            $start = max(1, $page - 2);
            $end   = min($totalPages, $page + 2);
            for ($i = $start; $i <= $end; $i++) {
                if ($i == $page) {
                    echo '<span class="current">'.$i.'</span>';
                } else {
                    echo '<a href="?page='.$i.'">'.$i.'</a>';
                }
            }
            ?>

            <?php if ($page < $totalPages) { ?>
                <a href="?page=<?= $page+1; ?>">Next »</a>
            <?php } ?>
        </div>
    <?php } ?>
</div>
</body>
</html>
