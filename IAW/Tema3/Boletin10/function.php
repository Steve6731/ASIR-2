<?php 
function esPalindromo($cadena){
   $len = strlen($cadena);
   $esPalindromo = True;
   $i=0;
   while ($i<($len/2-1) and $esPalindromo==True){
      if ($cadena[$i] != $cadena[$len-$i-1]){
         $esPalindromo = False;
      }
      $i++;
   }
   return $esPalindromo;
}
?>