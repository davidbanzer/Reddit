<?php

namespace App\controllers;

use App\models\bll\PublicacionBLL;
use App\models\bll\ComunidadBLL;

class PublicacionController
{
    static function index()
    {
        $publicacionBLL = new PublicacionBLL();
        $comunidadBLL = new ComunidadBLL();
        $listaComunidades = $comunidadBLL->selectAll();
        $listaPublicaciones = $publicacionBLL->selectAll();
        include_once 'src/views/publicacion/list.php';
    }

    static function insert()
    {
        $objPublicacion = null;
        $id = 0;
        include_once 'src/views/publicacion/form.php';
    }

    static function create($request)
    {
        $publicacionBLL = new PUblicacionBLL();
        if (isset($request["titulo"]) && isset($request["descripcion"])
            && isset($request["cantidad_de_votos"]) && isset($request["comunidad_id"])
            && isset($request["usuario_id"])) {
            $titulo = $request["titulo"];
            $descripcion = $request["descripcion"];
            $cantidad_de_votos = $request["cantidad_de_votos"];
            $comunidad_id = $request["comunidad_id"];
            $usuario_id = $request["usuario_id"];
            $publicacionBLL->insert($titulo, $descripcion, $cantidad_de_votos, $comunidad_id, $usuario_id);
        }
        PublicacionController::index();
    }

    static function update($request)
    {
        $id = 0;
        $publicacionBLL = new PublicacionBLL();
        $objPublicacion = null;
        if(isset($request["id"])) {
            $id = $request["id"];
            $objPublicacion = $publicacionBLL->selectById($id);
        }
        include_once 'src/views/publicacion/form.php';
    }

    static function saveUpdate($request)
    {
        $publicacionBLL = new PublicacionBLL();
        if (isset($request["titulo"]) && isset($request["descripcion"])
            && isset($request["cantidad_de_votos"]) && isset($request["comunidad_id"])
            && isset($request["usuario_id"]) && isset($request["id"])) {
            $titulo = $request["titulo"];
            $descripcion = $request["descripcion"];
            $cantidad_de_votos = $request["cantidad_de_votos"];
            $comunidad_id = $request["comunidad_id"];
            $usuario_id = $request["usuario_id"];
            $id = $request["id"];
            $publicacionBLL->update($titulo, $descripcion, $cantidad_de_votos, $comunidad_id, $usuario_id, $id);
        }
        PublicacionController::index();
    }

    static function delete($request)
    {
        $publicacionBLL = new PublicacionBLL();
        if (isset($request["id"])) {
            $publicacion_id = $request["id"];
            $publicacionBLL->delete($publicacion_id);
        }
        PublicacionController::index();
    }
}