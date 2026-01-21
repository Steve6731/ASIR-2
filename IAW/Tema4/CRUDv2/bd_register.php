<?php include("./inc/configuracion.php")?>
<?php include("./inc/function.php")?>
<?php include("./inc/bbdd.php")?>
<?php include("./inc/encabezado.php")?>

<?php function registerMenu($username,$password,$erro){ ?>
<div class="menuLogging">
   <div class="card " data-bs-theme="light">
      <form>
         <div>
            <h2>REGISTER<h1>
         </div>
         <!-- Email input -->
         <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form2Example1"> USERNAME</label>
            <input type="text" id="form2Example1" class="form-control" name="USERNAME" value="<?php echo $username?>"/>
         </div>

         <!-- Password input -->
         <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form2Example2">PASSWORD</label>
            <input type="password" id="form2Example2" class="form-control" name="PASSWORD" value="<?php echo $password?>"/>
         </div>

         <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form2Example2">REPEATE PASSWORD</label>
            <input type="password" id="form2Example2" class="form-control" name="PASSWORD2"/>
         </div>

         <!-- Submit button -->
         <div class="btnArea">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>
         </div>
         <p>Had an account? <a href="./index.php">Logging</a></p>
         <div class="erroArea">
            <?php if($erro!=""){echo $erro;}?>
         </div>
      </form>
   </div>
</div>

<?php 
} //acaba registerMenu

function registeracionResults($username){ ?>
<div class="menuLogging">
   <div class="card " data-bs-theme="light">
      <p class="registerResults">Usuario <span><?php echo $username;?></span> creado</p>
      <div class="btnArea">
      <a class='btn btn_secondary m-1' href='bd_insert.php'>Go to logging</a>
      </div>
   </div>
</div>
<?php
} //acaba registeracionResults

if (empty($_REQUEST)){
   $username = "";
   $password = "";
   $erro = "";
   registerMenu($username,$password,$erro);
}else{
   $erro = "";
   $username = recoge("USERNAME");
   $password = recoge("PASSWORD");
   $password2 = recoge("PASSWORD2");

   if ($username == ""){
      $erro .= "<p class='text-danger'>username no puede ser vacio</p>";
   }

   if ($password == ""){
      $erro .= "<p class='text-danger'>password no puede ser vacio</p>";
   }

   if ( issetUser($username) ){
      $erro .= "<p class='text-danger'>Nombres de usuario duplicados/p>";
   }

   if ($password != $password2){
      $erro .= "<p class='text-danger'>Las dos contraseñas no coinciden</p>";
   }

   if($erro == ""){
      addUser($username,$password);
      registeracionResults($username);
   }else{
      registerMenu($username,$password,$erro);
   }
   
}

?>
<?php include("./inc/pie.php")?>
