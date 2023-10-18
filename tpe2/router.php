<?php

require_once './app/controllers/itemsControllers.php';
require_once './app/controllers/authControllers.php';
require_once './app/controllers/accessorysControllers.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {
    case 'home':
        $itemsController = new ItemsController();
        $itemsController->showHome();
        break;

    //ItemsController     
    case 'agregarJoyeria':
        $itemsController = new ItemsController();
        $itemsController->agregarJoyeria();
        break;
    case 'eliminarJoyeria':
        $itemsController = new ItemsController();
        $itemsController->eliminarJoyeria($params[1]);
        break;
    case 'buttonEdit':
        $itemsController = new ItemsController();
        $itemsController->showEditForm($params[1]);
        break;
    case 'editarJoyeria':
        $itemsController = new ItemsController();
        $itemsController->editarJoyeria($params[1]);
        break;
    case 'showEspecifico':
        $itemsController = new ItemsController();
        $itemsController->showEditForm($params[1]);
        break;
    case 'filtrarItemsAccesorio':
        $itemsController = new ItemsController();
        $itemsController->showItemsByFiltro();
        break;

    //accessorysController
    case 'accesorios':
        $accesoriosController = new accessorysController();
        $accesoriosController ->showAccessorys();
        break;
    case 'agregarAccesorios':
        $accesoriosController = new accessorysController();
        $accesoriosController->agregarAccesorio();
        break;
    case 'eliminarAccesorios':
        $accesoriosController = new accessorysController();
        $accesoriosController->eliminarAccesorio($params[1]);
        break;
    case 'buttonEditAccesorio':
        $accesoriosController = new accessorysController();
        $accesoriosController->showEditFormAccesorio($params[1]);
        break;
    case 'editarAccesorio':
        $accesoriosController = new accessorysController();
        $accesoriosController->editarAccesorio($params[1]);
        break;
    //cosas del usuario...    
    case 'login':
        $authController = new authController();
        $authController->showLogin();
        break;
    case 'auth':
        $authController = new authController();
        $authController->auth();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();    


    default:
        echo ('404 Page not found');
        break;
}