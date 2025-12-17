<?php include("function.php")?>

<?php 
   $cadena = "00000000F";
   if (dniValido($cadena)){
      echo "$cadena es valido";
   }else{
      echo "$cadena no es valido";
   }
?>