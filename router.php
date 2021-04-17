<?php

use App\controllers\ComunidadController;
use App\controllers\PublicacionController;

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
}
