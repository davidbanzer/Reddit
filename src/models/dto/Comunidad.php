<?php


namespace App\models\dto;


class Comunidad
{
    private $comunidad_id;
    private $nombre;
    private $usuario_id;

    /**
     * @return mixed
     */
    public function getComunidadId()
    {
        return $this->comunidad_id;
    }

    /**
     * @param mixed $comunidad_id
     */
    public function setComunidadId($comunidad_id)
    {
        $this->comunidad_id = $comunidad_id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }


}