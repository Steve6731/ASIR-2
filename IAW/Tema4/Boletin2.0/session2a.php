<?php
// session
session_start();
if (!isset($_SESSION['contador'])) {
   $_SESSION['contador'] = 0;
}else{
   $_SESSION['contador']++;
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
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

      .areaBotton,p {
         display: flex;
         justify-content: center;
         align-items: center;
      }

      .botton {
         padding: 15px 30px;
         margin: 5px;
         font-size: 18px;
         border: none;
         border-radius: 8px;
         background-color: white;
         color: #030303;
         cursor: pointer;
         box-shadow: 0 4px 8px rgba(0,0,0,0.2);
         transition: transform 0.2s, box-shadow 0.2s;
        }
        
      .botton:hover {
         transform: translateY(+2px);
         box-shadow: 0 6px 12px rgba(0,0,0,0.3);
      }
      
      .botton:active {
         transform: translateY(0);
         box-shadow: 0 2px 4px rgba(0,0,0,0.2);
      }

   </style>
</head>
<body>
   <div>
   <?php
      if ($_SESSION["contador"]!=0){
         echo "<p> Me alegro volver a verte. Contador: ".$_SESSION['contador']." </p>";
      }else{
         echo "<p> Gracias por venir primera vez. </p>";
      }
   ?>
<div class="areaBotton">
   <form action="" method="POST">
      <button class="botton" type="submit" name="clear" value="1">limpiar lista</button>
   </form>
   <?php
   //limpiar seesion
   if (isset($_POST['clear'])) {
      session_destroy();
   }
   ?>
</div>
</body>
</html>