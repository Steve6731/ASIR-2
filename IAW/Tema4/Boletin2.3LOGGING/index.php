<?php session_start() ?>
<?php 
   define("USERNAME","Xuan");
   define("PASSWORD","abc123.");
?>
<?php include "inc\\encapezado.php"; ?>
<?php include "inc\\function.php"; ?>

<?php function mostrarFormulario($nombre,$password){ ?>
<h1>Pratica de logging</h1>

<form action="" method="POST" enctype="multipart/form-data">

   <fieldset>
      <legend>Login</legend>

      <label for="nombreCompleto">User name:</label>
      <input type="text" id="nombreCompleto" name="usuario_nombre" placeholder="Ej: Ana López" maxlength="50" value="<?php echo $nombre; ?>" />

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" value="<?php echo $password; ?>">
   </fieldset>

   <fieldset>
      <input type="hidden" id="tokenSeguridad" name="csrf_token" value="xyz123abc">

      <div class="submit-buttons">
         <input type="submit" value="Logging">
         <input type="reset" value="Cancel">
      </div>
   </fieldset>
</form>
<?php } //cierra la funcion mostrarFormulario?>

<?php 
if(empty($_REQUEST)){ 
   $nombre = "";
   $password = "";
   mostrarFormulario($nombre,$password);
?>


<?php
}else{
   $nombre = recoge("usuario_nombre");
   $password = recoge("password");

   $errores="";
   if($nombre!=USERNAME or $password!=PASSWORD){
      $errores.="<li>Username or password es falso</li>";
   }

   if($errores!=""){
      echo"<h3>Errores en el formulario</h3><ul>$errores</ul>";
      mostrarFormulario($nombre,$password);
   }else{
      $_SESSION["username"]=USERNAME;
      $_SESSION["password"]=PASSWORD;
      header("Location: logging.php");
   }
}//else{}
?>

<?php      
   include "inc\\pie.php";
?>