<?php
    $conexion = mysqli_connect("localhost", "root", "","bd");
    mysqli_set_charset($conexion, "utf8");
    $cantidad_resultados_por_pagina = 1;
    $numero=($_GET['numero']);
    $semestre=($_GET['semestre']);
    $grupo=($_GET['grupo']);
    //Comprueba si está seteado el GET de HTTP
    if (isset($_GET["pagina"])) {
         echo "otro  intento";
        //Si el GET de HTTP SÍ es una string / cadena, procede
        if (is_string($_GET["pagina"])) {

            //Si la string es numérica, define la variable 'pagina'
             if (is_numeric($_GET["pagina"])) {

                 //Si la petición desde la paginación es la página uno
                 //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
                 if ($_GET["pagina"] == 1) {
                     //header("Location: paginación.php");
                 	 $pagina = 1;
                     //die();
                 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
                     $pagina = $_GET["pagina"];
                };

             } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
                 header("Location: paginación.php");
                die();
             };
        };

    } else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
        $pagina = 1;
        echo "primera vez";
    };

    //Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
    $empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
?>

<!DOCTYPE html>
<html lang="en">
  <body>
                <?php 
            
                        $consulta = "SELECT revision_usuario.id,alumno_id,libro_nombre,resumen,fecha,lectura,palabras,alumno.id,nombres,apellidoP,apellidoM,carrera_nombre,semestre,grupo_nombre,correoE FROM revision_usuario LEFT JOIN alumno ON revision_usuario.alumno_id = alumno.id WHERE lectura = '".$_GET['numero']."' and semestre= '".$_GET['semestre']."' and grupo_nombre='".$_GET['grupo']."'";
                        $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
                        $total_registros = mysqli_num_rows($resultado); 
                        //Obtiene el total de páginas existentes
                        $total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 

                        //Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
                        //Limitada por la cantidad de cantidad por página
                        $consulta = "SELECT revision_usuario.id,alumno_id,libro_nombre,resumen,fecha,lectura,palabras,alumno.id,nombres,apellidoP,apellidoM,carrera_nombre,semestre,grupo_nombre,correoE FROM revision_usuario LEFT JOIN alumno ON revision_usuario.alumno_id = alumno.id WHERE lectura = '".$_GET['numero']."' and semestre= '".$_GET['semestre']."' and grupo_nombre='".$_GET['grupo']."' LIMIT ".$empezar_desde.",".$cantidad_resultados_por_pagina;
                        $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
                       
	                    while ($datos=mysqli_fetch_assoc($resultado)){
	        
                            ?>
                                <table width=100% border=0><tr>
                                <td width=80%>
                                <?php
                                    echo '<table border=0 width=100%><tr>
                                    <td width=10%>Nombre:</td><td width=90%> <b>'.$datos['nombres'].' '.$datos['apellidoP'].' '.$datos['apellidoM'].'</td></tr><tr>
                                    <td width=10%>Carrera:</td><td width=90%> <b>'.$datos['carrera_nombre'].'</td></tr><tr>
                                    <td width=10%>Grupo:</td><td width=90%> <b>'.$datos['grupo_nombre'].'</td></tr><tr>
                                    <td width=10%>Matrícula:</td><td width=90%> <b>'.$datos['correoE'].'</td>';
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
                                  <hr><!- - - - - - - - - - - - - - - -- - - -- ------>
                                <?php
                                //}
                                //Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
                                //Nota: X = $total_paginas
                                for ($i=1; $i<=$total_paginas; $i++) {
                                //En el bucle, muestra la paginación
                                echo "<a href='?pagina=".$i."&numero=".$numero."&semestre=".$semestre."&grupo=".$grupo."'>".$i."</a>  ";
                                }; 
                            }
                        
                  
                ?>
  </body>
</html>   