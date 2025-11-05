<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Completo HTML</title>
    <style>
        /* Estilos básicos para mejorar la legibilidad */
        body { font-family: sans-serif; line-height: 1.6; color: #333; max-width: 800px; margin: 20px auto; padding: 0 15px; }
        form { border: 1px solid #ccc; padding: 20px; border-radius: 8px; background-color: #f9f9f9; }
        fieldset { border: 1px solid #aaa; border-radius: 5px; margin-bottom: 20px; }
        legend { font-weight: bold; color: #0056b3; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 4px; border: 1px solid #ccc; box-sizing: border-box; }
        input[type="checkbox"], input[type="radio"] { width: auto; }
        .submit-buttons { text-align: center; }
        button, input[type="submit"], input[type="reset"], input[type="image"] { padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin: 5px; }
        input[type="submit"] { background-color: #28a745; color: white; }
        input[type="reset"] { background-color: #ffc107; color: black; }
        button { background-color: #007bff; color: white; }
    </style>
</head>
<body>
   <?php
      if(empty($_REQUEST)){
   ?>
    <h1>Formulario de Registro Completo</h1>

    <form action="" method="POST" enctype="multipart/form-data">

        <fieldset>
            <legend>1. Datos Personales</legend>

            <label for="nombreCompleto">Nombre Completo:</label>
            <input type="text" id="nombreCompleto" name="usuario_nombre" placeholder="Ej: Ana López" required maxlength="50">

            <label for="correoElectronico">Correo Electrónico:</label>
            <input type="email" id="correoElectronico" name="usuario_email" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="usuario_pass" required minlength="8">
            
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
            <input type="number" id="edad" name="usuario_edad" min="18" max="100">

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
            <input type="checkbox" id="interesTec" name="usuario_intereses[]" value="tecnologia">
            <label for="interesTec">Tecnología</label><br>
            <input type="checkbox" id="interesDep" name="usuario_intereses[]" value="deportes">
            <label for="interesDep">Deportes</label><br>
            <input type="checkbox" id="interesArt" name="usuario_intereses[]" value="arte">
            <label for="interesArt">Arte</label><br>

            <label for="colorFavorito">Color Favorito:</label>
            <input type="color" id="colorFavorito" name="usuario_color" value="#0056b3"> <label for="nivelSatisfaccion">Nivel de Satisfacción (1-10):</label>
            <input type="range" id="nivelSatisfaccion" name="usuario_satisfaccion" min="1" max="10" step="1" value="5">
        </fieldset>

        <fieldset>
            <legend>4. Datos de Usuario</legend>

            <label for="pais">País de Residencia:</label>
            <select id="pais" name="usuario_pais">
                <option value="" disabled selected>-- Elige un país --</option> <option value="es">España</option>
                <option value="mx">México</option>
                <option value="ar">Argentina</option>
                <option value="co">Colombia</option>
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
      <?php
      }else{
         $nombre = $_REQUEST["usuario_nombre"];
         $email = $_REQUEST["usuario_email"];
         $idioma = $_REQUEST["usuario_idioma"];
         $pais = $_REQUEST["usuario_pais"];
         $intereses = $_REQUEST["usuario_intereses"] ?? [];
      
         echo "<h1>Tus datos son</h1>";
         echo "<p><strong>Nombre:</strong> $nombre </p>";
         echo "<p><strong>Email:</strong> $email </p>";
         echo "<p><strong>Idioma:</strong> $idioma </p>";
         echo "<p><strong>Pais:</strong> $pais </p>";
         echo "<p><strong>Intereses:</strong>".implode(",",$intereses)."</p>";
         
         if (isset($_FILES["usuario_avatar"]) and $_FILES["usuario_avatar"]["error"] == 0){
            $nombre_archivo = $_FILES["usuario_avatar"]["name"];
            echo "<p><strong>Archivo subido:<strong> $nombre_archivo";
            //$list = $_FILES;
            //echo "<pre>";
            //print_r($list);
         }
      }//else{}
   ?>
</body>
</html>