<?php
//Función creada para llenar la combo de Paises desde la base de datos
function LlenarPaises()
{
	global $oConn, $sql, $rs;
	
	$sql = "Select * From paises";
	$rs->Open($sql,$oConn);
	while(!$rs->EOF())
	{ 
		$id = $rs->Fields("id");
		$descripcion = $rs->Fields("descripcion");
		echo "<option value=\"$id\">$descripcion</option>";
		$rs->moveNext();
	}
}
?>

<?php
//Función creada para llenar la combo de sexo desde la base de datos
function LlenarSexo()
{
	global $oConn, $sql, $rs;
	
	$sql = "Select * From sexo";
	$rs->Open($sql,$oConn);
	while(!$rs->EOF())
	{ 
		$id = $rs->Fields("id");
		$descripcion = $rs->Fields("descripcion");
		echo "<option value=\"$id\">$descripcion</option>";
		$rs->moveNext();
	}	
}
?>

<?php
//Función creada para llenar la combo de tipo de identificacionesde desde la base de datos
function LlenarIdentificacion()
{
	global $oConn, $sql, $rs;
	
	$sql = "Select * From  identificacion";
	$rs->Open($sql,$oConn);
	while(!$rs->EOF())
	{ 
		$id = $rs->Fields("id");
		$descripcion = $rs->Fields("descripcion");
		echo "<option value=\"$id\">$descripcion</option>";
		$rs->moveNext();
	}	
}
?>