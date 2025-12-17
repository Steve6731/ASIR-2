<?php
function dniValido($dni){
   $valido = True;
   if (!preg_match("/^[0-9]{8}[A-HJ-NP-TV-Z]$/",$dni)){// letra sin I,O,U
      $valido = False;
   }else{
      $cadena = "TRWAGMYFPDXBNJZSQVHLCKE";
      $num = preg_replace("/[^0-9]/", "", $dni);
      if ($num <= 23 and $dni[8] != $cadena[$num]){
         $valido = False;
      }elseif($dni[8] != $cadena[$num%23]){
         $valido = False;
      }
   }
   return $valido;
}