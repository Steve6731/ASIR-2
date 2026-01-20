<?php include("./inc/configuracion.php")?>
<?php include("./inc/function.php")?>
<?php include("./inc/bbdd.php")?>
<?php include("./inc/encabezado.php")?>

<?php function loggingMenu($username,$password,$erro){ ?>
<div class="menuLogging">
   <div class="card " data-bs-theme="light">
      <form>
         <div>
            <h2>LOGGING<h1>
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

         <!-- Submit button -->
         <div class="btnArea">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>
         </div>
         <div class="erroArea">
            <?php if($erro!=""){echo $erro;}?>
         </div>
      </form>
   </div>
</div>

<?php 
} //acaba loggingMenu
if($_SESSION['logging'] == 1){
   header("Location: bd_listado.php");
}else{
   if (empty($_REQUEST)){
      $username = "";
      $password = "";
      $erro = "";
      loggingMenu($username,$password,$erro);
   }else{
      $erro = "";
      $username = recoge("USERNAME");
      $password = recoge("PASSWORD");

      if ($username == ""){
         $erro .= "<p class='text-danger'>username no puede ser vacio</p>";
      }

      if ($password == ""){
         $erro .= "<p class='text-danger'>password no puede ser vacio</p>";
      }

      if($erro == ""){
         if ( !checkUser($username,$password) ){
            $erro .= "<p class='text-danger'>Falso username o password</p>";
         }else{
            $_SESSION["logging"] = 1;
            header("Location: bd_listado.php");
            exit;
         }
      }
      
      loggingMenu($username,$password,$erro);
   }
}
?>
<?php include("./inc/pie.php")?>
