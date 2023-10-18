<?php
class accessorysView{


    function showAccesorios($accesorios) {
        require_once './templates/header.phtml';
        require_once './templates/homeAccessory.phtml';
        require_once './templates/footer.phtml';
    }


    function showError($error){
        require_once './templates/header.phtml';
        require_once './templates/error.phtml';
        require_once './templates/footer.phtml';
    }


    function showEditForm($accesorio) {
        require_once './templates/header.phtml';
        require_once './templates/formEditAccesorio.phtml';
        require_once './templates/footer.phtml';

    }


}