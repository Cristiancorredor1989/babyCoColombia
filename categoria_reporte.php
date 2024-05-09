<?php
require_once('./fpdf/fpdf.php');

include('conexion.php');

$filter = '';
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}

class ReporteCategoria extends FPDF
{
    function header()
    {
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 20);

        $this->Cell(60);

        $this->Cell(70, 10, 'Tabla de categorias ', 0, 0, 'C');

        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(15);
        $this->Cell(30, 10, 'ID', 1, 0, 'C', false);
        $this->Cell(150, 10, 'Nombre', 1, 0, 'C', false);
    }

    function footer()
    {
    }
}


$sqlcat = mysqli_query($conn, "SELECT * FROM categoria_productos where nombre LIKE '%" . $filter . "%'");



$pdf = new ReporteCategoria();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

while ($row=$sqlcat->fetch_assoc()) {
    $pdf->Ln(10);
    $pdf->SetX(15);
    $pdf->Cell(30, 10, $row['id'], 1, 0, 'C', false);
    $pdf->Cell(150, 10, $row['nombre'], 1, 0, 'C', false);
}

$pdf->Output();
