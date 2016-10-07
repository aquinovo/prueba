<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
 </style>
   <meta charset="utf-8">
   <title>Programa de lecturas</title>
   <link rel="stylesheet" type="text/css" href="css/layout.css">
   <link rel="stylesheet" type="text/css" href="css/diseno.css">
</head>
  <body>
      <div id='main'>
     <aside>
<?php
    if (isset($_POST['Salir'])){
	  unset($_COOKIE['usuario']);
	  unset($_COOKIE['pass']);  
	  setcookie("usuario","",time()+1800);
	  setcookie("pass","",time()+1800);
    }
    if(isset($_POST['user']) && isset($_POST['pass'])){
      //if (isset($_POST['user'])){
      $usuario = @$_POST['user'];
      $contrasena =@$_POST['pass'];
      $ftp_serverA = "ndikandi.utm.mx";
      $res = conectar($ftp_serverA,$usuario,$contrasena);
      if ($res == true ){
        include('lib/cabezera.php');
        consultar($usuario,"alumno","Alumno");
      }else{
        if (($usuario == "admin1" || $usuario == "admin2" ) && $contrasena == "utm"){
           include('lib/cabezera2.php');
           consultar($usuario,"administrador","Administrador");
        }
        else{
	      ob_start();
	      header("refresh: 3; url = /prueba/index.php");
	      echo ' <table border="0" width="100%"  cellspacing="0" cellpadding="0" aling="center"  margin-left="auto"> <tr>';
	      echo "<td  align='center' bottom='middle'>Usuario o contraseña Incorrecta</td></tr></table>";
	      ob_end_flush();             
	     //}
        }
      }
    }
    function conectar($ftp_server,$ftp_user,$ftp_pass){
      $conn_id = ftp_connect($ftp_server) or die("No se pudo conectar a $ftp_server"); 
      // intentar iniciar sesión
      if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
        $res = true;
      } else {
        $res = false;
      }
      // cerrar la conexión ftp
      ftp_close($conn_id);    
      return $res;
    }
    function consultar($usuario,$tabla,$tipo){
        $conexion = mysqli_connect("localhost", "root", "","bd");
        mysqli_set_charset($conexion, "utf8");
        $consulta = "SELECT nombres, apellidoP, apellidoM FROM ".$tabla." WHERE correoE = '$usuario'"; 
	    $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() ); 
	    $datos = mysqli_fetch_array( $resultado ); 
	    echo "<table width= 100% border=0 cellpadding=0 cellspacing=0><tr><td width= 45%><p2>".$tipo.": ".$datos['nombres']." ".$datos['apellidoP']." ".$datos['apellidoM']."   </p2></td><td><p>Bienvenido</p></td></tr></table>";
        echo "<hr></hr>";
    }
?>  
          </aside></div>
 <footer></footer>
  </body>
</html>



