<?php include "inc\\encapezado.php"; ?>
<?php include "inc\\function.php"; ?>

<?php function mostrarFormulario($nombre,$email,$pais,$intereses){ ?>
    <h1>Formulario de Registro Completo</h1>

    <form action="" method="POST" enctype="multipart/form-data">

        <fieldset>
            <legend>1. Datos Personales</legend>

            <label for="nombreCompleto">Nombre Completo:</label>
            <input type="text" id="nombreCompleto" name="usuario_nombre" placeholder="Ej: Ana López" maxlength="50" value="<?php echo $nombre; ?>" />

            <label for="correoElectronico">Correo Electrónico:</label>
            <input type="text" id="correoElectronico" name="usuario_email" value="<?php echo $nombre; ?>">

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="usuario_pass">
            
            <label for="biografia">Biografía:</label>
            <textarea id="biografia" name="usuario_bio" rows="4" placeholder="Cuéntanos algo sobre ti..."></textarea>
        </fieldset>

        <fieldset>
            <legend>2. Información Adicional</legend>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="usuario_telefono" pattern="[0-9]{9}" placeholder="9 dígitos, ej: 123456789">

            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fechaNacimiento" name="usuario_fnac">

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="usuario_edad">

            <label for="sitioWeb">Sitio Web Personal:</label>
            <input type="url" id="sitioWeb" name="usuario_web" placeholder="https://ejemplo.com">
        </fieldset>
        
        <fieldset>
            <legend>3. Preferencias</legend>

            <p><strong>Idioma de preferencia:</strong></p>
            <input type="radio" id="idiomaEs" name="usuario_idioma" value="es" checked> <label for="idiomaEs">Español</label><br>
            <input type="radio" id="idiomaEn" name="usuario_idioma" value="en">
            <label for="idiomaEn">Inglés</label><br>

            <p><strong>Áreas de interés (puedes marcar varias):</strong></p>
            <input type="checkbox" id="interesTec" name="usuario_intereses[]" value="tecnologia" <?php if(in_array("tecnologia",$intereses)){echo "checked";}?>>
            <label for="interesTec">Tecnología</label><br>
            <input type="checkbox" id="interesDep" name="usuario_intereses[]" value="deportes" <?php if(in_array("deportes",$intereses)){echo "checked";}?>>
            <label for="interesDep">Deportes</label><br>
            <input type="checkbox" id="interesArt" name="usuario_intereses[]" value="arte" <?php if(in_array("arte",$intereses)){echo "checked";}?>>
            <label for="interesArt">Arte</label><br>

            <label for="colorFavorito">Color Favorito:</label>
            <input type="color" id="colorFavorito" name="usuario_color" value="#0056b3"> <label for="nivelSatisfaccion">Nivel de Satisfacción (1-10):</label>
            <input type="range" id="nivelSatisfaccion" name="usuario_satisfaccion" min="1" max="10" step="1" value="5">
        </fieldset>

        <fieldset>
            <legend>4. Datos de Usuario</legend>

            <label for="pais">País de Residencia:</label>
            <select id="pais" name="usuario_pais">
                <option value="" disabled selected>-- Elige un país --</option> 
                <option value="es" <?php if($pais=="es"){echo "selected";}?>>España</option>
                <option value="mx" <?php if($pais=="mx"){echo "selected";}?>>México</option>
                <option value="ar" <?php if($pais=="ar"){echo "selected";}?>>Argentina</option>
                <option value="co" <?php if($pais=="co"){echo "selected";}?>>Colombia</option>
            </select>

            <label for="profesion">Profesión:</label>
            <input list="profesiones" id="profesion" name="usuario_profesion">
            <datalist id="profesiones">
                <option value="Ingeniero/a">
                <option value="Diseñador/a">
                <option value="Desarrollador/a Web">
                <option value="Médico/a">
                <option value="Profesor/a">
            </datalist>

            <label for="avatar">Foto de perfil:</label>
            <input type="file" id="avatar" name="usuario_avatar" accept="image/png, image/jpeg">
        </fieldset>
        
        <fieldset>
            <legend>5. Finalizar</legend>
            
            <input type="hidden" id="tokenSeguridad" name="csrf_token" value="xyz123abc">

            <div class="submit-buttons">
                <input type="submit" value="Registrar mi cuenta">

                <input type="reset" value="Limpiar Formulario">
                
                <button type="button" onclick="alert('Botón de acción personalizado pulsado.')">Acción JS</button>

                </div>
        </fieldset>

    </form>
<?php } //cierra la funcion mostrarFormulario?>

<?php 
if(empty($_REQUEST)){ 
   $nombre = "";
   $email = "";
   $pais = "";
   $intereses = [];
   mostrarFormulario($nombre,$email,$pais,$intereses);
?>


<?php
}else{
   //obtener datos desde $_request
   $nombre = recoge("usuario_nombre");
   $email = recoge("usuario_email");
   $idioma = recoge("usuario_idioma");
   $pais = recoge("usuario_pais");
   $intereses = recoge("usuario_intereses",[]);

   //check error
   $errores="";
   if($nombre==""||strlen($nombre)<2){$errores.="<li>Debes introducir un nombre valido</li>";}
   if($email==""){$errores.="<li>Debes introducir tu email</li>";}
   if($pais==""){$errores.="<li>Debes marcar pais</li>";}
   if(empty($intereses)){$errores.="<li>Debes marcar un interés</li>";}

   //enseña los errors
   if($errores!=""){
      echo"<h3>Errores en el formulario</h3><ul>$errores</ul>";
      mostrarFormulario($nombre,$email,$pais,$intereses);
   }else{
   
   echo "<h1>Tus datos son</h1>";
   echo "<p><strong>Nombre:</strong> $nombre </p>";
   echo "<p><strong>Email:</strong> $email </p>";
   echo "<p><strong>Idioma:</strong> $idioma </p>";
   echo "<p><strong>Pais:</strong> $pais </p>";
   echo "<p><strong>Intereses:</strong>".((!empty($intereses)) ? implode(",",$intereses) : "No ha seleccionado ninguno")."</p>";

   if (isset($_FILES["usuario_avatar"]) and $_FILES["usuario_avatar"]["error"] == 0){
      $nombre_archivo = $_FILES["usuario_avatar"]["name"];
      echo "<p><strong>Archivo subido:<strong> $nombre_archivo";
      //$list = $_FILES;
      //echo "<pre>";
      //print_r($list);
   }
 }//else de if($errores!=""){
}//else{}
?>

<?php      
   include "inc\\pie.php";
?>