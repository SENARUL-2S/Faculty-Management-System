
<?php
require_once __DIR__ . '/fpdf.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3youtube";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (!isset($_GET['notice_id'])) {
    die("Notice ID is missing.");
}
$notice_id = intval($_GET['notice_id']);
$sql = "SELECT * FROM notice WHERE notice_id = $notice_id";
$result = $conn->query($sql);
if ($result->num_rows == 0) die("Notice not found.");
$notice = $result->fetch_assoc();

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(15, 20, 15);
$pdf->SetY(20);

$pdf->Image('image/logo.png', 20, 20, 30);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Office of the Dean', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 7, 'Patuakhali Science and Technology University', 0, 1, 'C');
$pdf->Cell(0, 7, 'Faculty Of Computer Science And Engineering', 0, 1, 'C');
$pdf->Cell(0, 7, 'Dumki, Patuakhali-8602, Bangladesh', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 8, 'IMPORTANT NOTICE', 0, 1, 'C');
$pdf->Ln(2);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 6, 'Date: ' . $notice['publish_date'], 0, 1, 'L');
$pdf->Ln(3);

$pdf->SetFont('Arial', 'B', 13);
$pdf->MultiCell(0, 10, $notice['title'], 0, 'L');
$pdf->Ln(3);

$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 8, $notice['description'], 0, 'J');

$pdf->Ln(40);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 6, 'Dean', 0, 1, 'R');
$pdf->Cell(0, 6, 'Faculty Of CSE', 0, 1, 'R');

$pdf->Image('image/seal_signature.png', 155, $pdf->GetY() + 5, 40);

$pdf->Output();
?>
