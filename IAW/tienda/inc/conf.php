<?php
   define("HOST","localhost");
   define("DBNAME","grupito");
   define("USER","Xuan");
   define("PASS","abc123.");   
   session_start();

   if (!isset($_SESSION["logging"])) {
      $_SESSION["logging"] = 0;
      $_SESSION["nombre"] = "";
      $_SESSION["numCart"] = 0;
   }
   
?>