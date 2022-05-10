<?php
include 'configServer.php';


class conexion
{


    protected $conexion_db;

    public function __construct()
    {
        $this->conexion_db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if ($this->conexion_db->connect_error){
            echo "fallo al conectar";
            return;
        }
        $this->conexion_db->set_charset(DB_CHARSET);

    }




}