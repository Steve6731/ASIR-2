<?php include("./inc/header.php")?>
<?php function registerMenu($email,$password,$nombre,$apellidos,$direccion,$telefono,$erro){ ?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Registrarse</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>" >
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>" >
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos;?>" >
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion;?>" >
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono;?>" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">Registrarse</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="logging.php" class="text-decoration-none">¿Ya tienes cuenta? Inicia sesión aquí</a>
                    </div>
                </form>
                <div>
                  <?php echo $erro ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } //acaba registerMenu ?>
<?php function resultMenu(){ ?>

   <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow border-0 text-center">
                    <div class="card-body p-5">
                        <!-- Ícono de éxito -->
                        <div class="mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center bg-success bg-gradient rounded-circle mb-3" style="width: 100px; height: 100px;">
                                <i class="bi bi-check-circle display-4 text-white"></i>
                            </div>
                            <h2 class="card-title text-success">
                                <i class="bi bi-check-circle-fill me-2"></i>¡Registro Exitoso!
                            </h2>
                        </div>
                        
                        <!-- Mensaje de confirmación -->
                        <div class="mb-5">
                            <h4 class="fw-bold">¡Bienvenido/a a nuestra tienda!</h4>
                            <p class="text-muted">
                                <i class="bi bi-envelope-check me-2"></i>
                                Tu cuenta ha sido creada exitosamente. Hemos enviado un correo de confirmación a tu dirección de email.
                            </p>
                            <div class="alert alert-info mt-3">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Nota:</strong> Por favor, revisa tu bandeja de entrada (y carpeta de spam) para verificar tu cuenta.
                            </div>
                        </div>
                        
                        <!-- Botones de acción -->
                        <div class="d-grid gap-3">
                            <a href="logging.php" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                            </a>
                            
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <a href="index.php" class="btn btn-outline-primary w-100">
                                        <i class="bi bi-house-door me-2"></i>Ir al Inicio
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="cart.php" class="btn btn-outline-success w-100">
                                        <i class="bi bi-bag me-2"></i>Ver mi cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Información adicional -->
                        <div class="mt-5 pt-3 border-top">
                            <p class="text-muted small">
                                <i class="bi bi-shield-check me-2"></i>
                                Tu seguridad es importante para nosotros. Nunca compartiremos tu información personal con terceros.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php } //acaba resultMenu

if (empty($_REQUEST)){
   $email = ""; $password = "";
   $nombre = ""; $apellidos = "";
   $direccion = ""; $telefono = ""; 
   $erro = "";
   registerMenu($email,$password,$nombre,$apellidos,$direccion,$telefono,$erro);
}else{
   $email = recoge("email"); 
   $password = recoge("password");
   $confirm_password = recoge("confirm_password"); 
   $nombre = recoge("nombre");
   $apellidos = recoge("apellidos");
   $direccion = recoge("direccion");
   $telefono = recoge("telefono"); 
   $erro = "";


   if (in_array("", $_REQUEST, true)){
      $erro .= "<p class='text-danger'>No puede quedar ningun campo en vacio</p>";
   }
   if (!preg_match("/^.+@{1}.+\.{1}.{3}$/",$email)){
      $erro .= "<p class='text-danger'>Formato de email incorrecto</p>";
   }
   if (!preg_match("/^[0-9]{9}$/",$telefono)){
      $erro .= "<p class='text-danger'>Formato de número de teléfono incorrecto</p>";
   }
   if ($password != $confirm_password){
      $erro .= "<p class='text-danger'>Las dos contraseñas no coinciden.</p>";
   }
   if (issetUserEmail($email)){
      $erro .= "<p class='text-danger'>El correo electrónico registrada.</p>";
   }

   if($erro == ""){
      addUser($email,$password,$nombre,$apellidos,$direccion,$telefono);
      resultMenu();
   }else{
      registerMenu($email,$password,$nombre,$apellidos,$direccion,$telefono,$erro);
   }
}

?>