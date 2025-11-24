<?php
   echo "<pre>";
   print_r($_REQUEST);
   $nombre = $_REQUEST["usuario_nombre"];
   $email = $_REQUEST["usuario_email"];
   $idioma = $_REQUEST["usuario_idioma"];
   $pais = $_REQUEST["usuario_pais"];
      if (!empty($_REQUEST["usuario_intereses"])) {
         $intereses = $_REQUEST["usuario_intereses"];
      }else{
         $intereses = [];
      }
   //otros formas para hacerlo
   //$intereses = !empty($_REQUEST["usuario_intereses"]) ? $_REQUEST["usuario_intereses"] : [];
   //?? va poner valor antrio si no es null si es null pon el valor atras
   //$intereses = $_REQUEST["usuario_intereses"] ?? [];
   echo "<h1>Tus datos son</h1>";
   echo "<p><strong>Nombre:</strong> $nombre </p>";
   echo "<p><strong>Email:</strong> $email </p>";
   echo "<p><strong>Idioma:</strong> $idioma </p>";
   echo "<p><strong>Pais:</strong> $pais </p>";
   echo "<p><strong>Intereses:</strong>".implode(",",$intereses)."</p>";
   /*forma entiendo para linea antriol:
   echo "<p><strong>Intereses: </strong>";
   if (!empty($intereses)) {
      foreach ($intereses as $interes){
         echo "$interes, ";
      }
      echo "</p>";
   }else{
      echo "No ha seleccionado ninguno.</p>";
   }*/
  if (isset($_FILES["usuario_avatar"]) and $_FILES["usuario_avatar"]["error"] == 0){
   $nombre_archivo = $_FILES["usuario_avatar"]["name"];
   echo "<p><strong>Archivo subido:<strong> $nombre_archivo";
  }
?>