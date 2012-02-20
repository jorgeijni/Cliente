<?php
	include("includes/claseRecordset.inc.php"); 
	include("includes/conexion.inc.php");

function Delete()
{
	$mensaje = str_replace("<","&lt;",$mensaje);
	$mensaje = str_replace(">","&gt;",$mensaje);
	$mensaje = str_replace("\'","'",$mensaje);
	$mensaje = str_replace('\"',"&quot;",$mensaje);
	$mensaje = str_replace("\\\\","\\",$mensaje);
	return $mensaje;
}
	//Creamos la sentencia SQL y la ejecutamos
	$sSQL="Delete From usuarios Where id='$id'";
	mysql_query($sSQL);
	echo "Datos Eliminados exitosamente!";

mysql_close($oConn);
?> 
<div align="left"><a href="index.php">Regresar al menú</a></div>