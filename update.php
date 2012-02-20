<?php
	include("includes/claseRecordset.inc.php"); 
	include("includes/conexion.inc.php");

function update($mensaje)
{
	$mensaje = str_replace("<","&lt;",$mensaje);
	$mensaje = str_replace(">","&gt;",$mensaje);
	$mensaje = str_replace("\'","'",$mensaje);
	$mensaje = str_replace('\"',"&quot;",$mensaje);
	$mensaje = str_replace("\\\\","\\",$mensaje);
	return $mensaje;
}
	$sql = "UPDATE usuarios SET username='$username', email='$email', nombre='$nombre', ididentificacion='$cboidentificacion', identificacion='$identificacion', fechanacimiento='$fechanacimiento', idsexo='$cboSexo', idpais='$cboPais', idestado='$cboProvincia', idciudad='$cboCiudad', password='$password' Where id='$id'";
	mysql_query($sql);
	echo "Actualizacion exitosa!";

	mysql_close($oConn);
?> 
<div align="left"><a href="index.php">Regresar al menú</a></div>