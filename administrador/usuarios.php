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

  	<title>ADMIN-Encuestas</title>

    <script type="text/javascript" language="javascript">   
      history.pushState(null, null, location.href);
      window.onpopstate = function () {
        history.go(1);
      };
    </script>

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
          

          echo "<a href='../cerrar_sesion.php' class='btn btn-light text-dark' style='margin-left: 10px'>Cerrar Sesión</a>";
        } else {
          header("Location: ../index.php");
        }
        

       ?>
         
      </form>
    </div>
  </nav>
  <div class="container" style="margin-top: 30px;">
	    <div class="row">
	        <div class="col-md-12 row">
	        	<div class="col-md-10 col-xs-12">
	        		<h3>SISTEMA DE ENCUESTAS</h3>
	        	</div>
            <div class="col-md-12 col-xs-15">
     <button class="float-right btn btn-outline-secondary" id="boton_agregar">
        Ajustes usuarios
    </button>
    <a href="index.php" class="btn btn-outline-info">Volver</a>
</div>

            
	        </div>
	    </div>
	    <hr/>
	    <div class="row">
	        <div class="col-md-12">
	            <h4>Usuarios:</h4>
	            <div class="table-responsive">
	            	<div id="tabla_usuarios"></div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- /Content Section -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="js/usuarios.js"></script>

</body>
</html>

<!-- Modal Agregar Nueva Encuesta -->
<div class="modal fade" id="modal_agregar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
            	<h4 class="modal-title">Agregar Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

            	<div class="form-group row">
      					<label for="id_usuario" class="col-sm-3 col-form-label">id_usuario</label>
      					<div class="col-sm-9">
      						<input type="text" class="form-control" id="id_usuario" placeholder="usuario para iniciar sesión" autocomplete="off" autofocus>
      					</div>
      				</div>
              <div class="form-group row">
                <label for="nombres" class="col-sm-3 col-form-label">Nombres</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="nombres" placeholder="Escriba sus nombres"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="apellidos" class="col-sm-3 col-form-label">Apellidos</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="apellidos" placeholder="Escriba sus apellidos"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Correo</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="email" placeholder="Escriba su correo electronico"></textarea>
                </div>
              </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="agregarUsuario()">Agregar usuario</button>
                <input type="hidden" id="hidden_id_usuario" value="<?php echo $_SESSION['id_usuario'] ?>">
            </div>

        </div>
    </div>
</div>

<!-- Modal Modificar Producto -->
<div class="modal fade" id="modal_modificar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
            	<h4 class="modal-title">Modificar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

            	<div class="form-group row">
      					<label for="modificar_id_usuario" class="col-sm-3 col-form-label">id_usuario</label>
      					<div class="col-sm-9">
      						<input type="text" class="form-control" id="modificar_id_usuario" placeholder="Usuario para iniciar sesión">
      					</div>
      				</div>

              <div class="form-group row">
                <label for="nombres" class="col-sm-3 col-form-label">Nombres</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="modificar_nombres" placeholder="Escriba sus nombres"></textarea>
                </div>
              </div>

              
              <div class="form-group row">
                <label for="apellidos" class="col-sm-3 col-form-label">Apellidos</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="modificar_apellidos" placeholder="Escriba sus apellidos"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Correo</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="modificar_email" placeholder="Escriba su correo electronico"></textarea>
                </div>
              </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="modificarDetallesUsuario()">Modificar Usuario</button>
                <input type="hidden" id="hidden_id_usuario">
            </div>

        </div>
    </div>
</div>