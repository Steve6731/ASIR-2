<?php include("./inc/header.php")?>
<!-- Header-->
<header class="bg-dark py-5">
   <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
         <h1 class="display-4 fw-bolder">Tienda que venden de todo</h1>
         <p class="lead fw-normal text-white-50 mb-0">La tienda con mayor reputación</p>
      </div>
   </div>
</header>
<!-- Section-->
<section class="py-5">
   <div class="container px-4 px-lg-5 mt-5">
         <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
         <?php // lista los productos
         for ($i=1;$i<=8;$i++){
            showProduct($i);
         }
         ?>
         </div>
   </div>
</section>
<?php include("./inc/foot.php")?>

