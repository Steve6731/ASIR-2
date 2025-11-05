<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>HTML</title>
   <meta name="viewport" content="width = device_width, initial-scale=1.0">
   <style>
      body {}

      h1 {
         text-align: center;
         margin: 5px auto;
      }

      h3 {
         text-align: center;
         margin: 5px auto;
      }

      .areaTraducir {
         display: flex;
      }

      .areaInput {
         background: #fd4d4d;
         width: 50%;
      }

      .areaOutput {
         background: #00befd;
         width: 50%;
      }
      
      textarea {
         width: 100%;
         height: 250px;
         padding: 20px 0px;
         border: none;
         resize: none;
         font-size: 1.1rem;
         line-height: 1.6;
         outline: none;
         background-color: #ffbaba;
      }

      .textOutput {
         width: 100%;
         height: 250px;
         padding: 20px 0px;
         border: none;
         resize: none;
         font-size: 1.1rem;
         line-height: 1.6;
         outline: none;
         background-color: #7fdfff;
      }
   </style>
</head>
<body>
   <h1>Boletín 8. Programas en PHP</h1>
   <h2> 
   1. Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su
traducción). Utiliza un array asociativo para almacenar las parejas de palabras. El programa
pedirá una palabra en español y dará la correspondiente traducción en inglés.
   </h2>
   
<?php function traductor($modo,$textInput,$textOutput){?>
   <h1>Traductor de fruta</h1>
   <div class="areaTraducir">
      <div class="areaInput">
         <h3><?php $modo == "es-en" ? print "Español" : print "English"?></h3>
         <textarea id="textOrigen" name="textOrigen" placeholder="Pon un nombre de frutas..." ></textarea>
      </div>

      <div class="areaOutput">
         <h3><?php $modo == "es-en" ? print "English" : print "Español"?></h3>
         <div class = "textOutput">
         <?php
         print "

         ";
         ?>
         </div>
      </div>
   </div>
<?php } //termina function traductor?>

<?php 
   //Variables
   //Aqui Indica unos variables y mi diccionario
   $modo = "es-en";
   $textInput="";
   $textOutput="";
   $diccionario=[
      "Apple" => "Manzana",
      "Banana" => "Plátano",
      "Orange" => "Naranja",
      "Strawberry" => "Fresa",
      "Grapes" => "Uvas",
      "Watermelon" => "Sandía",
      "Pineapple" => "Piña",
      "Mango" => "Mango",
      "Pear" => "Pera",
      "Kiwi" => "Kiwi",
      "Cherry" => "Cereza",
      "Blueberry" => "Arándano",
      "Raspberry" => "Frambuesa",
      "Lemon" => "Limón",
      "Lime" => "Lima",
      "Coconut" => "Coco",
      "Peach" => "Melocotón",
      "Plum" => "Ciruela",
      "Avocado" => "Aguacate",
      "Pomegranate" => "Granada",
   ];
?>

<?php
   traductor($modo,$textInput,$textOutput);
?>

<div>
   <button id="butChangeLanguage">
      <i>↔️</i><?php $modo == "es-en" ? print "Quiero traducir Ingles a Español" : print "Quiero traducir Español a Ingles"?>
   </button>
   <button id="butTraducir">
      <i>📚</i> Traducir
   </button>
</div>

</body>
</html>