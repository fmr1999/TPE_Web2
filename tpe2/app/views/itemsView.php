<?php

class itemsView{
    
    
    function showHome($joyerias,$accesorios) {
        require_once './templates/header.phtml';
        require_once './templates/home.phtml';
        require_once './templates/footer.phtml';
    }


    function showError($error){
        require_once './templates/header.phtml';
        require_once './templates/error.phtml';
        require_once './templates/footer.phtml';
    }


    function showEditForm($id, $fila, $accesorios) {
        require_once './templates/header.phtml';
        require_once './templates/formedit.phtml';
        require_once './templates/footer.phtml';

    }
    
    
    function showEspecifico($id, $fila) {
        require_once './templates/header.phtml';
        require_once './templates/filaAccesorios.phtml';
        require_once './templates/footer.phtml';

    }



    function showItemsByFiltro($accesorios) {
        require_once './templates/header.phtml';
        require_once './templates/filtroPorAccesorios.phtml';
        require_once './templates/footer.phtml';
    }


}