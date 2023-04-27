// Cargar modal de boostrap para agregar nueva encuesta
// Usaremos el "shorter method"
$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});
});

// Mostrar encuestas
function mostrarUsuario() {
    // Mostrar encuestas con el método ajax POST
    $.post("ajax_usuario/mostrarUsuario.php", {}, function(data, status) {
        $("#tabla_usuarios").html(data);
    });
}

// Mostrar encuestas al cargar la página
$(function() {
    mostrarUsuario(); // Llamando a la función
});

// Agregar nueva encuesta
function agregarUsuario() {
    // Obtener los valores de los inputs
    var id_usuario  = $("#hidden_id_usuario").val();
    var nombres     = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var email = $("#email").val();
    // Agregar encuesta con el método ajax POST
    $.post("ajax_usuario/agregarUsuario.php",
        {
            nombres      : nombres,
            apellidos : apellidos,
            email : email
        },
        function (data, status) {
            // Cerrar el modal
            $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarUsuario();
            // Limpiar campos del modal
            $("#nombres").val("");
            $("#apellidos").val("");
            $("#email").val("");
        }
    ) ;
}

// Eliminar encuesta
function eliminarUsuario(id_usuario) {
    var conf = confirm("Estas seguro de eliminar el Usuario");
    if (conf == true) {
        // Eliminar encuesta con el método ajax POST
        $.post("ajax_usuario/eliminarUsuario.php", {id_usuario: id_usuario}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarUsuario();
        });
    }
}
