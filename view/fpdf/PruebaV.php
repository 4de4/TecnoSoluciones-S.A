<?php
ob_start();
require('../fpdf/fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {

      $this->Image('logo.png', 270, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode("TecnoSoluciones S.A."), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 95, 189);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE ASISTENCIAS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(125, 173, 221); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(60, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('SECTOR'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('TELEFONO'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('CORREO'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('DIRECCION'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include '../../config/Conexion.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$consulta_reporte_asistencia = $con->query(" select * from cliente");

while ($datos_reporte = $consulta_reporte_asistencia->fetch_object()) {
   /* TABLA */
   $pdf->Cell(60, 10, utf8_decode($datos_reporte->nombre ), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($datos_reporte->sector), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->telefono), 1, 0, 'C', 0);
   $pdf->Cell(60, 10, utf8_decode($datos_reporte->correo_c), 1, 0, 'C', 0);
   $pdf->Cell(70, 10, utf8_decode($datos_reporte->direccion), 1, 1, 'C', 0);
}

ob_end_clean();
$pdf->Output('I', 'Reporte Asistencia.pdf');//nombreDescarga, Visor(I->visualizar - D->descargar)