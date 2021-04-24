<?php


namespace App\models\bll;
use PDO;
use App\models\dto\Comunidad;
use App\models\dal\Connection;

class ComunidadBLL
{
    function insert($nombre, $usuario_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams(
            "INSERT INTO comunidad (nombre,usuario_id)
                 VALUES (:varNombre,:varUsuarioId)",
            array(
                ":varNombre" => $nombre,
                ":varUsuarioId" => $usuario_id
            )
        );
        return $objConecction->getLastInsertedId();
    }

    function update($nombre,$usuario_id, $id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        UPDATE comunidad
        SET nombre = :varNombre,
            usuario_id = :varUsuarioId
        WHERE comunidad_id = :varComunidadId
        ", array(
            ":varNombre" => $nombre,
            ":varUsuarioId" => $usuario_id,
            ":varComunidadId" => $id
        ));
    }

    function delete($id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        DELETE FROM comunidad WHERE comunidad_id = :varComunidadId
        ", array(
            ":varComunidadId" => $id
        ));
    }

    function selectAll()
    {
        $listaComunidades = array();
        $objConnection = new Connection();
        $res = $objConnection->query("
            SELECT *
            FROM comunidad
        ");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $comunidad = $this->rowToDto($row);
            $listaComunidades[] = $comunidad;
        }
        return $listaComunidades;
    }

    function selectById($id)
    {
        $objConnection = new Connection();
        $res = $objConnection->queryWithParams("
            SELECT *
            FROM comunidad
            WHERE comunidad_id = :varComunidadId
        ", array(
            ":varComunidadId" => $id
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $objComunidad = $this->rowToDto($row);
        return $objComunidad;
    }

    private function rowToDto($row)
    {
        $objComunidad = new Comunidad();

        $objComunidad->setComunidadId($row["comunidad_id"]);
        $objComunidad->setNombre($row["nombre"]);
        $objComunidad->setUsuarioId($row["usuario_id"]);
        return $objComunidad;
    }
}