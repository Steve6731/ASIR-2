<?php    
if (empty($_COOKIE["color"])){
   setcookie("color","white",time()+60*60*24*7);
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
      }

      div {
         border-radius: 8px;
         background-color: white;
         padding: 20px 50px;
         box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      }

      .color-button {
         padding: 5px;
         border: none;
         border-radius: 8px;
         background-color: white;
         color: #333;
         cursor: pointer;
         box-shadow: 0 4px 8px rgba(0,0,0,0.2);
         transition: transform 0.2s, box-shadow 0.2s;
      }
         
      .color-button:hover {
         transform: translateY(-2px);
         box-shadow: 0 6px 12px rgba(0,0,0,0.3);
      }
      
      .color-button:active {
         transform: translateY(0);
         box-shadow: 0 2px 4px rgba(0,0,0,0.2);
      }
   </style>
</head>
<body style="background: <?php echo $_COOKIE["color"]?>" >
   <div>
      <form action="./cookie3b.php" method="POST">
         <select name="color">
            <option style="background: white" value="white">white</option>
            <option style="background: Red" value="Red">Red</option>
            <option style="background: Blue;color: white" value="Blue">Blue</option>
            <option style="background: Yellow" value="Yellow">Yellow</option>
            <option style="background: Green" value="Green">Green</option>
         </select>
         <input type="submit" name="Enviar" class="color-button" value="CAMBIAR"/>
      </form>
   </div>
</body>
</html>