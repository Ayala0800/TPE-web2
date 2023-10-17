<?php

class BeerView{
    private $smarty;
    private $authHelper;


    function __construct(){
        $this->authHelper = new AuthHelper();
    }

    //RENDERIZA PAGINA DE LISTA DE PRODUCTOS
    function renderCervezas($cervezas, $estilos = null){
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/listaCervezas.phtml');
    }

    //RENDERIZA PAGINA DE DETALLES DE PRODUCTOS
    function renderCerveza($cerveza){
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/cervezas.phtml');
    }

    function renderEditCerveza($cerveza, $estilos){
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/editarCerveza.phtml');
    }
}