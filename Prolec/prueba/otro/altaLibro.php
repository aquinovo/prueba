<!DOCTYPE html>
<html lang="en">
  <head>
   <style></style>
   <meta charset="utf-8">
   <title>ALta de libroa</title>
   <link rel="stylesheet" type="text/css" href="css/layout.css">
   <link rel="stylesheet" type="text/css" href="css/Diseno.css">
</head>
  <body>
    <div id='main'>
        <aside>
        <?php
            include('lib/cabezera2.php');
        ?>
        <div2><img SRC="img/usr.png"></div2>
        <table width=100% border=0><tr><td width="5%"></td><td width=40%><p2>Alumno: <b><?php echo $nombreUsuario ?></b></p2></td>
            <td><p>Lecturas - Altas </p></td></tr></table>
        <hr>
        <!-- Contenido inicial del sitio web -->
        <?php
		 echo '
			<br><br><br><br><br><br><br>
			<FORM ACTION="login.php" METHOD="POST"> 
			<table border="0" width="100%"  cellspacing="0" cellpadding="0" height="45">
			<tr><td width=15%></td>
			<td width=30% valign=TOP align=left><strong><big>Alta de lectura</big></strong><br>
			<br>Rellenar los campos para ingresar un nuevo título de <br>lectura en la base de datos</td>
			<td width=10%></td>
			<td width=45%> 
				<LABEL>Código: </LABEL><br>
                 <INPUT type="text" value="01" name="codigo" size=30%><BR><br>
				<LABEL>Nombre de libro: </LABEL><br>
                <input type="text" name="nomLibro"><BR><br>
                <LABEL>Autor: </LABEL><br>
                <INPUT type="text" name="autor"><BR><br>
                <LABEL>Editorial: </LABEL><br>
                <INPUT type="text" name="editorial"><BR><br>
                <LABEL>Número de páginas: </LABEL><br>
                <INPUT type="text" name="paginas"><BR><br>
                <LABEL>Etiqueta: </LABEL><br>
                <INPUT type="text" name="etiqueta" ><BR><br>
                <LABEL>Resumen: </LABEL><br>                
                <textarea name="resumen" rows="10" cols="40"></textarea><br><br>
				<LABEL>Subir libro: </LABEL><br>
				<form action="..." method="post" enctype="multipart/form-data">
  				<input type="file" name="adjunto" />
				</form><br><br>
				Disponible en: <br/>
				<input name="biblioteca" type="checkbox" value="biblioteca"/>Biblioteca<br>
				<input name="copiadora" type="checkbox" value="copiadora"/>Copiadora<br><br>

				<input type="submit" name="cancelar" value="Cancelar" />                 
				 <input type="submit" name="guardar" value="Guardar" />
            </td></tr>
			</table></form>';
	  ?>
    </aside></div>
 <footer></footer>
  </body>
</html>   