<?php
include 'conexion.php';

function registrar($dbh)
{
    if (!isset($_SESSION['rol_usuario'])) {
?>
        <li><a href="registrarusuario.php">Crear cuenta</a></li>
        <li><a href="iniciarsesion.php">Iniciar sesión</a></li>

    <?php
    } else if ($_SESSION['rol_usuario'] == "Servidor") {
    ?>

        <li><a href="../perfil.php">Perfil</a></li>
        <li><a href="servidor/cerrar.php">Cerrar sesión</a></li>

    <?php
    } else if ($_SESSION['rol_usuario'] != "Servidor") {
    ?>
        <li><a href="servidor/cerrar.php">Cerrar sesión</a></li>
<?php
    }
}
?>