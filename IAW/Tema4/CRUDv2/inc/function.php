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

function loggingCheck(){ 
   if (empty($_SESSION) || $_SESSION["USER"] != USER || $_SESSION["PASS"] != PASS || $_SESSION["logging"]==0){
      header("Location: index.php");
      exit;
   }
}

function parameterCheck(){
   if (empty($_REQUEST) || empty($_REQUEST["id"])){
      header("Location: bd_listado.php");
      exit;
   }
}
?>