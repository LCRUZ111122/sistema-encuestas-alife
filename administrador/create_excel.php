<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=encuesta" . date('Y:m:d:m:s').".xls");
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once '../conexion.php';
	
	$output = "";
	
	if(ISSET($_POST['export'])){
		$output .="
			<table>
				<thead>
					<tr>
                        <th>Usuario</th>
                        <th>Encuesta</th>
                        <th>Pregunta</th>
                        <th>Opción</th>
					</tr>
				<tbody>
		";
		
        $query = "SELECT ue.id_usuario, e.titulo AS titulo_encuesta, p.titulo AS titulo_pregunta, o.id_opcion, o.valor AS valor_opcion FROM encuestas e JOIN preguntas p ON p.id_encuesta = e.id_encuesta JOIN opciones o ON o.id_pregunta = p.id_pregunta JOIN usuarios_encuestas ue ON ue.id_encuesta = e.id_encuesta JOIN usuarios u ON u.id_usuario = ue.id_usuario LEFT JOIN resultados r ON r.id_opcion = o.id_opcion AND r.id_resultado = ue.id_usuario WHERE e.id_encuesta = 2 ORDER BY ue.id_usuario, p.id_pregunta, o.id_opcion;";
        $resultado = $connection->query($query);
        
		while ($row = $resultado->fetch_assoc()) {
			
		$output .= "
				<tr>
				<td>".$row['id_usuario']."</td>
				<td>".$row['titulo_encuesta']."</td>
				<td>".$row['titulo_pregunta']."</td>
				<td>".$row['valor_opcion']."</td>
				</tr>
		";
		}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	}
	
?>