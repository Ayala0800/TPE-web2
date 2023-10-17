<?php
require_once 'config.php';
class BeerModel{

    private $db;
    
    function __construct()
    {
        $this->db = new PDO('mysql:host='. MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8', MYSQL_USER, MYSQL_PASS);

    }

    //DEVUELVE TODOS LOS cervezaS AGREGANDO LA COLUMNA DEL NOMBRE DE LA CATEGORIA A LA QUE PERTENECE
    function getCervezas(){
        $sentence = $this->db->prepare(
            "SELECT cervezas.*, estilos.nombre AS estilo
            FROM cervezas
            JOIN estilos ON cervezas.id_estilo = estilos.id_estilo");
        $sentence->execute();
        $cervezas = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $cervezas;
    }

   
    //DEVUELVE EL PORDUCTO CON EL ID PASADO POR PARAMETRO
    function getCerveza($id_cerveza){
        $sentence = $this->db->prepare(
            "SELECT cervezas.*, estilos.nombre AS estilo
            FROM cervezas
            JOIN estilos ON cervezas.id_estilo = estilos.id_estilo
            WHERE id_cerveza=?");
        $sentence->execute(array($id_cerveza));
        $cerveza = $sentence->fetch(PDO::FETCH_OBJ);
        return $cerveza;
    }

    //DEVUELVE LOS cervezaS PERTENECIENTES A LA CATEGORIA PASADA POR PARAMETRO
    function getCervezasEstilo($id_estilo){
        $sentence = $this->db->prepare(
            "SELECT cervezas.*, estilos.nombre AS estilo
            FROM cervezas
            JOIN estilos ON cervezas.id_estilo = estilos.id_estilo
            WHERE estilos.id_estilo=?");
        $sentence->execute(array($id_estilo));
        $cervezas = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $cervezas;
    }

    //AÑADE UNA CERVEZA A LA DB
    function addCervezaToDB($nombre, $ibu, $alc, $id_estilo, $stock, $descripcion){
        $sentence = $this->db->prepare("INSERT INTO cervezas(nombre, IBU, ALC, id_estilo, stock, descripcion) VALUES(?,?,?,?,?,?)");
        $sentence->execute([$nombre, $ibu, $alc, $id_estilo, $stock, $descripcion]);
        return $this->db-> lastInsertId();
    }

    //ACTUALIZA LOS DATOS DE UNA CERVEZA
    function updateCerveza($nombre, $ibu, $alc, $id_estilo, $stock, $descripcion, $id_cerveza){
        $query = $this->db->prepare("UPDATE cervezas SET nombre = ?, IBU = ?, ALC = ?, id_estilo = ?, stock = ?, descripcion = ? WHERE id_cerveza= ? ");
        $query->execute([$nombre, $ibu, $alc, $id_estilo, $stock, $descripcion, $id_cerveza]);
    }

    //ELIMINA una cerveza segun id
    function deleteCervezaFromDB($id_cerveza){
        $sentence = $this->db->prepare("DELETE FROM `cervezas` WHERE id_cerveza=?");
        $sentence->execute([$id_cerveza]);
    }
}