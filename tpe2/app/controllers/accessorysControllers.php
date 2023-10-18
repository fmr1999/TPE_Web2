<?php

require_once './app/models/accessorysModel.php';
require_once './app/views/accessorysView.php';
require_once './app/helpers/auth.helper.php';

class accessorysController{

    //atributos
    private $view;
    private $model;

    //contructor 
    function __construct() {
        AuthHelper::init();
        $this->view = new accessorysView();
        $this->model = new accessorysModel();
    }


    function showAccessorys() {
        // obtiene los accesorios
        $accesorios = $this->model->getAllAccesorios(); 

        // se los mando a la vista para que los imprima
        $this->view->showAccesorios($accesorios); 
    }

    function agregarAccesorio() {
        AuthHelper::verify();

        $accesorioNuevo = $_POST['accesorio'];
        
        if (empty($accesorioNuevo)) {
            $this->view->showError('Falta rellenar campo');
            return;
        }


        if($this->existeAcc($accesorioNuevo)) {
            $this->view->showError('Ya existe esta categoria');
            return;
        }

        $id = $this->model->insertAccesorio($accesorioNuevo);

        if ($id) {
            header('Location: ' . BASE_URL . "/accesorios");
        } else {
            $this->view->showError("Error al insertar en la DB");
        }
    }

    function existeAcc($accesorioNuevo) {
        $accesorios = $this->model->getAllAccesorios();
        foreach ($accesorios as $acc) {
            if ($acc->id_joya == $accesorioNuevo) {
                return true;
            }
        }
        return false;
    }


    function eliminarAccesorio($id) {
        AuthHelper::verify();
    
        try {        
            $this->model->eliminarAccesorio($id);
            header('Location: ' . BASE_URL . "accesorios");
        } catch (PDOException) {
            $this->view->showError('Ha ocurrido un error al eliminar la categoria');
        }
    }

    function showEditFormAccesorio($id) {
        AuthHelper::verify();
        
        $accesorio = $this->model->getCategoryById($id);

        $this->view->showEditForm($accesorio);
    }

    function editarAccesorio($id) {
        AuthHelper::verify();
        
        $accesorio = $_POST['accesorio'];

        if (empty($accesorio)) {
            $this->view->showError("Faltan completar campos");
            return;   
        }

        $this->model->editAccesorio($id, $accesorio);
        header('Location: ' . BASE_URL . "/accesorios");
        
    }


}