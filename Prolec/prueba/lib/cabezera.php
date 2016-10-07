<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
 </style>
   <meta charset="utf-8">
   <title>Programa de lecturas</title>
   <link rel="stylesheet" type="text/css" href="css/layout.css">
</head>
  <body>
 <header>
     <ul>
         <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
         <li><a href="evaluacion.php">Evaluación</a></li>
         <li><a href="kardex.php">Kardex</a></li>
		 <li><a href="#">Biblioteca virtual</a></li>
		 <li><a href="redactar.php">Redactar</a></li>
         <li><a href="alumno.php">Inicio</a></li>
     </ul>
     <div>
        <img src="img/logo.png" alt="Imagen genérica" />
     </div>
 </header>
      <?php
        session_start();
        //Validar que el usuario este logueado y exista un UID
        if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
        {
            //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la
            //pantalla de login, enviando un codigo de error
            ?>
            <form name="formulario" method="post" action="index.php">
                <input type="hidden" name="msg_error" value="2">
            
            <script type="text/javascript">
                document.formulario.submit();
            </script>
                </form>
            <?php
        }
        $conexion = mysqli_connect("localhost", "root", "","bd");
        mysqli_set_charset($conexion, "utf8");
        $consulta = "SELECT id,nombres,apellidoP,apellidoM FROM alumno WHERE id = '".$_SESSION['uid']."'"; 
	    $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() ); 
	    $datos = mysqli_fetch_array( $resultado ); 
        $nombreUsuario = "";
        //Formar el nombre completo del usuario
        if( $datos )
            $nombreUsuario = $datos['nombres']." ".$datos['apellidoP']." ".$datos['apellidoM'];
      ?>
  </body>
</html>