<?php

namespace App\controllers;

class LoginController
{

    public static function mostrarForm($error = "")
    {
        include_once "src/views/login/formlogin.php";
    }

    public static function iniciarSesion($request)
    {
        $usuario = $request["usuario"];
        $password = $request["password"];
        if ($usuario == "admin" && $password == "admin") {
            $_SESSION["usuarioLoggeado"] = $usuario;
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