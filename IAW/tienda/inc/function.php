<?php
function showArray($array){
   echo "<pre>";
   print_r($array);
   echo "</pre";
}

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

function conectaDB(){
   try{
      $con = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8",USER,PASS);
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $con;
   }catch(PDOException $e){
      echo "ERROR: Error al conectar".$e->getMessage();
      exit;
   }
}

function checkLogging($email,$password){
   $correct = False;
   $con = conectaDB() ;
   try{
      $sql = "Select * from usuarios where email = :email";
      $stmt = $con->prepare($sql);
      $stmt -> execute([ ':email' => $email ]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch(PDOException $e){
      echo "ERROR: Error al seleccionar la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   if (password_verify($password, $row['password'])) {
      unset($row['password']);
      $correct = True;
   }
   return $correct;
}

function getBasicUserDate($email){
   $con = conectaDB();
   try{
      $sql = "Select id,nombre from usuarios where email = :email ";
      $stmt = $con->prepare($sql);
      $stmt -> execute([ ':email' => $email ]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch(PDOException $e){
      echo "ERROR: Error al seleccionar la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   return $row;
}

function issetUserEmail($email){
   $con = conectaDB() ;
   try{
      $sql = "Select * from usuarios where email = :email ";
      $stmt = $con->prepare($sql);
      $stmt -> execute([ ':email' => $email ]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch(PDOException $e){
      echo "ERROR: Error al seleccionar la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   return $row;
}

function addUser($email,$password,$nombre,$apellidos,$direccion,$telefono){
   $con = conectaDB();
   $password = password_hash($password,PASSWORD_DEFAULT);
   try{
      $sql = "INSERT 
         INTO usuarios(email,password,nombre,apellido,direccion,telefono) 
         VALUES(:email,:password,:nombre,:apellidos,:direccion,:telefono)";
      $stmt = $con->prepare($sql);

      $stmt->bindparam(':email',$email,);
      $stmt->bindparam(':password',$password);
      $stmt->bindparam(':nombre',$nombre);
      $stmt->bindparam(':apellidos',$apellidos);
      $stmt->bindparam(':direccion',$direccion);
      $stmt->bindparam(':telefono',$telefono);

      $stmt->execute();
   }catch(PDOException $e){
      echo "ERROR: Error al inserta la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
}

function selectProduct($id){
   $con = conectaDB() ;
   try{
      $sql = "Select * from producto where idProducto = :id ";
      $stmt = $con->prepare($sql);
      $stmt -> execute([ ':id' => $id ]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch(PDOException $e){
      echo "ERROR: Error al seleccionar la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   return $row;
}

function showProduct($id){ 
   $row = selectProduct($id);
?>
      <!-- empieza un producto -->
      <div class="col mb-5">
            <div class="card h-100">
                  <!-- Product image-->
                  <img class="card-img-top" src="<?php echo $row['imagen'] ?>" alt="..." />
                  <!-- Product details-->
                  <div class="card-body p-4">
                     <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder"><?php echo $row['nombre'] ?></h5>
                        <!-- Product price-->
                        <?php echo $row['precioOferta']."$" ?>
                     </div>
                  </div>
                  <!-- Product actions-->
                  <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                     <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo "./producto.php?id=".$row['idProducto'] ?>">View options</a></div>
                  </div>
            </div>
         </div>
      <!-- terminar un producot -->
<?php } ?>
