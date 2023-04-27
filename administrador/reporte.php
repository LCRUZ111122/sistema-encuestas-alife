<?php

	require "FPDF/fpdf.php";

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../imagenes/favicon.png', 5, 5, 20 );

			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte De Usuarios',0,0,'C');
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

	$query = "SELECT usuarios.email, usuarios_encuestas.id_usuario, encuestas.titulo FROM usuarios INNER JOIN usuarios_encuestas ON usuarios.id_usuario = usuarios_encuestas.id_usuario INNER JOIN encuestas ON usuarios_encuestas.id_encuesta = encuestas.id_encuesta;";
	$resultado = $connection->query($query);

	$pdf = new PDF();
	
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(127,255,0);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,utf8_decode('Usuario'),1,0,'C',1);
	$pdf->Cell(60,6,'Encuesta respondida',1,0,'C',1);
	$pdf->Cell(50,6,'Correo',1,1,'C',1);

	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,utf8_decode($row['id_usuario']),1,0,'C');
		$pdf->Cell(60,6,utf8_decode($row['titulo']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['email']),1,1,'C');
	}
	
	$pdf->Output();

 ?>