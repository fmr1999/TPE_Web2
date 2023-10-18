<?php

require_once 'models.php';

class accessorysModel extends Model{
    
    private function connect() {
        $db = new PDO('mysql:host=localhost;' . 'dbname=db_tpe2;charset=utf8', 'root', '');
        return $db;
    }


    function getAllAccesorios() {
        $query = $this->db->prepare('SELECT * FROM tipo_joya');
        $query->execute();

        $accesorios = $query->fetchAll(PDO::FETCH_OBJ);
        return $accesorios;
    }


    function insertAccesorio($categoria) {
        $query = $this->db->prepare('INSERT INTO tipo_joya (id_joya) VALUES (?)');
        $query->execute([$categoria]);

        return $this->db->lastInsertId();
    }


    function eliminarAccesorio($tipo) {  
        $query = $this->db->prepare('DELETE FROM tipo_joya WHERE id_joya = ?');
        $query->execute([$tipo]);
    }


    function getCategoryById($id) {
        $query = $this->db->prepare('SELECT * FROM tipo_joya WHERE id = ?');
        $query->execute([$id]);

        $accesorio = $query->fetch(PDO::FETCH_OBJ);

        return $accesorio;
    }
    

    function editAccesorio($id, $accesorio) {
        $query = $this->db->prepare('UPDATE tipo_joya SET id_joya = ? WHERE id = ? ');
        $query->execute([$accesorio, $id]);
    }

}