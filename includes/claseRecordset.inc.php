<?php

class RecordSet {
////////////////////////////////////////////////////
  var $resultado;
  var $indice;
  var $nroRows;
////////////////////////////////////////////////////
/*function recordSet() {
  $this->resultado="";
  $this->indice=0;
  $this->nroRows=0;
}*/
////////////////////////////////////////////////////
function Open($query, $conexion) {
   $this->resultado = mysql_query($query,$conexion) or die(mysql_error());
   $this->indice = 0;
   if(trim(strtolower(substr($query,0,6)))== "select" )
      $this->nroRows = mysql_num_rows($this->resultado);
   else
      $this->nroRows =0;
}
////////////////////////////////////////////////////
function EOF() {
 if (($this->nroRows == 0) || ($this->indice > $this->nroRows - 1) || ($this->indice < 0))
     return(true); 
else	
   	 return(false);
}
////////////////////////////////////////////////////
function moveFirst(){
   $this->indice = 0;
}
////////////////////////////////////////////////////
function moveNext(){
   $this->indice++;
}
////////////////////////////////////////////////////
function movePrev(){
   $this->indice--;
}
////////////////////////////////////////////////////
function moveLast(){
   $this->indice = $this->nroRows;
}
////////////////////////////////////////////////////
function Fields($nombreCampo) {
   $aux = mysql_result($this->resultado,$this->indice, $nombreCampo);
   return $aux;
}
////////////////////////////////////////////////////
function recordCount(){
  return ($this->nroRows);
}
//////////////////////////////////////////////////////
function absolutePosition() {
   return ($this->indice+1);
}
//////////////////////////////////////////////////////
function Close($conexion)
{
	mysql_close($conexion);
}

}
?>