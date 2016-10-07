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
        <FORM ACTION="alumno.php" METHOD="POST">
        <div2><img SRC="img/usr.png"></div2>
        <table width=100% border=0><tr><td width="5%"></td><td width=40%><p2>Alumno: <b><?php echo $nombreUsuario ?></b></p2></td>
            <td><p>Bienvenido</p></td></tr></table>
        <hr>
        <!-- Contenido inicial del sitio web -->
            <br><br><br><br><br>
        <table align="center" width="80%" >
            <tr><td width=30%>
                    <label>Año:</label>
                    <select style="width:258px" name = "anio">   
                        <option>2016</option>
                        <option>2017</option>
                    </select>
                </td>
                <td width=30%>
                    <label>Período:</label>
                    <select style="width:258px" name ="periodo">   
                        <option>A</option>
                        <option>B</option>
                    </select>
                </td> 
                <td width=10%>
                    <input type="submit" name="buscar" value="Buscar" class="buscar"/>
                </td>
            </tr>
             <tr style="height:35px;" width=30%><td>
                </td>
                 <td width=30%>
                </td>
                 <td width=10%>
                 </td>
            </tr>
        </table>
            </FORM>
        <table align="center" width="80%" >
            <tr>
                <td>
                <div class="table2">
                    <div class="cabecera">
                        <div class="cabecera3"><b>SEMESTRE</b></div>
                        <div class="carrera"><b>CARRERA</b></div>
                        <div class="cabecera2"><b>PRIMERA ENTREGA</b></div>
                        <div class="cabecera2"><b>SEGUNDA ENTREGA</b></div>
                        <div class="cabecera2"><b>TERCERA ENTREGA</b></div>
                    </div>
                    <?php
                        if(isset( $_POST['anio']) && isset( $_POST['periodo'])){
                            $anio = $_POST['anio'];
                            $periodo = $_POST['periodo'];
                            $band = false;
                            $consulta = "SELECT semestre,Primera, Segunda,Tercera,gc_id FROM fecha where anio='".$anio."' and periodo ='".$periodo."'"; 
                            $resultado = mysqli_query($conexion,$consulta ) or die( mysql_error() );
                                while ($datos=mysqli_fetch_assoc($resultado))    
                                {
                                    echo '<div class="fila" >
                                    <div class="columna1" >'.$datos["semestre"].'
                                    </div>';
                                    $carrera = "SELECT *FROM grupo_lectura where id='".$datos["gc_id"]."'"; 
                                    $res = mysqli_query($conexion,$carrera ) or die( mysql_error() ); 
                                    echo '<div class="columna">';
                                    $i = 1;
                                    while ($info=mysqli_fetch_assoc($res)) {
                                        for ($i = 1; $i <= 10; $i++) {
                                            $iden = "id".$i;
                                            $nom = "SELECT *FROM carrera where id='".$info[$iden]."' or ' id=".$info["id2"]."'"; 
                                            $res2 = mysqli_query($conexion,$nom) or die( mysql_error() );
                                            while ($oo=mysqli_fetch_assoc($res2)) {
                                                echo ''.$oo['nombre'].', ';
                                            }
                                        }
                                    }
                                    echo '</div>';
                                    $date = date("Y-m-d");
                                    echo'<div class="columna">'.$datos["Primera"];
                                    $segundos=strtotime($datos["Primera"]) - strtotime($date);
                                    $diferencia_dias=intval($segundos/60/60/24);
                                    if($diferencia_dias >= 0 ){
                                        echo '<br><p3>Días que faltan : '.$diferencia_dias.' 
                                        </p3>';
                                    }
                                    echo '</div>';
                                    echo'<div class="columna">'.$datos["Segunda"];
                                    $segundos=strtotime($datos["Segunda"]) - strtotime($date);
                                    $diferencia_dias=intval($segundos/60/60/24);
                                    if($diferencia_dias >= 0 ){
                                        echo '<br><p3>Días que faltan : '.$diferencia_dias.' 
                                        </p3>';
                                    }
                                    echo '</div>';
                                    echo'<div class="columna">'.$datos["Tercera"];
                                    $segundos=strtotime($datos["Tercera"]) - strtotime($date);
                                    $diferencia_dias=intval($segundos/60/60/24);
                                    if($diferencia_dias >= 0 ){
                                        echo '<br><p3>Días que faltan : '.$diferencia_dias.' 
                                        </p3>';
                                    }
                                    echo '</div></div>';
                                    $band =false;
                                } 
                        }
                    ?>   
                </div> 
                </td>
            </tr>
                <tr><td>
                    <?php
                        if ($band == true)
                            echo'<table width=100%><tr><td>No hay datos disponibles para mostrar.</td></tr></table>';
                    ?>
                    </td>
            </tr>
        </table>
            <br><br>
        <table align="center" width="80%"><tr>
            <td width="35%" valign=top>
                <div class="table">
                    <div class="cabecera">
                        <div class="cabecera2"><b>DOCUMENTOS</b></div> 
                        </div>
                    <div class="fila">
                        <div class="columna">
                            <a class="simple" href="documentos/Lineamientos.pdf" target="_blank" >Lineamientos para Reporte de Lectura (Reseña)</a><br></div> 
                    </div> 
                    <div class="fila">
                        <div class="columna">
                            <a class="simple" href="documentos/Revisión.pdf" target="_blank" >Revisión del Reporte de Lectura.</a><br></div> 
                    </div> 
                    <div class="fila">
                        <div class="columna">
                            <a class="simple" href="documentos/Presentación.pdf" target="_blank">Presentación Programa de Lectura UTM.</a></div> 
                    </div> 
                </div> 
            </td>
            <td width="10%"></td>
            <td width="35%" align="right">
                <div class="table" align="left">
                    <div class="cabecera">
                        <div class="cabecera2"><b>LIGAS DE INTERÉS</b></div> 
                        </div>
                    <div class="fila">
                        <div class="columna">
                            <a class="simple" href="https://www.facebook.com/contactoprogramadelectura/" target="_blank">Liga de Facebook</a>
                            <br></div> 
                    </div> 
                    <div class="fila">
                        <div class="columna">
                             <a class="simple" href="http://dem.colmex.mx/" target="_blank">Dem</a><br></div> 
                    </div> 
                    <div class="fila">
                        <div class="columna">
                            <a class="simple" href="http://dle.rae.es/" target="_blank">Diccionario de la real académia Española</a><br></div> 
                    </div>
                    <div class="fila">
                        <div class="columna">
                            <a class="simple" href="http://sitios.ruv.itesm.mx/portales/crea/" target="_blank">Crea</a><br></div> 
                    </div>
                    <div class="fila">
                        <div class="columna">
                             <a class="simple" href="http://www.udlap.mx/centrodeescritura/discursoAcademico.aspx" target="_blank">Discurso Academico</a><br></div> 
                    </div> 
                </div> 
            </td>
        </tr></table>
            

    </aside></div>
 <footer></footer>
  </body>
</html>   