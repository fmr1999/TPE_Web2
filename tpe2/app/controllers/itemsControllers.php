<?php

require_once './app/models/itemsModel.php';
require_once './app/views/itemsView.php';
require_once './app/models/accessorysModel.php';

class ItemsController{

    //atributos
    private $view;
    private $model;

    //contructor 
    function __construct() {
        AuthHelper::init();
        $this->view = new itemsView();
        $this->model = new itemsModel();
    }


    function showHome() {
        // obtiene los perifericos
        $joyerias = $this->model->getAllJoyerias(); 

        $accesorios = new accessorysModel();
        // obtengo las categorias
        $accesorios = $accesorios->getAllAccesorios(); 

        // se los mando a la vista para que los imprima
        $this->view->showHome($joyerias,$accesorios); 
    }

    function agregarJoyeria(){
        AuthHelper::verify();
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $bañado = $_POST['bañado'];
        $accesorio = $_POST['accesorio'];

        
        if (empty($marca) || empty($precio) || empty($bañado) || empty($accesorio)) {
            $this->view->showError("Faltan completar campos");
            return;
        } 
        
        $id = $this->model->insertJoyeria($marca, $precio, $bañado, $accesorio);

    
        if ($id) {
           header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar en la DB");
        }
    }

    function eliminarJoyeria($id){
        AuthHelper::verify();
        $this->model->eliminarJoyeria($id);
        header('Location: ' . BASE_URL);
    }

    

    function showEditForm($id) {
        $fila = $this->model->getJoyeria($id);

        $accesorios = new accessorysModel();
        // obtengo las categorias
        $accesorios = $accesorios->getAllAccesorios(); 

        $this->view->showEditForm($id, $fila ,$accesorios);
    }


    function editarJoyeria($id) {
        AuthHelper::verify();
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $bañado = $_POST['bañado'];
        $accesorio = $_POST['accesorio'];


    
        if (empty($marca) || empty($precio) || empty($bañado) || empty($accesorio)) {
            $this->view->showError("Faltan completar campos");
            return;
        } 

        $this->model->editarJoyeria($marca, $precio, $bañado, $accesorio, $id);
        header("Location: " . BASE_URL); 
    }


    function showItemsByFiltro() {
        $filtro = $_POST['accesorio'];
        if (isset($filtro)) {
            $accesorios = $this->model->getAccesoriosByCategoria($filtro);
            if (empty($accesorios)) {
                $this->view->showError('No existe items de dicho accesorio');
            } else {
                $this->view->showItemsByFiltro($accesorios);
            }
        }
    }



}

