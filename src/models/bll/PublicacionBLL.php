<?php


namespace App\models\bll;
use PDO;
use App\models\dto\Publicacion;
use App\models\dal\Connection;

class PublicacionBLL
{
    function insert($titulo, $descripcion, $cantidad_de_votos, $comunidad_id, $usuario_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams(
            "INSERT INTO publicacion (titulo, descripcion, cantidad_de_votos, comunidad_id, usuario_id)
                 VALUES (:varTitulo, :varDescripcion, :varCantidadDeVotos, :varComunidadId, :varUsuarioId)",
            array(
                ":varTitulo" => $titulo,
                ":varDescripcion" => $descripcion,
                ":varCantidadDeVotos" => $cantidad_de_votos,
                ":varComunidadId" => $comunidad_id,
                ":varUsuarioId" => $usuario_id
            )
        );
        return $objConecction->getLastInsertedId();
    }

    function update($titulo, $descripcion, $cantidad_de_votos, $comunidad_id, $usuario_id, $id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        UPDATE publicacion
        SET titulo = :varTitulo,
            descripcion = :varDescripcion,
            cantidad_de_votos = :varCantidadDeVotos,
            comunidad_id = :varComunidadId,
            usuario_id = :varUsuarioId
        WHERE publicacion_id = :varPublicacionId
        ", array(
            ":varTitulo" => $titulo,
            ":varDescripcion" => $descripcion,
            ":varCantidadDeVotos" => $cantidad_de_votos,
            ":varComunidadId" => $comunidad_id,
            ":varUsuarioId" => $usuario_id,
            ":varPublicacionId" => $id
        ));
    }

    function delete($publicacion_id)
    {
        $objConecction = new Connection();
        $objConecction->queryWithParams("
        DELETE FROM publicacion WHERE publicacion_id = :varPublicacionId
        ", array(
            ":varPublicacionId" => $publicacion_id
        ));
    }
    function selectAll()
    {
        $listaPublicaciones = array();
        $objConnection = new Connection();
        $res = $objConnection->query("
            SELECT *
            FROM publicacion
        ");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $publicacion = $this->rowToDto($row);
            $listaPublicaciones[] = $publicacion;
        }
        return $listaPublicaciones;
    }

    function selectById($publicacion_id)
    {
        $objConnection = new Connection();
        $res = $objConnection->queryWithParams("
            SELECT *
            FROM publicacion
            WHERE publicacion_id = :varPublicacionId
        ", array(
            ":varPublicacionId" => $publicacion_id
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $objPublicacion = $this->rowToDto($row);
        return $objPublicacion;
    }

    private function rowToDto($row)
    {
        $objPublicacion = new Publicacion();

        $objPublicacion->setPublicacionId($row["publicacion_id"]);
        $objPublicacion->setTitulo($row["titulo"]);
        $objPublicacion->setDescripcion($row["descripcion"]);
        $objPublicacion->setCantidadDeVotos($row["cantidad_de_votos"]);
        $objPublicacion->setComunidadId($row["comunidad_id"]);
        $objPublicacion->setUsuarioId($row["usuario_id"]);
        return $objPublicacion;
    }
}