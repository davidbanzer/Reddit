<?php


namespace App\models\bll;
use PDO;
use App\models\dto\Usuario;
use App\models\dal\Connection;

class UsuarioBLL
{
    function insert($correo,$contra)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams(
            "INSERT INTO usuario (correo,contra)
                 VALUES (:varCorreo, :varContra)",
            array(
                ":varCorreo" => $correo,
                ":varContra" => $contra
            )
        );
        return $objConecction->getLastInsertedId();
    }

    function update($correo,$contra, $id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        UPDATE usuario
        SET correo = :varCorreo,
            contra = :varContra
        WHERE usuario_id = :varUsuarioId
        ", array(
            ":varCorreo" => $correo,
            ":varContra" => $contra,
            ":varUsuarioId" => $id
        ));
    }

    function delete($id)
    {
        $objConnection = new Connection();
        $objConnection->queryWithParams("
        DELETE FROM usuario WHERE usuario_id = :varUsuarioId
        ", array(
            ":varUsuarioId" => $id
        ));
    }
    function findUser($correo,$contra)
    {
        $objConnection = new Connection();
        $res = $objConnection->queryWithParams("
        SELECT * FROM usuario WHERE correo = :varCorreo AND contra = :varContra
        ", array(
            ":varCorreo" => $correo,
            ":varContra" => $contra
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $objUsuario = $this->rowToDto($row);
        return $objUsuario;
    }
    function selectAll()
    {
        $listaUsuarios = array();
        $objConnection = new Connection();
        $res = $objConnection->query("
            SELECT *
            FROM usuarios
        ");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $usuario = $this->rowToDto($row);
            $listaUsuarios[] = $usuario;
        }
        return $listaUsuarios;
    }

    function selectById($id)
    {
        $objConnection = new Connection();
        $res = $objConnection->queryWithParams("
            SELECT *
            FROM usuario
            WHERE usuario_id = :varUsuarioId
        ", array(
            ":varUsuarioId" => $id
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $objUsuario = $this->rowToDto($row);
        return $objUsuario;
    }

    private function rowToDto($row)
    {
        $objUsuario = new Usuario();

        $objUsuario->setUsuarioId($row["usuario_id"]);
        $objUsuario->setCorreo($row["correo"]);
        $objUsuario->setContra($row["contra"]);
        return $objUsuario;
    }
}