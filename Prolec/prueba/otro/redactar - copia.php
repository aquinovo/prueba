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
  function miFuncion() {
    alert('Has hecho click en "miboton"');
  }
   </script> 
</head>
  <body>
    <div id='main'>
        <aside>
        <?php
            include('lib/cabezera.php');
        ?>
        <div2><img SRC="img/usr.png"></div2>
        <table width=100% border=0><tr><td width="5%"></td><td width=40%><p2>Alumno: <b><?php echo $nombreUsuario ?></b></p2></td>
        <td><p>Redactar</p></td></tr></table>
        <hr>
        <!-- Contenido inicial del sitio web -->
        <br><br>
        <?php  
            $conexion = mysqli_connect("localhost", "root", "","bd");
            mysqli_set_charset($conexion, "utf8");
            echo '<form action=redactar.php method=post >
            <table border=0 width="100%"><tr>
            <td width="20%"></td>
            <td width="60%">';
            $consulta = "SELECT correoE,carrera_nombre,semestre,grupo_nombre FROM alumno WHERE id = '".$_SESSION['uid']."'";
            $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
            $datos = mysqli_fetch_array( $resultado );
            if( $datos )
                date_default_timezone_set ('America/Mexico_City');
                $date = date("d-m-Y");
                $hour = date("H:i:s");
                echo ' <table border=0 width=100%><tr>
                        <td width=25%>Matrícula:</td><td width=25%> <b>'.$datos['correoE'].'</td>
                        <td width=25%></b> Carrera: </td><td width=25%><b>'.$datos['carrera_nombre'].'</td></tr><tr>
                        <td width=25%></b>Semestre: </td><td width=25%><b>'.$datos['semestre'].'</td>
                        <td width=25%></b>Grupo: </td><td width=25%><b>'.$datos['grupo_nombre'].'</b></td></tr><tr>
                        <td width=25%>Fecha: </td><td width=25%><b>'.$date.'</b></td>
                        <td width=25%>Hora: </td><td width=25%><b>'.$hour.'</b></td></tr>
                        <tr><td width=25%>Título de lectura:</td><td width=25%>';
                        $consulta = "SELECT *FROM libro "; 
                        $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() ); 
                        $resultado_consulta_mysql=mysqli_query($conexion,$consulta);
                        echo '<select style="width:200px" name=libros> ';  
                        while ($datos=mysqli_fetch_assoc($resultado))    
                        {
                           echo '<option value='.$datos['nombre'].' >';
                           echo ''.$datos["nombre"]; 
                           echo '</option>';
                        }  
                        echo '    </td><td width=25%>Número de lectura:</td><td width=25%>';
                        echo '<select style="width:200px" name=numero> ';  
                        echo '<option>Primera</option>'; 
                        echo '<option>Segunda</option>';
                        echo '<option>Tercera</option>';
                        echo '</td></tr>
                        </table>   
                       </select><br>
                    <table>
                        <tr>
	                      <td><textarea cols="100" rows="26" name="texto" onKeyDown="cuenta()" onKeyUp="cuenta()">             </textarea></td>
                        </tr>
                        <tr>
	                      <td align="right">
                            <table>
                                <tr><td width="50%"></td><td width="50%">Máximo de caracteres: <b>10,337</b></td></tr>
                                    <tr><td width="50%"></td><td width="50%">Caracteres escritos: <input type="text" name=caracteres size=4></td></tr>
                    </table>
                    </td>
                    </tr>
                    </table><br>
                    <table border=0 width="100%">
                        <tr><td width="45%"  align="right">
                            <input type="submit" name="guardar" value="Guardar">
                </form>';
                if (isset($_POST['guardar'])) {
                    $consulta = "SELECT id,alumno_id FROM lectura_usuario WHERE alumno_id = '".$_SESSION['uid']."'"; 
                    $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() ); 
	                $datos = mysqli_fetch_array( $resultado ); 
                    if( $datos ){
                        $query="Update lectura_usuario Set resumen='".@$_POST['texto']."' where id=".$datos['id'];
                        $result = mysqli_query($conexion,$query);
                    }
                    else
                    {
                        $alumno = $_SESSION['uid'];
                        $libros = $_POST['libros'];
                        $resumen = $_POST['texto'];
                        $lectura = $_POST['numero'];
                        $caract = $_POST['caracteres'];
                        mysqli_query($conexion, "INSERT INTO lectura_usuario VALUES ('null','".$alumno."','null', '".$libros."', '".$resumen."', '".$date."', '".$lectura."','null','null','".$caract."','null','null','null','null')");
                        mysqli_close($conexion);
                    }  
                    echo '<script type="text/javascript">
                        alert("Su reseña se ha guardado correctamente.");
                        window.location.assign("alumno.php");
                    </script>';
                                           
                }          
                echo'</td>
                    <td width="10%"></td>
                    <td width="45%"><input TYPE="submit" name="enviar" VALUE="Enviar"></td>
                    </tr>
                    </table>
                </td>
                <td width="20%"></td>
                </tr>
            </table>';
                ?>
    </aside></div>
 <footer></footer>
  </body>
</html>    