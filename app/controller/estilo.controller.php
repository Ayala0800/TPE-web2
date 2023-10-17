<?php
require_once "./app/model/estilo.model.php";
require_once "./app/view/estilo.view.php";
require_once "helpers/auth.helper.php";

class EstiloController{
    private $model;
    private $view;
    private $authHelper;

    public function __construct(){
        $this->model = new EstiloModel();
        $this->view = new EstiloView();
        $this->authHelper = new AuthHelper();
    }

    function showEstilos(){
        $estilos = $this->model->getEstilos();
        $this->view->renderEstilos($estilos);
    }

    function showEstilo($id){
        $estilo = $this->model->getEstilo($id);
        $this->view->renderEstilo($estilo);
    }

    function showEditEstilo($id){
        $this->authHelper->checkAdmin();
        $estilo = $this->model->getEstilo($id);
        $this->view->renderEditEstilo($estilo);
    }

    function getEstilos(){
        $estilos = $this->model->getEstilos();
        return $estilos;
    }

    function getEstilo($id_estilo){
        $estilo = $this->model->getEstilo($id_estilo);
        return $estilo;
    }

    function addEstilo(){
        $this->authHelper->checkAdmin();
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $this->model->addEstilo($_POST['nombre']);
            header("Location: ".BASE_URL."estilos");
        }
    }

    function updateEstilo($id_estilo){
        $this->authHelper->checkAdmin();
        if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['id']) && !empty($_POST['id'])){

            $nombre = $_POST['nombre'];
            $id = $_POST['id'];
            $this->model->updateEstiloToDB($nombre, $id);
            header("Location: ".BASE_URL."estilos");
        }
    }

    function deleteEstilo($id_estilo){
        $this->authHelper->checkAdmin();
        $this->model->deleteEstilo($id_estilo);
        header("Location: ".BASE_URL."estilos");
    }
}