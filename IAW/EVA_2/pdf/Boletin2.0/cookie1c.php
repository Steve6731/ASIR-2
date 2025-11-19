<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>HTML</title>
   <meta name="viewport" content="width = device_width, initial-scale=1.0">
   <!--  
   <link rel="stylesbeet" href"estilo.css">
   -->
</head>
<body>
   <?php
      if(!empty($_COOKIE["nombre"])){
         echo "La cookie tiene ".$_COOKIE["nombre"];
      }else{
         echo "La cookie no ha sido encuentrado";
      }
   ?>
   <br />
   <a href="cookie1d.php">Salir del sistema</a>
</body>
</html>