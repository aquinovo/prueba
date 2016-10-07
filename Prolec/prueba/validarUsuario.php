<!DOCTYPE html>
<html lang="en">
  <head>
    <style></style>
   <meta charset="utf-8">
   <title>Programa de lecturas</title>
   <link rel="stylesheet" type="text/css" href="css/layout.css">
   <link rel="stylesheet" type="text/css" href="css/diseno.css">
<link href="bootstrap.css" rel="stylesheet">
  </head>
  <body>
<?php
    $uid = "";
    //funcion para conectar con ndikandi
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
    //funcion para consultar informacion de la base de datos
    function consultar($usuario,$tabla){
        $conexion = mysqli_connect("localhost", "root", "","bd");
        mysqli_set_charset($conexion, "utf8");
        $consulta = "SELECT id FROM ".$tabla." WHERE correoE = '$usuario'"; 
	    $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() ); 
	    $datos = mysqli_fetch_array( $resultado ); 
        if( $datos )
        {      
            //Obtener el Id del usuario en la BD       
            $uid = $datos['id'];
            //Iniciar una sesion de PHP
            session_start();
            //Crear una variable para indicar que se ha autenticado
            $_SESSION['autenticado']    = 'SI';
            //Crear una variable para guardar el ID del usuario para tenerlo siempre disponible
            $_SESSION['uid']            = $uid;
            return 1;
        }
        else
            return 0;
    }
    if(isset($_POST['usuario']) && isset($_POST['password'])){
        $usr = $_POST['usuario'];
        $pw = $_POST['password'];
        //Obtengo la version encriptada del password
        $pw_enc = md5($pw);
        $ftp_serverA = "ndikandi.utm.mx";
        $res = conectar($ftp_serverA,$usr,$pw);
        if ($res == true ){
            //include('lib/cabezera.php');
            $login = consultar($usr,"alumno");
            if ( $login == 1){
                ?>
                <form name="formulario" method="post" action="alumno.php">
                    <input type="hidden" name="idUsr" value='<?php echo $uid ?>' />
                </form>
                <?php
            }
            else
            {
                echo '<script type="text/javascript">
                    alert("Primero debe registrarse");
                    window.location.assign("index.php");
                    </script>';
            }
         }else{
             if (($usr == "admin1" || $usr == "admin2" ) && $pw == "utm"){
                    $login = consultar($usr,"alumno");
                    if (login){
                ?>
                    <form name="formulario" method="post" action="administrador.php">
                        <input type="hidden" name="idUsr" value='<?php echo $uid ?>' />
                    </form>
                <?php
                    }
                    else
                    {
                        echo '<script type="text/javascript">
                        alert("Primero debe registrarse");
                        window.location.assign("index.php");
                        </script>';
                    }
                }else {
                    ob_start();
	                header("refresh: 3; url = /programa/index.php");
	                echo ' <table border="0" width="100%"  cellspacing="0" cellpadding="0" aling="center"  margin-left="auto"> <tr>';
	                echo "<td  align='center' bottom='middle'>";
                             echo '<script type="text/javascript">
                                    alert("Usuario o contraseña incorrecta");
                                    window.location.assign("index.php");
                                    </script>
                                    </td></tr></table>';
                    ob_end_flush();  
                }
            }
     }
?>             
      <script type="text/javascript">
          document.formulario.submit();
      </script>
       </body>
</html>