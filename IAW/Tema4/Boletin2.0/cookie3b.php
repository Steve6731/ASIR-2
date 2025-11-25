<?php   
   if (!empty($_REQUEST["color"])){
      $color = $_REQUEST["color"];
      setcookie("color",$color,time()+60*60*24*7);
   }
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>HTML</title>
   <meta name="viewport" content="width = device_width, initial-scale=1.0">
   <style>
      body {
         margin: 0;
         padding: 0;
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         font-family: Arial, sans-serif;
         transition: background-color 0.5s ease;
         background: <?php echo $_COOKIE["color"]?>;
      }

      div {
         border-radius: 8px;
         background-color: white;
         padding: 20px 50px;
         box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      }
   </style>
</head>
<body>

<div>
   <a href="./cookie3a.php">Cambiando: clic para continuar</a>
</div>
</body>
</html>