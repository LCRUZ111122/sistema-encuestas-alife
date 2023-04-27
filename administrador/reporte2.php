<?php

	require "FPDF/fpdf.php";

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../imagenes/favicon.png', 5, 5, 20 );

			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Resultados encuestas',0,0,'C');
			$this->Ln(20);
		}

		
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
	//Agregamos la libreria FPDF
	require('../conexion.php');

	$query = "SELECT ue.id_usuario, e.titulo AS titulo_encuesta, p.titulo AS titulo_pregunta, o.id_opcion, o.valor AS valor_opcion FROM encuestas e JOIN preguntas p ON p.id_encuesta = e.id_encuesta JOIN opciones o ON o.id_pregunta = p.id_pregunta JOIN usuarios_encuestas ue ON ue.id_encuesta = e.id_encuesta JOIN usuarios u ON u.id_usuario = ue.id_usuario LEFT JOIN resultados r ON r.id_opcion = o.id_opcion AND r.id_resultado = ue.id_usuario WHERE e.id_encuesta = 2 ORDER BY ue.id_usuario, p.id_pregunta, o.id_opcion;";
	$resultado = $connection->query($query);

	$pdf = new PDF();
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(127,255,0);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,utf8_decode('Usuario'),1,0,'C',1);
	$pdf->Cell(50,6,'Encuesta',1,0,'C',1);
	$pdf->Cell(50,6,'Pregunta',1,0,'C',1);
	$pdf->Cell(50,6,'Opcion',1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,utf8_decode($row['id_usuario']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['titulo_encuesta']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['titulo_pregunta']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['valor_opcion']),1,1,'C');
	}
	
	$pdf->Output();

 ?>