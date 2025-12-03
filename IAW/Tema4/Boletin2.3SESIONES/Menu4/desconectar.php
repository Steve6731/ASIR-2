<?php include("library.php"); ?>

<?php 
   $text = "Menús ".NUM_MENU." - Inicio";
   $menu = MENU_PRINCIPAL;
   cabecera($text, $menu)
?>

  <main>
   <p>Usted se ha <b>desconectado</b>.</p>
  </main>
<?php $_SESSION['estado'] = "desconectado";?>
<?php pie(); ?>

