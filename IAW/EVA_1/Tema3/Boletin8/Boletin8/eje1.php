<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>HTML</title>
   <meta name="viewport" content="width = device_width, initial-scale=1.0">
   <style>
      /* CSS configuracion */
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
         padding: 3px 0px;
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
         padding: 3px 0px;
         font-size: 1.1rem;
         line-height: 1.6;
         background-color: #7fdfff;
      }

      .areaBotton{
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
   <!-- Pregunta --->
   <h1>Boletín 8. Programas en PHP</h1>
   <h2> 
   1. Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su
traducción). Utiliza un array asociativo para almacenar las parejas de palabras. El programa
pedirá una palabra en español y dará la correspondiente traducción en inglés.
   </h2>


<!-- Desde aqui enpieza probrograma php --->
<?php
// Función de recogida de datos
function recoge($key, $type = "")
{
    if (!is_string($key) && !is_int($key) || $key == "") {
        trigger_error("Function recoge(): Argument #1 (\$key) must be a non-empty string or an integer", E_USER_ERROR);
    } elseif ($type !== "" && $type !== []) {
        trigger_error("Function recoge(): Argument #2 (\$type) is optional, but if provided, it must be an empty array or an empty string", E_USER_ERROR);
    }
    $tmp = $type;
    if (isset($_REQUEST[$key])) {
        if (!is_array($_REQUEST[$key]) && !is_array($type)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$key]));
        } elseif (is_array($_REQUEST[$key]) && is_array($type)) {
            $tmp = $_REQUEST[$key];
            array_walk_recursive($tmp, function (&$value) {
                $value = trim(htmlspecialchars($value));
            });
        }
    }
    return $tmp;
}
?>


<?php function traductor($modo,$textInput,$textOutput){
   // aqui empieza función que enseña traductor
   // $modo: traduce Ingles a Español o reves ("es-en"|"en-es")
   // $textInput: Texto para traducir
   // $textOutput: Resulta de traducion
?>
<form method="POST">
   <h1>Traductor de fruta</h1>
   <!--para guardar modo cuando crea otro pagina-->
   <input type="hidden" name="modo" value="<?php echo $modo; ?>">
   <!-- traductor --->
   <div class="areaTraducir">
      <!-- input --->
      <div class="areaInput">
         <h3><?php $modo == "es-en" ? print "Español" : print "English"?></h3>
         <textarea id="textOrigen" name="textOrigen" placeholder="Pon un nombre de frutas..." ><?php echo $textInput?></textarea>
      </div>
      
      <!-- output --->
      <div class="areaOutput">
         <h3><?php $modo == "es-en" ? print "English" : print "Español"?></h3>
         <div class = "textOutput">
            <?php print $textOutput;?>
         </div>
      </div>
   </div>
   <!-- botton --->
   <div class="areaBotton">
      <button type="submit" class="botton" name="modo" value="<?php $modo == "es-en" ? print "en-es" : print "es-en"?>">
         ↔️<?php $modo == "es-en" ? print "Quiero traducir Ingles a Español" : print "Quiero traducir Español a Ingles"?>
      </button>
      <button type="submit" class="botton">
         📚Traducir
      </button>
   </div>
</form>
<?php } //termina function traductor?>

<?php 
   //Variables
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
      "Pomegranate" => "Granada"
   ];
?>

<?php
if(empty($_REQUEST)){
   traductor($modo,$textInput,$textOutput);
}else{   
   //obtener datos
   $textInput = recoge("textOrigen");
   $modo = recoge("modo");

   //si está en modo "Ingles a Español" y el palara exiten en arrary
   if ($modo=="en-es"){
      if (array_key_exists($textInput, $diccionario)){
         $textOutput = $diccionario[$textInput];
      }else{
         $textOutput = "Este palabra no está en diccionario de Ingles";
      }
   }
   //si está en modo "Español a Ingles" y el palara exiten en arrary
   if ($modo=="es-en"){
      if (in_array($textInput,$diccionario)){
         foreach($diccionario as $ingles => $espanol){
            if ($espanol == $textInput){
               $textOutput = $ingles;
            }
         }
      }else{
         $textOutput = "Este palabra no está en diccionario de Español";
      }
   }
   //enseña la resulta
   traductor($modo,$textInput,$textOutput);
}
?>

<?php

   echo "<p>Modo de traducir: $modo</p>";
   echo "<p>Este es mi diccionario. Pongo para comprobar.</p>";
   echo "<pre>";
   print_r($diccionario);
?>
</body>
</html>