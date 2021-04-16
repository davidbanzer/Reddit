<?php

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
    /*case "mascota":
        switch ($action) {
            case "list":
                MascotaController::index();
                break;
            case "insert":
                //Mostrar formulario
                MascotaController::insert();
                break;
            case "create":
                //Guardar nuevo
                MascotaController::create($_REQUEST);
                break;
            case "update":
                //Mostrar formulario
                MascotaController::update($_REQUEST);
                break;
            case "saveupdate":
                //Guardar cambios
                MascotaController::saveUpdate($_REQUEST);
                break;
            case "delete":
                MascotaController::delete($_REQUEST);
                break;
        }
        break;*/
}
