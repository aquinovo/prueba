<!DOCTYPE html>
<html lang="en">
  <head>
   <style></style>
   <meta charset="utf-8">
   <title>Programa de lecturas</title>
   <link rel="stylesheet" type="text/css" href="css/layout.css">
   <link rel="stylesheet" type="text/css" href="css/diseno.css">
	<!--Importar scripts de javascript -->
	<script src="js/jquery171.js" type="text/javascript"></script> 
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script src="js/jquery.alerts.js" type="text/javascript"></script>
	<script type="text/javascript">
	<!--
			$(document).ready(function() {
					$("#frmlogin").validate();
					$("#usuario").focus();
			});
	</script>
  </head>
  <body>
   <br/><br />
  <form id="frmlogin" name="frmlogin"  method="POST" action="validarUsuario.php">
    <table border="0" width="25%"  align="center" cellspacing="0" >
    <tr><td width="0" align="center" ><center><IMG SRC="img/logo.png"></IMG></center></td ></tr>
        <tr><td   align="center"><IMG SRC="img/usr.png">   </IMG><INPUT TYPE="text" NAME="usuario" id="usuario" class="myinput2" placeholder="Usuario" align="top"></INPUT></td></tr>
    <tr ><td  align="center" ><IMG SRC="img/password.png">   </IMG><INPUT TYPE="password" NAME="password" id="password" class="myinput2"  placeholder="Contraseña" align="top"></INPUT></td></tr>	
    <tr><td  align="center"  width="0"><INPUT TYPE="submit" name="enviar" VALUE="Entrar" class="myinput"></INPUT></td ></tr>
    </table>
  </form> 
    <div id='main'>
    <?php
      if( isset( $_POST['msg_error'] ) )
      {
          switch( $_POST['msg_error'] )
          {
              case 1:
                ?>
                    <script type="text/javascript">
                        jAlert("El usuario o password son incorrectos.", "Seguridad");
                        $("#password").focus();
                    </script>
                <?php
                break;         
              case 2:
                ?>
                    <script type="text/javascript">
                        jAlert("La seccion a la que intentaste entrar esta restringida.\n Solo permitida para usuarios registrados.", "Seguridad");
                    </script>
                <?php       
                break;
          }       //Fin switch
      }
    ?>
    </div>
    </body>
</html>