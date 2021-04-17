<?php

namespace App\controllers;

use App\models\bll\ComunidadBLL;
use App\models\bll\PublicacionBLL;
use App\models\bll\UsuarioBLL;

class UsuarioController
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
        $objUsuario = null;
        $id = 0;
        include_once 'src/views/usuario/form.php';
    }

    static function create($request)
    {
        $usuarioBLL = new UsuarioBLL();
        if (isset($request["correo"]) && isset($request["contra"])) {
            $correo = $request["correo"];
            $contra = $request["contra"];
            $usuarioBLL->insert($correo, $contra);
        }
        ComunidadController::index();
    }

}