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

      .imagen{
         display: flex;
         justify-content: center;
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
         text-align: center;
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
   5. Adivina un número. Realiza un script en php que te permita adivinar un número aleatorio 
entre 1 y 100 en un máximo de 5 intentos. Cada vez que el usuario introduce un número, el 
programa debe darle una pista de si el número que tiene que adivinar es mayor o menor.
   </h2>


<!-- Desde aqui enpieza probrograma php --->
<?php
// session
session_start();
if (!isset($_SESSION['oportunidad'])) {
    $_SESSION['oportunidad'] = 5;
}
if (!isset($_SESSION['numero'])) {
   $_SESSION['numero'] = rand(1,100);
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
   <h1>UNA CAJA FUERTE</h1>

   <!-- input --->
   <div class="areaInput">
      <h3>Input</h3>
      <div class = "textInput">
         <textarea id="textInput" name="textInput" placeholder="Pon un numero ej: 12" ></textarea>
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
         <button class="botton" type="submit" name="submit" value="1">Submit</button>
      <?php } //para oculta boton ?>
   </div>
   
</form>
<?php } //termina function mostrar?>

<?php 
   //Variables
   //puede poner texto por defecto
   $termina=False;
   $textInput="";
   $textOutput="Pon un numero entre 1 a 100.<br/>Tienes un máximo de 5 intentos.";
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
      $_SESSION['oportunidad'] = 5;
      $_SESSION['numero'] = rand(1,100);
      $termina=False;
      $textInput = "";
      $textOutput="Pon un numero entre 1 a 100.<br/>Tienes un máximo de 5 intentos.";
   }

   //cuando falla
   if ($_SESSION['oportunidad'] == 0){
      $termina=True;
      $textInput = "";
      $textOutput = "Has fallado";
   }

   //comprobar nuemro
   if ($textInput == $_SESSION['numero']){
      $textOutput = "🤓¡Correcta \"".$_SESSION['numero']."\" es el numero aleatorio.!🤓";
      $termina=True;
   }elseif($textInput != ""){
      $_SESSION['oportunidad']--;
      if ($textInput > $_SESSION['numero']){
         $textOutput = "El numero aleatorio es más pequeño. ";
      }else{
         $textOutput = "El numero aleatorio es más grante. ";
      }
      $textOutput .="<br/>Quedas ".$_SESSION['oportunidad']." oportunidades";
   }elseif(isset($_POST['clear'])){
      $textOutput = "No puedes quedar vacio <br/> Oportunidad queda igual";
   }

   //Avisa que puede repetir
   if ($termina==True){
     $textOutput .= "<br/>Haz clic en \"Limpia Lista\" para volver a intentarlo.";
   }

   //enseña
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