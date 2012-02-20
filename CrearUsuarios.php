<?
	include("includes/claseRecordset.inc.php"); 
	include("includes/conexion.inc.php");
	include("includes/funciones.inc.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registrar un nuevo usuario</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="js/mootools.js"></script>
<script language="JavaScript" type="text/javascript" src="js/iToolkit.js"></script>
<script language="JavaScript" type="text/javascript">
window.addEvent('load', PageLoad);
function PageLoad()
{
	//new iToolkit.ComboEnlazado(hijo, padre, servicioDeDatos);
	new iToolkit.ComboEnlazado("cboProvincia", "cboPais", "services/GetProvinciasPorPais.php");
	new iToolkit.ComboEnlazado("cboCiudad", "cboProvincia", "services/GetCiudadesPorProvincia.php");
}
</script>
</head>

<body>
<h1>Ingreso de Usuarios</h1>
<form action="Guardar.php" method="post" name="registro" id="registro">

<table width="457" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="154" height="30">Nombre de Usuario:</td>
    <td width="295"><label for="username"></label>
    <input type="text" name="username" id="username" style="width:250px;" /></td>
  </tr>
   <tr>
    <td height="30">Contrase&ntilde;a:</td>
    <td><label for="password"></label>
     <input type="password" name="password" id="password" style="width:250px;" /></td>
  </tr>
  <tr>
     <td height="30">Nombre Completo:</td>
    <td><label for="nombre"></label>
     <input type="text" name="nombre" id="nombre" style="width:250px;"/></td>
  </tr>
   <tr>
     <td height="30">Fecha de Nacimiento:</td>
    <td><label for="fechanacimiento"></label>
     <input type="date" name="fechanacimiento" id="fechanacimiento" style="width:250px;"/></td>
  </tr>
  <tr>
     <td height="30">Correo Electronico:</td>
    <td><label for="email"></label>
     <input type="email" name="email" id="email" style="width:250px;"/></td>
  </tr>
  <tr>
  <td height="30">Sexo:</td>
    <td>
		<select name="cboSexo" id="cboSexo" style=" width:250px;">
			<? LlenarSexo(); ?>
		</select>    
	</td>
  </tr>
    <td height="30">Tipo de Identificaci&oacute;n:</td>
    <td>
		<select name="cboidentificacion" id="cboidentificacion" style=" width:250px;">
			<? LlenarIdentificacion(); ?>
		</select>    
	</td>
  </tr>
  <tr>
     <td height="30">Identificación:</td>
    <td><label for="identificacion"></label>
     <input type="text" name="identificacion" id="identificacion" style="width:250px;"/></td>
  </tr>
  <tr>
    <td height="30">Pais:</td>
    <td>
		<select name="cboPais" id="cboPais" style=" width:250px;">
			<? LlenarPaises(); ?>
		</select>    
	</td>
  </tr>
  <tr>
    <td height="30">Estado:</td>
    <td><select name="cboProvincia" id="cboProvincia" style="width:250px;">
      	</select>
    </td>
  </tr>
  <tr>
    <td height="30">Ciudad:</td>
    <td><select name="cboCiudad" id="cboCiudad" style="width:250px;">
    </select>
    </td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><input type="submit" name="Registrar" id="Registrar" value="Registrar" /></td>
    <td><div align="left"><a href="index.php">Regresar al menú</a></div></td>
  </tr>
</table> 
</form>
</body>
</html>
<?php mysql_close($oConn);?>