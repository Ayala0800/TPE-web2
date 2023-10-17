<?php
class EstiloView{
    private $smarty;
    private $authHelper;


    function __construct(){
        $this->authHelper = new AuthHelper();
    }


    //RENDERIZA PAGINA DE LISTA DE CATEGORIAS
    function renderEstilos($estilos){
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/listaEstilos.phtml');
    }

    //RENDERIZA PAGINA DE LISTA DE CATEGORIAS PARA ADMINISTRADORES
    function renderEditEstilo($estilo){
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/editarEstilo.phtml');
    }

    function renderEstilo($estilo){
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/estilos.phtml');
    }
}
