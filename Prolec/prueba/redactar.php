<!DOCTYPE html>
<html lang="en">
  <head>
   <style></style>
   <meta charset="utf-8">
   <title>Redactar</title>
   <link rel="stylesheet" type="text/css" href="css/layout.css">
   <link rel="stylesheet" type="text/css" href="css/diseno.css">
   <link rel="stylesheet" href="css/demo.css">
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
            $conexion = mysqli_connect("localhost", "root", "","bd");
            mysqli_set_charset($conexion, "utf8");
            date_default_timezone_set ('America/Mexico_City');
            $date = date("Y-m-d");
            $hour = date("H:i:s");
        ?>
        <div2><img SRC="img/usr.png"></div2>
        <table width=100% border=0><tr><td width="5%"></td><td width=40%><p2>Alumno: <b><?php echo $nombreUsuario ?></b></p2></td>
        <td><p>Redactar</p></td></tr></table>
        <hr>
        <!-- Contenido inicial del sitio web -->
        <br><br>
        <form action=redactar.php method=post >
        <table border=0 width=100%><tr>
            <td width=15%></td>
            <td width=70%>
                <table width=100% border=0><tr>
                    <td width=80%>
                        <?php  
                            $consulta = "SELECT correoE,carrera_nombre,semestre,grupo_nombre FROM alumno WHERE id = '".$_SESSION['uid']."'";
                            $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
                            $datos = mysqli_fetch_array( $resultado );
                            $semestre =$datos['semestre'];
                            $carrera_nombre=$datos['carrera_nombre'];
                            if( $datos ){
                                echo '<table border=0 width=100%><tr>
                                <td width=10%>Matrícula:</td><td width=90%> <b>'.$datos['correoE'].'</td></tr><tr>
                                <td width=10%>Carrera:</td><td width=90%> <b>'.$datos['carrera_nombre'].'</td></tr><tr>
                                <td width=10%>Semestre:</td><td width=90%> <b>'.$datos['semestre'].'</td></tr><tr>
                                <td width=10%>Grupo:</td><td width=90%> <b>'.$datos['grupo_nombre'].'</td>';
                                echo'</tr></table>';
                         ?>
                    </td>
                    <td width=20% valign=top>
                        <?php
                                echo '<table border=0 width=100%><tr>
                                <td width=25%>Fecha:</td><td width=25%> <b>'.$date.'</td></tr><tr>
                                <td width=25%>Hora:</td><td width=25%> <b>'.$hour.'</td>';
                                echo'</tr></table><br>';
                        }
                    ?>
                    </td>
                    </tr>
                </table>
                <table border=0 width=100%><tr>
                    <td width=55%>
                        <?php 
                            $consulta = "SELECT *FROM libro";
                            $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
                            echo 'Titulo de lectura: ';
                            echo '<select style="width:258px" name = libros> ';  
                            while ($datos=mysqli_fetch_assoc($resultado))    
                            {
                                echo '<option>';
                                echo ''.$datos["nombre"]; 
                                echo '</option>';
                            }  
                            echo '</select>';
                        ?>
                    </td>
                    <td width=45% align="left">
                         <?php 
                            echo 'Número de lectura: ';
                            echo '<select style="width:258px" name = numero> ';  
                            echo '<option >Primera</option>';
                            echo '<option >Segunda</option>';
                            echo '<option >Tercera</option>';
                            echo '</select>';
                        ?>
                    </td>
                    </tr>
                </table>
                <?php 
                    $consulta = "SELECT libro_nombre,resumen,lectura,palabras FROM lectura_usuario WHERE alumno_id = '".$_SESSION['uid']."'";
                    $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
                    $datos=mysqli_fetch_assoc($resultado);
                    echo'<textarea cols="120" rows="15" name="texto" onKeyDown="cuenta()" onKeyUp="cuenta()">'. $datos['resumen']  .'</textarea>';
                ?>
                <table border=0 width=100%><tr>
                    <td width=35%></td>
                    <td width=15%>
                        <input type="submit" name="guardar" value="Guardar" class="guardar">
                    </td>
                    <td width=25%>
                        <input type="submit" name="enviar" value="Enviar" class="guardar">
                    </td>
                    <td width=25%>
                        Número de caracteres: <br>
                        Máximo: <b>1,383</b><br>
                        Mínimo: <b>1,900</b><br>
                        <?php 
                            $consulta = "SELECT libro_nombre,resumen,lectura,palabras FROM lectura_usuario WHERE alumno_id = '".$_SESSION['uid']."'";
                            $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
                            $datos=mysqli_fetch_assoc($resultado);
                            echo' Caracteres escritos: <input type="text" name=caracteres class="cara" value='. $datos['palabras']  .'>';
                        ?>
                    </td>
                    </tr>
                </table>
                <?php 
                    if (isset($_POST['guardar'])) {
                        if( !empty($_POST['texto']) && !empty($_POST['caracteres'])){
                            $consulta = "SELECT id,alumno_id FROM lectura_usuario WHERE alumno_id = '".$_SESSION['uid']."'"; 
                            $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() ); 
	                        $datos = mysqli_fetch_array( $resultado ); 
                            if( $datos ){
                                mysqli_query($conexion,"Update lectura_usuario Set libro_nombre= '".$_POST['libros']."',resumen= '".$_POST['texto']."',fecha='".$date."', lectura ='".$_POST['numero']."',palabras='".$_POST['caracteres']."' where id='".$datos['id']."'");
                            }
                            else
                            {
                                $alumno = $_SESSION['uid'];
                                $libros = $_POST['libros'];
                                $resumen = $_POST['texto'];
                                $lectura = $_POST['numero'];
                                $caract = $_POST['caracteres'];
                                mysqli_query($conexion, "INSERT INTO lectura_usuario VALUES ('null','".$alumno."','null', '".$libros."', '".$resumen."', '".$date."', '".$lectura."','null','null','".$caract."','null','null','null','null')");
                            } 
                            echo '<script type="text/javascript">
                            alert("Su reseña se ha guardado correctamente.");
                            window.location.assign("alumno.php");
                            </script>';
                       }
                       else{
                            echo"<script languaje='javascript'>alert('Existen campos vacios')</script>";
                       }
                    }
                    if(isset($_POST['enviar'])) {
                        if( !empty($_POST['texto']) && !empty($_POST['caracteres'])){
                            $alumno = $_SESSION['uid'];
                            $libros = $_POST['libros'];
                            $resumen = $_POST['texto'];
                            $lectura = $_POST['numero'];
                            $caract = $_POST['caracteres'];
                            if($caract < 1383){
                                echo '<script type="text/javascript">
                                alert("Debe escribir un mínimo de 1,383 caracteres, favor de checar.");
                                window.location.assign("redactar.php");
                                </script>';
                            }
                            else{
                                $consulta = "SELECT id,nombre FROM carrera WHERE nombre = '".$carrera_nombre."'"; 
                                $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() ); 
                                while ($datos = mysqli_fetch_array( $resultado )) {
                                    for ($i = 1; $i <= 10; $i++) {
                                        $iden = "id".$i;
                                        $nom = "SELECT id FROM grupo_lectura where id='".$info[$iden]."'"; 
                                        $res2 = mysqli_query($conexion,$nom) or die( mysql_error() );
                                        while ($oo=mysqli_fetch_assoc($res2)) {
                                            $consulta2 = "SELECT id,Primera,Segunda,Tercera,gc_id,semestre FROM fecha WHERE semestre = '".$semestre."' and gc_id='".$oo['id']."'"; 
                                            $resultado2 = mysqli_query($conexion,$consulta2 ) or die( mysql_error() ); 
                                            while ($datos2 = mysqli_fetch_array( $resultado2 )) {
                                                if($lectura == "Primera")
                                                    $fechas=$datos2['Primera'];
                                                if($lectura == "Segunda")
                                                    $fechas=$datos2['Segunda'];
                                                if($lectura == "Tercera")
                                                    $fechas=$datos2['Tercera'];
                                            }
                                        }
                                    }
                                }
                                $segundos=strtotime($date) - strtotime($fechas);
                                $diferencia_dias=intval($segundos/60/60/24);
                                if($diferencia_dias>0){
                                    echo '<script type="text/javascript">
                                    alert("Su reseña no puede ser enviada porque se pasó de la fecha de entrega");
                                    window.location.assign("alumno.php");
                                    </script>';
                                }else{
                                    mysqli_query($conexion, "INSERT INTO revision_usuario VALUES ('null','".$alumno."','null', '".$libros."', '".$resumen."', '".$date."', '".$lectura."','null','null','".$caract."','null','null','null','null')");
                                    mysqli_query($conexion,"delete from lectura_usuario where alumno_id='".$alumno."'");
                                    echo '<script type="text/javascript">
                                        alert("Su reseña se ha enviado para ser evaluada.Puedes checar en Kardex para ver la información completa.");
                                        window.location.assign("alumno.php");
                                        </script>';
                                }
                            }
                        } 
                        else{
                            echo"<script languaje='javascript'>alert('Existen campos vacios')</script>";
                       }
                    }
                    mysqli_close($conexion);
                
                ?>
            </td>
            <td width=15%></td>
            </tr>
        </table>
        </form>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="css/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
	<script type="text/javascript" src="css/demo.js"></script>
    </aside></div>
 <footer></footer>
  </body>
</html>    