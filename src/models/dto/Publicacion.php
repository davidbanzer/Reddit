<?php

namespace App\models\dto;

use App\models\bll\ComunidadBLL;
use App\models\bll\UsuarioBLL;

class Publicacion
{
    private $publicacion_id;
    private $titulo;
    private $descripcion;
    private $cantidad_de_votos;
    private $comunidad_id;
    private $usuario_id;

    /**
     * @return mixed
     */
    public function getPublicacionId()
    {
        return $this->publicacion_id;
    }

    /**
     * @param mixed $publicacion_id
     */
    public function setPublicacionId($publicacion_id)
    {
        $this->publicacion_id = $publicacion_id;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getCantidadDeVotos()
    {
        return $this->cantidad_de_votos;
    }

    /**
     * @param mixed $cantidad_de_votos
     */
    public function setCantidadDeVotos($cantidad_de_votos)
    {
        $this->cantidad_de_votos = $cantidad_de_votos;
    }

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
    public function getUsuarioForDisplay()
    {
        $usuarioBLL = new UsuarioBLL();
        $objUsuario = $usuarioBLL->selectById($this->getUsuarioId());
        if ($objUsuario == null) {
            return "No definido";
        }
        return $objUsuario->getCorreo();
    }
    public function getComunidadForDisplay()
    {
        $comunidadBLL = new ComunidadBLL();
        $objComunidad = $comunidadBLL->selectById($this->getUsuarioId());
        if ($objComunidad == null) {
            return "No definido";
        }
        return $objComunidad->getNombre();
    }

}