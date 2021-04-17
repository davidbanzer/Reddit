<?php

use App\controllers\ComunidadController;
use App\controllers\LoginController;
use App\controllers\PublicacionController;
use App\controllers\UsuarioController;

$controller = "publicacion";
if (isset($_REQUEST["controller"])) {
    $controller = $_REQUEST["controller"];
}

$action = "list";
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

switch ($controller) {
    case "publicacion":
        switch ($action) {
            case "list":
                PublicacionController::index();
                break;
            case "insert":
                //Mostrar formulario
                PublicacionController::insert();
                break;
            case "create":
                //Guardar nuevo
                PublicacionController::create($_REQUEST);
                break;
            case "update":
                //Mostrar formulario
                PublicacionController::update($_REQUEST);
                break;
            case "saveupdate":
                //Guardar cambios
                PublicacionController::saveUpdate($_REQUEST);
                break;
            case "delete":
                PublicacionController::delete($_REQUEST);
                break;
            case "borrar-sesion":
                PublicacionController::borrarSesion();
                break;
        }
        break;
    case "comunidad":
        switch ($action) {
            case "insert":
                //Mostrar formulario
                ComunidadController::insert();
                break;
            case "create":
                //Guardar nuevo
                ComunidadController::create($_REQUEST);
                break;
            case "update":
                //Mostrar formulario
                ComunidadController::update($_REQUEST);
                break;
            case "saveupdate":
                //Guardar cambios
                ComunidadController::saveUpdate($_REQUEST);
                break;
            case "delete":
                ComunidadController::delete($_REQUEST);
                break;
        }
        break;
    case "usuario":{
        switch ($action) {
            case "insert":
                //Mostrar formulario
                UsuarioController::insert();
                break;
            case "create":
                //Guardar nuevo
                UsuarioController::create($_REQUEST);
                break;
        }
        break;
    }
    case "login":
        switch ($action) {
            case "iniciarsesion":
                LoginController::mostrarForm();
                break;
            case "postIniciarSesion":
                LoginController::iniciarSesion($_REQUEST);
                break;
        }
        break;
}
