<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>HTML</title>
   <meta name="viewport" content="width = device_width, initial-scale=1.0">
   <style>
      /* CSS configuracion */
      * {
         border-radius:10px;
      }

      body {}

      h1,h3 {
         text-align: center;
         margin: 5px auto;
      }

      p {
         padding: 0px 10px;
      }

      .areaInput {
         background: #fd4d4d;
         padding: 0px 10px 7px;
         margin:0 auto;
         width: 75%;
      }

      .areaOutput {
         background: #00befd;
         padding: 0px 10px 7px;
         margin:0 auto;
         width: 75%;
      }
      
      textarea {
         width: 98%;
         height: 50px;
         padding: 5px 0px;
         border: none;
         resize: none;
         font-size: 1.1rem;
         line-height: 1.6;
         outline: none;
         background-color: transparent;
      }

      .textInput {
         width: 100%;
         padding: 3px 0px;
         font-size: 1.1rem;
         line-height: 1.6;
         background-color: #ffbaba;
         display: flex;
         justify-content: center;
      }

      .textOutput {
         width: 100%;
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
   3. Realiza un programa que vaya pidiendo números hasta que se introduzca un número 
negativo y nos diga cuantos números se han introducido, la media de los impares y el mayor 
de los pares. El número negativo sólo se utiliza para indicar el final de la introducción de 
datos pero no se incluye en el cómputo
   </h2>


<!-- Desde aqui enpieza probrograma php --->
<?php
// session
session_start();
if (!isset($_SESSION['listaNumeroPares'])) {
    $_SESSION['listaNumero'] = [];
}
if (!isset($_SESSION['listaNumeroImpares'])) {
   $_SESSION['listaNumero'] = [];
}
?>

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


<?php function mostrar($termina,$textInput,$textOutput){
   // aqui empieza función
?>
<form method="POST">
   <h1>Lista de numeros</h1>

   <!-- input --->
   <div class="areaInput">
      <h3>Input</h3>
      <div class = "textInput">
         <textarea id="textInput" name="textInput" placeholder="Pon un numro positivo" ></textarea>
      </div>
   </div>
   
   <!-- output --->
   <div class="areaOutput">
      <h3>Output</h3>
      <div class = "textOutput">
         <p><?php print $textOutput;?></p>
      </div>
   </div>
   
   <!-- botton --->
   <div class="areaBotton">
      <button class="botton" type="submit" name="clear" value="1">limpiar lista</button>
      <?php if (!$termina){ //va ocultar el botón cuando termina programa?>
         <button class="botton" type="submit">Submit</button>
      <?php } //para contror ?>
   </div>
   
</form>
<?php } //termina function mostrar?>

<?php 
   //Variables
   //puede poner texto por defecto
   $termina=False;
   $textInput="";
   $textOutput="Ahora no hay nada";
?>

<?php
if(empty($_REQUEST)){
   mostrar($termina,$textInput,$textOutput);
}else{   
   //obtener datos
   $textInput = recoge("textInput");
   $textOutput = "";
   //limpiar seesion
   if (isset($_POST['clear'])) {
      $_SESSION['listaNumeroPares'] = [];
      $_SESSION['listaNumeroImpares'] = [];
      $textInput = "";
   }

   //Comienza el procesamiento de datos
   //si recibe un numero positivo
   if (preg_match("/^[1-9][0-9]*$/",$textInput)){
      //guardar datos en session
      if ($textInput%2 == 1){
         $_SESSION['listaNumeroImpares'][] = $textInput;
      }else{
         $_SESSION['listaNumeroPares'][] = $textInput;
      }
   //si es numero negativo
   }elseif (preg_match("/^-[1-9][0-9]*$/",$textInput)){
      //termina programa
      $termina = True;
   //si pone algo raro
   }elseif ($textInput!=""){
      $textOutput .= "No puedes añadir algo fuera de numero<br/>";
   }

   //desde aqui empieza genera resulta que va enseñar
   //primero calcura numero necesario
   $countNumeroPares = count($_SESSION['listaNumeroPares']);
   $countNumeroImpares = count($_SESSION['listaNumeroImpares']);
   $countNumero = $countNumeroPares + $countNumeroImpares;

   if($countNumero==0){
      $textOutput .="Ahora no hay nada";
   }else{
      $textOutput .= "Resulta del programa:";
      //busca Maximo de numeros Pares
      if($countNumeroPares!=0){
         $maxPares = $_SESSION['listaNumeroPares'][0];
         foreach ($_SESSION['listaNumeroPares'] as $numeroPares){
            if ($numeroPares > $maxPares){
               $maxPares = $numeroPares;
            }
         }
         $textOutput .= 
            "<br/>Lista de nuemro pares: "
            .implode(", ",$_SESSION['listaNumeroPares'])
            ."<br/>Maximo de numero pares: $maxPares ";   
      }

      //calcula Medio de numeros Impares
      if($countNumeroImpares!=0){
      $medioImpares = round(array_sum($_SESSION['listaNumeroImpares'])/$countNumeroImpares,2);;
      $textOutput .= 
         "<br/>Lista de nuemro Impares: "
         .implode(", ",$_SESSION['listaNumeroImpares'])
         ."<br/>Medio de numeros pares:  $medioImpares";
      }

      //enseña $countNumero
      $textOutput.="<br/>Cuantos números se han introducido: $countNumero";

      //aviso que puede termina con numero negativo.
      if(!$termina){
         $textOutput.= "<br/>Puede poner un numero negativo para terminar.";
      }else{
         $textOutput.= "<br/>Pulsa \"limpia lista\" para hacer otra vez.";
      }
   }
   
   mostrar($termina,$textInput,$textOutput);
}
?>

<?php
   echo "<p>Pongo para comprobar array.</p>";
   echo "\$_REQUEST<pre>";
   print_r($_REQUEST);
   echo "</pre>\$_SESSION<pre>";
   print_r($_SESSION);
?>
</body>
</html>