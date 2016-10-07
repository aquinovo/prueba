<?php
/*
Archivo para la conexión de la base de datos
*/
function Conectarse($baseD) //función que sirve para hacer la conexión con la base de datos de MySQL
{
  if (!($link=mysqli_connect("localhost","root","",$baseD) or die( "Error de conexión dentro: " . mysqli_error() )))
  {
     echo "Error conectando con localhost, root---.";
     exit();
  }
  return $link;
}
function SelectBD($basededatos,$link){
  if (!mysql_select_db($basededatos,$link))
  {
     echo "Error seleccionando la base de datos ".$basededatos;
     exit();
  }
//@mysql_query("SET NAMES 'iso-8859-15'");
//@mysql_query("SET NAMES 'utf8'");
}

function SelectBDA($basededatos,$link){
  if (!mysql_select_db($basededatos,$link))
  {
     echo "Error seleccionando la base de datos ".$basededatos;
     exit();
  }
//@mysql_query("SET NAMES 'iso-8859-15'");
//@mysql_query("SET NAMES 'utf8'");
}

function ConsultaBD($query,$link){ // realizar consultas dentro de la base de datos
	$queEmp = $query;
         $resEmp = mysql_query($queEmp,$link) or die(mysql_error());
         //$totEmp = mysql_num_rows($resEmp);
	return $resEmp;


}
?> 
