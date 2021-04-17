<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reddit</title>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
    <script type="text/javascript" src="vendor/components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="index.php"><img style="height: 30px; width: 80px;" src="https://logodownload.org/wp-content/uploads/2018/02/reddit-logo-13.png" class="img-fluid align-baseline mr-5" alt="reddit-logo-13" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <?php if (isset($_SESSION["usuarioLoggeado"])): ?>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Publicación
                </a>
                <?php endif;?>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?controller=publicacion&action=insert">Nueva Publicación</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <?php if (isset($_SESSION["usuarioLoggeado"])): ?>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Comunidad
                </a>
                <?php endif;?>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?controller=comunidad&action=insert">Nueva Comunidad</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <?php if (!isset($_SESSION["usuarioLoggeado"])): ?>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuario
                </a>
                <?php endif; ?>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="index.php?controller=usuario&action=insert">Nuevo Usuario</a>
                </div>
            </li>
        </ul>
        <div>
            <?php if (!isset($_SESSION["usuarioLoggeado"])): ?>
            <a href="index.php?controller=login&action=iniciarsesion" class="btn btn-outline-secondary">Log in</a>
            <?php endif;?>
            <?php if (isset($_SESSION["usuarioLoggeado"])): ?>
            <a href="index.php?controller=publicacion&action=borrar-sesion" class="btn btn-outline-secondary">Log out</a>
            <?php endif;?>
        </div>
    </div>
</nav>
</body>
</html>

<?php
include_once "vendor/autoload.php";
?>