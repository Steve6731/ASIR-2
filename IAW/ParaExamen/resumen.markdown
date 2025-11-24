
```php
define("PI",3.1415926);

$[nombreVariable] = [[numero]|"[texto]"|[array]];

$[array]= ["a","b","c"];
$[array]= ["a"=>"ana","b"=>"bob","c"=>"calor"];
$[array]= [1=>"a",5=>"b",9=>"c"];

//operadores calcuro +,-,*,/,%
$suma = $num1 + $num2;
$resta = $num1 - $num2;
$mult = $num1 * $num2;
$div = $num1 / $num2;
$mod = $num1 % $num2;
$power = $num1**$num2;
$power2 = pow($num1,$num2)

$i++
$i--

$i += $num
$i -= $num
$i *= $num
$i /= $num
$i %= $num
$i .= $num

$resulta = ($num1 + $num2) * $num3;
```

```php
echo "text = $variable".$[array["clave"]].funcion();
print "text = $variable".$[array["clave"]].funcion();
```

```php
//Funciones integradas
rand($numMin,$numMax)
round($variable,[Número de dígitos])
strval($variable)
implode(",",$array)

unset($array["clave"]);
count($array)

in_array($text,$array)
empty($_REQUEST)
isset($valor)
is_array($array)
is_string($valor)

preg_match("/^[a-z]?[a-z]+[a-z]{2}[a-z]{2,3}[1-9][0-9]*cat|dog$/",$textInput)

session_start();
$_REQUEST
$_SESSION
/*
if (!isset($_SESSION['oportunidad'])) {
    $_SESSION['oportunidad'] = 5;
}
*/

trim($textInput)
htmlspecialchars($textInput)

print"<pre>";
print_r($numeros);
print"</pre>";
```

```php
/*
[condicion]:
$num1 [<,>,>=,<=,==,!=] $num2 [&&,and,||,or] $num1 [<,>,>=,<=,==,!=] $num3
*/

if([condicion]){
   null;
}elseif([condicion]){
   null;
}else{
   null;
}

[condicion] ? [accionIf] : [accionElse] ;

switch ($varible){
   case valor1:    
   case valor2:
   case valor3: null;break;  
   case valor4:
   case valor5: null;break;
   default: null;break;
}
```

```php
for($i=$valorInicio;condicionParaTermina;$i++){
   null;
}

$i=$valorInicio;
while(condicionParaTermina){
   null;
   $i++;
}

foreach($array as $clave => $valor){
   null;
}

foreach($array as $valor){
   null;
}
```

```php

```

```html
<img src = ".\imagen\$num.svg">
<p>&#<?php rand(128512,128586)?></p>
<p style="background-color:rgb($col1 $col2 $col3)"></p>

<table border="1">
<thead>
   <tr>
      <th colspan="5">numeros</th>
      <th colspan="2">numeros*</th>
   </tr>
</thead>
<tbody>
   <tr>
      <td></td>
   </tr>
</tbody>
</table>

<ul>
   <li> </li>
   <li> </li>
   <li> </li>
</ul>

<ol>
   <li> </li>
   <li> </li>
   <li> </li>
</ol>
```

```php
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
```

```html
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
      <?php } //para oculta boton  ?>
   </div>
   
</form>
<?php } //termina function mostrar?>
```