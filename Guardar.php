<?php
	include("includes/claseRecordset.inc.php"); 
	include("includes/conexion.inc.php");

function guardar($mensaje)
{
	$mensaje = str_replace("<","&lt;",$mensaje);
	$mensaje = str_replace(">","&gt;",$mensaje);
	$mensaje = str_replace("\'","'",$mensaje);
	$mensaje = str_replace('\"',"&quot;",$mensaje);
	$mensaje = str_replace("\\\\","\\",$mensaje);
	return $mensaje;
}
	 
	if(trim($HTTP_POST_VARS["username"]) != "" && trim($HTTP_POST_VARS["email"]) != "")
	{
		$sql = "SELECT id FROM usuarios WHERE username='".guardar($HTTP_POST_VARS["username"])."'";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($result))
		{
			echo "Error, usuario escogido por otro usuario";
		}
		else
		{
			$sql = "INSERT INTO usuarios (username, email, nombre, ididentificacion, identificacion, fechanacimiento, idsexo, idpais, idestado, idciudad, password, avatar) VALUES (";
			$sql .= "'".guardar($HTTP_POST_VARS["username"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["email"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["nombre"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["cboidentificacion"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["identificacion"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["fechanacimiento"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["cboSexo"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["cboPais"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["cboProvincia"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["cboCiudad"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["password"])."'";
			$sql .= ",'".guardar($HTTP_POST_VARS["avatar"])."'";
			$sql .= ")";
			mysql_query($sql);

			echo "Registro exitoso!";

		}
		mysql_free_result($result);
	}
	else
	{
		echo "Debe llenar como minimo los campos de email y password";
	}
mysql_close($oConn);
?> 
<div align="left"><a href="index.php">Regresar al menú</a></div>