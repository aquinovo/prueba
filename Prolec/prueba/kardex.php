<!DOCTYPE html>
<html lang="en">
  <head>
   <style></style>
   <meta charset="utf-8">
   <title>Redactar</title>
   <link rel="stylesheet" type="text/css" href="css/layout.css">
   <link rel="stylesheet" type="text/css" href="css/diseno.css">
   
        <script type="text/javascript">
        function cuenta(){
            document.forms[0].caracteres.value=document.forms[0].texto.value.length
        }
   </script> 
</head>
  <body>
    <div id='main'>
        <aside>
        <?php
            include('lib/cabezera.php');
            $conexion = mysqli_connect("localhost", "root", "","bd");
            mysqli_set_charset($conexion, "utf8");
            $band =true;
        ?>
        <div2><img SRC="img/usr.png"></div2>
        <table width=100% border=0><tr><td width="5%"></td><td width=40%><p2>Alumno: <b><?php echo $nombreUsuario ?></b></p2></td>
        <td><p>Kardex</p></td></tr></table>
        <hr>
        <!-- Contenido inicial del sitio web -->
        <br><br><br>
        <table align="center" border=0 width="80%"><tr>
                <td width="34%"></td>
                <td width="33%"></td>
                <td width="33%"></td>
            </tr>
        </table>
        <table align="center" border=0 width="80%"><tr>
             <?php
                $consulta = "SELECT correoE,carrera_nombre,semestre,grupo_nombre FROM alumno WHERE id = '".$_SESSION['uid']."'";
                $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
                $datos = mysqli_fetch_array( $resultado );
                date_default_timezone_set ('America/Mexico_City');
                $date = date("Y-m-d");
                $hour = date("H:i:s");
                $band = false;
              ?>
            <td width="85%">
                <?php
                    if( $datos ){
                        echo '<table border=0 width=100%><tr>
                                <td width=10%>Matrícula:</td><td width=90%> <b>'.$datos['correoE'].'</td></tr><tr>
                                <td width=10%>Carrera:</td><td width=90%> <b>'.$datos['carrera_nombre'].'</td></tr><tr>
                                <td width=10%>Semestre:</td><td width=90%> <b>'.$datos['semestre'].'</td></tr><tr>
                                <td width=10%>Grupo:</td><td width=90%> <b>'.$datos['grupo_nombre'].'</td>';
                        echo'</tr></table><br>';
                ?>
            </td>
            <td width="15%" valign=top>
                <?php
                        echo '<table border=0 width=100%><tr>
                                <td width=25%>Fecha:</td><td width=25%> <b>'.$date.'</td></tr><tr>
                                <td width=25%>Hora:</td><td width=25%> <b>'.$hour.'</td>';
                        echo'</tr></table><br>';
                    }
                else
                    $band =true;
                ?>
            </td>
            </tr>
        </table>
        <table align="center" width="80%" >
            <tr><td>
                <div class="table2">
                    <div class="cabecera">
                        <div class="cabecera3"><b>TÍTULO DE LECTURA</b></div>
                        <div class="cabecera3"><b>FECHA DE ENVÍO</b></div>
                        <div class="cabecera3"><b># LECTURA</b></div>
                        <div class="carrera"><b>COMENTARIOS</b></div>
                        <div class="cabecera3"><b>ESTATUS</b></div>
                    </div>
                    <?php
                     $consulta = "SELECT libro_nombre,fecha,lectura,revision,estado FROM revision_usuario WHERE alumno_id = '".$_SESSION['uid']."'"; 
                     $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() ); 
                     while($datos=mysqli_fetch_assoc($resultado))    
                     {
                        $libro =" ";
                        $fecha = " ";
                        $lectura = " ";
                        $revision = " ";
                        $estado = " ";
                        echo '<div class="fila">';
                        if(strcmp($datos['libro_nombre'],"null")!=0){
                            $libro = $datos['libro_nombre'];
                            if(strcmp($datos['fecha'],"null")!=0)
                                $fecha = $datos['fecha'];
                            if(strcmp($datos['lectura'],"null")!=0)
                                $lectura = $datos['lectura'];
                            if(strcmp($datos['revision'],"null")!=0)
                                $revision = $datos['revision'];
                            if(strcmp($datos['estado'],"null")!=0)
                                $estado = $datos['estado'];
                            echo'<div class="columna1" >'.$libro.'</div>';
                            echo'<div class="columna1" >'.$fecha.'</div>';
                            echo'<div class="columna1" >'.$lectura.'</div>';
                            echo'<div class="columna1" >'.$revision.'</div>';
                            echo'<div class="columna1" >'.$estado.'</div>';           
                            echo '</div>';
                        }
                     }
                     mysqli_close($conexion);
                    ?>
                </div>
                <?php
                if ($band == true)
                    echo'<table width=100%><tr><td>No hay datos disponibles para mostrar.</td></tr></table>';
                ?>
            </td></tr>
        </table>
    </aside></div>
 <footer></footer>
  </body>
</html>    