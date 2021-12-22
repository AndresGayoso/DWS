<?php

class Comentarios
{
        private $id,$NomUser,$comentario;

    /**
     * @param $id
     * @param $NomUser
     * @param $comentario
     */
    public function __construct($id, $NomUser, $comentario)
    {
        $this->id = $id;
        $this->NomUser = $NomUser;
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNomUser()
    {
        return $this->NomUser;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }



}