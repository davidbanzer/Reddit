<?php

namespace App\controllers;

use App\models\bll\UsuarioBLL;

class LoginController
{

    public static function mostrarForm($error = "")
    {
        include_once "src/views/login/formlogin.php";
    }

    public static function iniciarSesion($request)
    {
        $user = new UsuarioBLL;
        $usuario = $request["correo"];
        $password = $request["password"];
        $objUsuario = $user->findUser($usuario,$password);
        if($objUsuario != null){
            $_SESSION["usuarioLoggeado"] = $usuario;
            $_SESSION["idUsuario"] = $objUsuario->getUsuarioId();
            PublicacionController::index();
            return;
        }

        $error = "Usuario o contraseña incorrectas";
        LoginController::mostrarForm($error);
    }
    public static function cerrarSesion()
    {
        session_destroy();
        PublicacionController::index();
    }
}