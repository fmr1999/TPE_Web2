<?php

require_once 'models.php';

class itemsModel extends Model{

    private function connect() {
        $db = new PDO('mysql:host=localhost;' . 'dbname=db_tpe2;charset=utf8', 'root', '');
        return $db;
    }


    function getAllJoyerias() {
        $query = $this->db->prepare('SELECT * FROM joyerias');
        $query->execute();

        $joyerias = $query->fetchAll(PDO::FETCH_OBJ);
        return $joyerias;
    }

    function getJoyeria($id) {
        //Esta funcion trae solo 1 fila de la tabla joyerias

        $query = $this->db->prepare('SELECT * FROM joyerias WHERE id = ?');
        $query->execute([$id]);

        $joyeria = $query->fetch(PDO::FETCH_OBJ);
        return $joyeria;
    }


    function insertJoyeria($marca, $precio, $bañado, $accesorio) {

        $query = $this->db->prepare('INSERT INTO joyerias (marca, precio, bañado, id_joya) VALUES (?,?,?,?)');
        $query->execute([$marca, $precio, $bañado, $accesorio]);

        return $this->db->lastInsertId();
    }


    function eliminarJoyeria($id) {
        $query = $this->db->prepare('DELETE FROM joyerias WHERE id = ?');
        $query->execute([$id]);
    }


    function editarJoyeria($marca, $precio, $bañado, $accesorio, $id) {
        $query = $this->db->prepare('UPDATE joyerias SET marca=?, precio=?, bañado=?, id_joya=? WHERE id=?');
        $query->execute([$marca, $precio, $bañado, $accesorio, $id]);
    }


    //trae todas la columnas de id_joya
    function getAllCategorias(){
        $query = $this->db->prepare('SELECT id_joya FROM tipo_joya');
        $query->execute();

        $joyerias = $query->fetchAll(PDO::FETCH_OBJ);
        return $joyerias;
    }



    function getAccesoriosByCategoria($filtro) {
        $query = $this->db->prepare('SELECT * FROM joyerias WHERE id_joya = ?');
        $query->execute([$filtro]);

        $accesorios = $query->fetchAll(PDO::FETCH_OBJ);
        return $accesorios;
    }


}