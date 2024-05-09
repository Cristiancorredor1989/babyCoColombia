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
        $this->Cell(10, 10, 'ID', 1, 0, 'C', false);
        $this->Cell(40, 10, 'Nombre', 1, 0, 'C', false);
        $this->Cell(80, 10, 'Descripcion', 1, 0, 'C', false);
        $this->Cell(20, 10, 'Precio', 1, 0, 'C', false);
        $this->Cell(30, 10, 'Categoria', 1, 0, 'C', false);
    }

    function footer()
    {
    }
}


$sqlprod = mysqli_query($conn, "SELECT pro.id,pro.nombre,descripcion,precio,cat.nombre as categoria 
FROM productos pro, categoria_productos cat where pro.categoria_id=cat.id and descripcion like '%" . $filter . "%'");



$pdf = new ReporteCategoria();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

while ($row=$sqlprod->fetch_assoc()) {
    $pdf->Ln(10);
    $pdf->SetX(15);
    $pdf->Cell(10, 10, $row['id'], 1, 0, 'C', false);
    $pdf->Cell(40, 10, mb_convert_encoding($row['nombre'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', false);
    $pdf->Cell(80, 10, mb_convert_encoding($row['descripcion'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'J', false);
    $pdf->Cell(20, 10, $row['precio'], 1, 0, 'C', false);
    $pdf->Cell(30, 10, mb_convert_encoding($row['categoria'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', false);
}

$pdf->Output();
