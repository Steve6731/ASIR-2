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
   <form action="./cookie1b.php" method="POST">
      <?php   
         $fecha = date("d/m/Y|H:i:s");
         setcookie("fecha",$fecha,time()+60*60*24*7);
         
         if (isset($_COOKIE["visitas"])){
            echo "<p> Me alegro volver a verte. La última vez que vine está en ".$_COOKIE["fecha"]." </p>";
         }else{
            setcookie("visitas",1,time()+60*60*24*7);
            echo "<p> Gracias por venir primera vez. </p>";
         }
      ?>
   </form>
</body>
</html>