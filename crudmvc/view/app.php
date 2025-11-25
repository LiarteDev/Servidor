<?php
// require_once("controller/login.php");

/*if (!LoginControlador::Logueado()) {
    header("Location:" . URLSITE . "view/login.php");
    die();
}
*/

require("layout/header.php"); ?>

<h1>Q3 MVC</h1>

<!--<h3>Usuario: <?php echo $_SESSION["nombre"] . "(" . $_SESSION["usuario"] . ")"; ?></h3>
<br>
<?php require("layout/footer.php") ?>