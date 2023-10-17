<?php
require_once './app/model/beer.model.php';
require_once './app/view/beer.view.php';

class BeerController {
  
    private $model;
    private $view;
    private $authHelper;

    public function __construct(){
        $this->model = new BeerModel();
        $this->view = new BeerView();
        $this->authHelper = new AuthHelper();
    }

    function showCervezas($estilos){
        $cervezas = $this->model->getCervezas();
        $this->view->renderCervezas($cervezas, $estilos);
    }

    function showCervezaPorEstilo($id_estilo, $estilos){
        $cervezas = $this->model->getCervezasEstilo($id_estilo);
        $this->view->renderCervezas($cervezas, $estilos);
    }

    function showCerveza($id_cerveza){
        $cerveza = $this->model->getCerveza($id_cerveza);
        $this->view->renderCerveza($cerveza);
    }

    function showEditCerveza($id_cerveza, $estilos){
        $this->authHelper->checkAdmin();
        $cerveza = $this->model->getCerveza($id_cerveza);
        $this->view->renderEditCerveza($cerveza, $estilos);
    }

    function addCerveza(){
        $this->authHelper->checkAdmin();
        if(isset($_POST['nombre']) && isset($_POST['IBU']) && isset($_POST['ALC']) && isset($_POST['id_estilo']) && isset($_POST['stock']) && isset($_POST['descripcion'])){
            if(!empty($_POST['nombre']) && !empty($_POST['IBU']) && !empty($_POST['ALC']) && !empty($_POST['id_estilo']) && !empty($_POST['stock']) && !empty($_POST['descripcion'])){

                $nombre = $_POST['nombre'];
                $ibu = $_POST['IBU'];
                $alc = $_POST['ALC'];
                $id_estilo = $_POST['id_estilo'];
                $stock = $_POST['stock'];
                $descripcion = $_POST['descripcion'];

                $this->model->addCervezaToDB($nombre, $ibu, $alc, $id_estilo, $stock, $descripcion);
                header("Location: ".BASE_URL."home");
            }
        }
    }

    function deleteCerveza($id_cerveza){
        $this->authHelper->checkAdmin();
        $this->model->deleteCervezaFromDB($id_cerveza);
        header("Location: ".BASE_URL."home");
    }

    function updateCerveza($id_cerveza){
        $this->authHelper->checkAdmin();

        if(isset($_POST['nombre']) && isset($_POST['IBU']) && isset($_POST['ALC']) && isset($_POST['id_estilo']) && isset($_POST['stock']) && isset($_POST['descripcion'])){
            if(!empty($_POST['nombre']) && !empty($_POST['IBU']) && !empty($_POST['ALC']) && !empty($_POST['id_estilo']) && !empty($_POST['stock']) && !empty($_POST['descripcion'])){

                $nombre = $_POST['nombre'];
                $ibu = $_POST['IBU'];
                $alc = $_POST['ALC'];
                $id_estilo = $_POST['id_estilo'];
                $stock = $_POST['stock'];
                $descripcion = $_POST['descripcion'];
                $id_cerveza = $_POST['id'];

                $this->model->updateCerveza($nombre, $ibu, $alc, $id_estilo, $stock, $descripcion, $id_cerveza);
                header("Location: ".BASE_URL."home");
            }
        }
    }

}
