<?php

require "conexion.php";


class consultaSelect extends conexion
{


    public function __construct()
    {
        parent::__construct();
    }


    public function get_files()
    {
        $result = $this->conexion_db->query('SELECT * FROM File');
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function get_files_insert(String $nombre = null)
    {
        $conn =  $this->conexion_db->query("INSERT INTO `File`(`nombre`, `file`, `size`) VALUES ('$nombre', 'hola', 1 )");
        return $conn;
    }


}