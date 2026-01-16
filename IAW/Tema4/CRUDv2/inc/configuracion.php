<?php
   define("HOST","localhost");
   define("DBNAME","xuan");
   define("USER","Xuan");
   define("PASS","abc123.");

   
   session_start();

   if (!isset($_SESSION["logging"])) {
      $_SESSION["logging"] = 0;
   }
?>