<?php
   define("HOST","localhost");
   define("DBNAME","xuan");
   define("USER","Xuan");
   define("PASS","abc123.");
   /*
      para menu de logging
      user/password
      root/abc123.
      steve/alex
      Xuan/6731943
   */

   
   session_start();

   if (!isset($_SESSION["logging"])) {
      $_SESSION["logging"] = 0;
   }
?>