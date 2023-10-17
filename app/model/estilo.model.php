<?php
require_once 'config.php';
class EstiloModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host='. MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8', MYSQL_USER, MYSQL_PASS);

    }

    function getEstilos(){
        $sentence = $this->db->prepare("SELECT * FROM estilos");
        $sentence->execute();
        $estilos = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $estilos;
    }

    function getEstilo($id_estilo){
        $sentence = $this->db->prepare( "SELECT * FROM estilos WHERE id_estilo=?");
        $sentence->execute(array($id_estilo));
        $estilo = $sentence->fetch(PDO::FETCH_OBJ);
        return $estilo;
    }

    function addEstilo($nombre){
        $sentence = $this->db->prepare("INSERT INTO estilos(nombre) VALUES (?)");
        $sentence->execute(array($nombre));
    }

    function updateEstiloToDB($nombre, $id){
        $sentence = $this->db->prepare("UPDATE estilos SET nombre = ? WHERE id_estilo = ?");
        $sentence->execute([$nombre, $id]);
    }

    function deleteEstilo($id_estilo){
        $sentence = $this->db->prepare("DELETE FROM estilos WHERE id_estilo = ?");
        $sentence->execute([$id_estilo]);
    }

}
