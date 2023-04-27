<?php 

	include '../conexion.php';
	$id_encuesta = $_GET['id_encuesta'];

	/* Consulta para extraer título y descripción de la encuesta*/
	$query3 = "SELECT * FROM encuestas WHERE id_encuesta = '$id_encuesta'";
	$resultados3 = $connection->query($query3);
	$row3 = $resultados3->fetch_assoc();

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Favicon - FIS -->
  <link rel="shortcut icon" href="../imagenes/favicon.png">


  <title>Resultados</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <a class="navbar-brand" href="javascript:void(0)">Sistema de Encuestas</a>
     
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
      </button>
    

      <!--NAVBAR-->
      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0" style="color: #fff">
          
		  	<?php   
	      	session_start();
		        if (isset($_SESSION['u_usuario'])) {
		          echo "Bienvenido " . $_SESSION['u_usuario'] . "\t";

		          echo "<a href='../cerrar_sesion.php' class='btn btn-danger' style='margin-left: 10px'>Cerrar Sesión</a>";
		        } else {
		          header("Location: ../index.php");
		        }
	       ?>
        </form>
      </div>
  	</nav>

  	<div class="container" style="margin-top: 50px;">
  		
  	<?php

  	$consulta = "SELECT * FROM preguntas WHERE id_encuesta = '$id_encuesta'";
	$resultados2 = $connection->query($consulta);

	 ?>

	<hr/>
	<div class="container text-center">
		<h1><?php echo $row3['titulo'] ?></h1>
		<p><?php echo $row3['descripcion'] ?></p>
	</div>
	<hr/>

	<?php
		
		$id_pregunta = 'id_pregunta';

		$query = "SELECT preguntas.id_pregunta, preguntas.titulo,COUNT('preguntas.titulo') as count, opciones.valor FROM opciones INNER JOIN preguntas ON opciones.id_pregunta=preguntas.id_pregunta INNER JOIN resultados ON opciones.id_opcion=resultados.id_opcion WHERE preguntas.id_pregunta = '$id_pregunta' GROUP BY opciones.valor ORDER BY preguntas.id_pregunta";
		$resultados = $connection->query($query);

		?>

		<center>
		<br/>
		<?php
			$query = "SELECT ue.id_usuario, e.titulo AS titulo_encuesta, p.titulo AS titulo_pregunta, o.id_opcion, o.valor AS valor_opcion FROM encuestas e JOIN preguntas p ON p.id_encuesta = e.id_encuesta JOIN opciones o ON o.id_pregunta = p.id_pregunta JOIN usuarios_encuestas ue ON ue.id_encuesta = e.id_encuesta JOIN usuarios u ON u.id_usuario = ue.id_usuario LEFT JOIN resultados r ON r.id_opcion = o.id_opcion AND r.id_resultado = ue.id_usuario WHERE e.id_encuesta = 2 ORDER BY ue.id_usuario, p.id_pregunta, o.id_opcion;";
			$resultado = $connection->query($query);
		?>

			<table class="table">
			<thead>
				<tr>
				<th>Usuario</th>
				<th>Encuesta</th>
				<th>Pregunta</th>
				<th>Opción</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $resultado->fetch_assoc()) { ?>
				<tr>
				<td><?php echo $row['id_usuario']; ?></td>
				<td><?php echo $row['titulo_encuesta']; ?></td>
				<td><?php echo $row['titulo_pregunta']; ?></td>
				<td><?php echo $row['valor_opcion']; ?></td>

				</tr>
				<?php } ?>
			</tbody>
			</table>
		
		</center>


		<?php  
		/*95*/

		 ?>
	<?php

  	 ?>
	<div class="container text-center" style="margin-bottom: 20px">
		<a href="reporte.php" class="btn btn-outline-danger" target="_blank">REPORTE USUARIOS</a>
		<a href="reporte2.php?id_encuesta=<?php echo $id_encuesta ?>" class="btn btn-outline-primary" target="_blank">REPORTE ENCUESTAS</a>
		<form method="POST" action="create_excel.php">
				<button class="btn btn-outline-success" name="export"><span class="glyphicon glyphicon-print"></span> EXCEL</button>
		</form>
	</div>

  	<!-- Optional JavaScript -->
  	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  	<script src="../js/jquery-3.3.1.min.js"></script>
  	<script src="../js/popper.min.js"></script>
  	<script src="../js/bootstrap.min.js"></script>
</body>
</html>