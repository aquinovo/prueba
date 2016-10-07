<!DOCTYPE html>
<html lang="en">
  <head>
   <style></style>
   <meta charset="utf-8">
   <title>Programa de lecturas</title>
   <link rel="stylesheet" type="text/css" href="css/layout.css">
   <link rel="stylesheet" type="text/css" href="css/diseno.css">
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
        <FORM ACTION="evaluacion.php" METHOD="POST">
        <div2><img SRC="img/usr.png"></div2>
        <table width=100% border=0><tr><td width="5%"></td><td width=40%><p2>Alumno: <b><?php echo $nombreUsuario ?></b></p2></td>
            <td><p>Evaluación</p></td></tr></table>
        <hr>
        <!-- Contenido inicial del sitio web -->
            <br><br><br><br><br>
        <table border=1 align="center" width="80%" >
            <tr><td width=33%>
                    <label>Número de lectura:</label>
                    <?php 
                        echo '<select style="width:130px" name = numero> ';  
                        echo '<option >Primera</option>';
                        echo '<option >Segunda</option>';
                        echo '<option >Tercera</option>';
                        echo '</select>';
                    ?>
                </td>
                <td width=26%>
                    <label>Semestre:</label>
                    <?php
                        echo '<select style="width:130px" name = semestre > '; 
                        for ($i = 1; $i <= 10; $i++) {
                            echo '<option>';
                            echo ''.$i; 
                            echo '</option>';
                        }
                        echo '</select>';
                    ?>
                </td> 
                <td width=30%>
                    <label>Grupo:</label>
                    <?php 
                        $consulta = "SELECT codigo FROM grupo";
                        $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
                        $datos = mysqli_fetch_array( $resultado );
                        echo '<select style="width:130px" name = grupo> '; 
                        while ($datos=mysqli_fetch_assoc($resultado))    
                        {
                            echo '<option >';
                            echo ''.$datos["codigo"]; 
                            echo '</option>';
                        } 
                        echo '</select>';
                    ?>
                </td>
                <td width=11%>
                    <?php 
                        echo '   <input type="submit" name="buscar" value="Buscar" class="guardar"/>';
                    ?>
                </td>
            </tr>
            </table></FORM>
            <table align="center" width="80%" border=1><tr>
                <td>
                <?php 
                    if (isset($_POST['buscar'])) {
                        
                        $consulta = "SELECT id,alumno_id,libro_nombre,resumen,fecha,lectura,revision,palabras FROM revision_usuario WHERE lectura = '".$_POST['numero']."'"; 
                        $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() ); 
	                    while ($datos=mysqli_fetch_assoc($resultado)){
                            $consulta2 = "SELECT id,nombres,apellidoM,apellidoP,carrera_nombre,semestre,grupo_nombre,correoE FROM alumno WHERE id= '".$datos['alumno_id']."' and semestre= '".$_POST['semestre']."' and grupo_nombre='".$_POST['grupo']."'"; 
                            $resultado2 = mysqli_query($conexion,$consulta2 ) or die( mysql_error() ); 
                            $total_registros = mysqli_num_rows($resultado2);
	                        while ($datos2=mysqli_fetch_assoc($resultado2)){
                            ?>
                                <table width=100% border=0><tr>
                                <td width=80%>
                                <?php
                                    echo '<table border=0 width=100%><tr>
                                    <td width=10%>Nombre:</td><td width=90%> <b>'.$datos2['nombres'].' '.$datos2['apellidoP'].' '.$datos2['apellidoM'].'</td></tr><tr>
                                    <td width=10%>Carrera:</td><td width=90%> <b>'.$datos2['carrera_nombre'].'</td></tr><tr>
                                    <td width=10%>Grupo:</td><td width=90%> <b>'.$datos2['grupo_nombre'].'</td></tr><tr>
                                    <td width=10%>Matrícula:</td><td width=90%> <b>'.$datos2['correoE'].'</td>';
                                    echo'</tr></table>';
                                ?>
                                </td>
                                <td width=20% valign=top>
                                <?php
                                    //echo '<table border=0 width=100%><tr>
                                    //<td width=25%>Fecha:</td><td width=25%> <b>'.$date.'</td></tr><tr>
                                    //<td width=25%>Hora:</td><td width=25%> <b>'.$hour.'</td>';
                                    //echo'</tr></table><br>';
                                ?>
                                </td>
                                </tr>
                                </table>
                                <table border=1 witdh=100%><tr>
                                    <td width=80%>
                                        <?php
                                        echo'<textarea cols="108" rows="15" name="texto"  readonly>'. $datos['resumen']    .'</textarea>';
                                        echo'<label><br><br>Comentarios: <br></label><textarea cols="108" rows="5" name="revision" ></textarea>';
                                        ?>
                                    </td>
                                    <td width=20%>
                                        <LABEL><center>Palabras: </center></LABEL>
                                        <?php
                                            echo'<center><input type="text" name=caracteres class="cara" value='. $datos['palabras']  .' readonly ></center>';
                                        ?><br>
                                        <LABEL><center>Evaluación: </center></LABEL><br>
                                        <?php 
                                            echo '<select style="width:130px" name = evaluacion> '; 
                                            echo '<option >Aceptado</option>';
                                            echo '<option >Rechazado</option>';
                                            echo '</select>';
                                        ?>
                                    </td>
                                    </tr>
                                </table>
                                <?php
                                }
                                
                            }
                        }
                    mysqli_close($conexion);
                ?>
                </td>
                </tr>
            </table>
    </aside></div>
 <footer></footer>
  </body>
</html>   