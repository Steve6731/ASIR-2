<?php
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

function checkUser($username,$password){
   $correct = False;
   $con = conectaDB() ;
   try{
      $sql = "Select * from users where username = :username";
      $stmt = $con->prepare($sql);
      $stmt -> execute([ ':username' => $username ]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch(PDOException $e){
      echo "ERROR: Error al seleccionar la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   if (password_verify($password, $row['PASSWORD'])) {
      unset($row['password']);
      $correct = True;
   }
   return $correct;
}

function checkProduct($id){
   $correct = False;
   $con = conectaDB() ;
   try{
      $sql = "Select * from users where username = :username";
      $stmt = $con->prepare($sql);
      $stmt -> execute([ ':username' => $username ]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch(PDOException $e){
      echo "ERROR: Error al seleccionar la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   if (password_verify($password, $row['PASSWORD'])) {
      unset($row['password']);
      $correct = True;
   }
   return $correct;
}
?>

<?php 
function showProduct($id){ 
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
                        <?php echo $row['precioOferta'] ?>
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
