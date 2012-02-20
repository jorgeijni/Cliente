<?
include("../includes/claseRecordset.inc.php"); 
include("../includes/conexion.inc.php");
function GetCiudades($id)
{
	global $rs, $oConn;
	$sql="select id, descripcion  from ciudades where idProvincia = $id";
	$rs->Open($sql, $oConn);
	
	$salida = '[{"id":"-1", "text": "- Seleccione -"}, ';
	while(!$rs->EOF())
	{
		$salida .= '{ "value": "'.$rs->Fields("id").'", "text": "'.$rs->Fields("descripcion").'"}, ';
 		$rs->movenext();
	}
	 $salida  = substr( $salida , 0,  -2);

	$salida .= ']';
	return $salida;	
}

$content = '';
if(isset($_GET["id"])) 
	$content = GetCiudades($_GET["id"]);
header('Content-Type: text/html; charset=ISO-8859-1');
echo $content;
?>