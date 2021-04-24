<?php

namespace App\controllers;

use App\models\bll\ComunidadBLL;
use App\models\bll\PublicacionBLL;

class ComunidadController
{
    static function index()
    {
        /*$id = 0;
        $publicacionBLL = new PublicacionBLL();
        if(isset($request["id"])) {
            $id = $request["id"];
        }
        $listaPublicaciones = $publicacionBLL->selectAllById($id);*/
        include_once 'src/views/comunidad/list.php';
    }

    static function insert()
    {
        $objComunidad = null;
        $id = 0;
        include_once 'src/views/comunidad/form.php';
    }

    static function create($request)
    {
        $comunidadBLL = new ComunidadBLL();
        if (isset($request["nombre"]) && isset($request["usuario_id"])) {
            $nombre = $request["nombre"];
            $usuario_id = $request["usuario_id"];
            $comunidadBLL->insert($nombre, $usuario_id);
        }
       PublicacionController::index();
    }

    static function update($request)
    {
        $id = 0;
        $comunidadBLL = new ComunidadBLL();
        $objComunidad = null;
        if(isset($request["id"])) {
            $id = $request["id"];
            $objComunidad = $comunidadBLL->selectById($id);
        }
        include_once 'src/views/comunidad/form.php';
    }

    static function saveUpdate($request)
    {
        $comunidadBLL = new ComunidadBLL();
        if (isset($request["nombre"]) && isset($request["usuario_id"]) && isset($request["id"])) {
            $nombre = $request["nombre"];
            $usuario_id = $request["usuario_id"];
            $id = $request["id"];
            $comunidadBLL->update($nombre, $usuario_id, $id);
        }
        PublicacionController::index();
    }

    static function delete($request)
    {
        $comunidadBLL = new ComunidadBLL();
        if (isset($request["id"])) {
            $id = $request["id"];
            $comunidadBLL->delete($id);
        }
        PublicacionController::index();
    }
}