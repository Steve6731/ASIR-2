<?php include("./inc/header.php")?>
<?php function loggingMenu($email,$password,$erro){ ?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Iniciar Sesión</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="register.php" class="text-decoration-none">¿No tienes cuenta? Regístrate aquí</a>
                    </div>
                </form>
                <div>
                  <?php echo $erro; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
} //acaba loggingMenu

if (empty($_REQUEST)){
   $email = "";
   $password = "";
   $erro = "";
   loggingMenu($email,$password,$erro);
}else{
   $erro = "";
   $email = recoge("email");
   $password = recoge("password");

   if ($email == ""){
      $erro .= "<p class='text-danger'>email no puede ser vacio</p>";
   }

   if ($password == ""){
      $erro .= "<p class='text-danger'>password no puede ser vacio</p>";
   }

   if($erro == ""){
      if ( !checkLogging($email,$password) ){
         $erro .= "<p class='text-danger'>Falso email o password</p>";
      }else{
         $basicUserDate = getBasicUserDate($email);
         $_SESSION["logging"] = $basicUserDate["id"];
         $_SESSION["nombre"] = $basicUserDate["nombre"];
         header("Location: index.php");
         exit;
      }
   }
   
   loggingMenu($email,$password,$erro);
}

?>