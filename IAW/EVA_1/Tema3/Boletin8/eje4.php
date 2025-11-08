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
         background: #ffcc00;
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
         background-color: #F1D81C;
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
   4. Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. 
El programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el 
mensaje “Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se 
ha abierto satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.
   </h2>


<!-- Desde aqui enpieza probrograma php --->
<?php
// session
session_start();
if (!isset($_SESSION['oportunidad'])) {
    $_SESSION['oportunidad'] = 4;
}
if (!isset($_SESSION['password'])) {
   $_SESSION['password'] = rand(1000,9999);
}
if (!isset($_SESSION['estadoCaja'])) {
   $_SESSION['estadoCaja'] = "cerrado";
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
         <textarea id="textInput" name="textInput" placeholder="Pon la contraseña ej: 1234" ></textarea>
      </div>
   </div>
   
   <!-- output --->
   <div class="areaOutput">
      <h3>Output</h3>
      <div class = "textOutput">
         <p><?php print $textOutput;?></p>
         <div class="imagen"><img src=".\img\<?php echo $_SESSION['estadoCaja']?>.png"></div>
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
   $textOutput="Está cerrado";
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
      $_SESSION['oportunidad'] = 4;
      $_SESSION['password'] = rand(1000,9999);
      $_SESSION['estadoCaja'] = "cerrado";
      $termina=False;
      $textInput = "";
      $textOutput="Está cerrado";
   }

   //cuando falla
   if ($_SESSION['oportunidad'] == 0){
      $termina=True;
      $textInput = "";
      $textOutput = "Has fallado";
   }

   //comprobar nuemro
   if ($textInput == $_SESSION['password']){
      $textOutput = "La contraseña es correcta";
      $_SESSION['estadoCaja'] = "abierdo";
      $termina=True;
   }elseif($textInput != ""){
      $_SESSION['oportunidad']--;
      $textOutput = "La contraseña es falsa, queda ".$_SESSION['oportunidad']." oportunidades";
   }elseif($termina==False){
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