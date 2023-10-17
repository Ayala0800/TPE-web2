<?php
require_once "./app/controller/beer.controller.php";
require_once "./app/controller/estilo.controller.php";
require_once "./app/controller/usuario.controller.php";


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if(!empty($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'home';

$params = explode('/', $action);
$userController = new UserController();
$cervezaController = new BeerController();
$estiloController = new EstiloController();

switch ($params[0]) {
    case 'home':
        $estilos = $estiloController->getEstilos();
        $cervezaController->showCervezas($estilos);
        break;

    case 'logIn':
        $userController->showLogIn();
        break;

    case 'startSession':
        $userController->startSession();
        break;

    case 'logOut':
        $userController->logOut();
        break;

    case 'modifyUserRol':
        $userController->modifyUserRol($params[1]);
        break;

    //REDIRIGE A LA PAGINA DE REGISTRO DE USUARIO
    case 'register':
        $userController->showRegister();
    break;

    //AGREGA USUARIO A LA BD
    case 'addUser':
        $userController->addUser();
    break;

    case 'notAdmin':
        $userController->showError("Se necesitan privilegios de administrador");
    break;

    case 'notAdmin':
        $mensaje = "Se necesitan privilegios de administrador";
        $userController->showError($mensaje);
    break;

    case 'estilos':
        $estiloController->showEstilos();
        break;

    case 'estilo':
        $estilos = $estiloController->getEstilos();
        $cervezaController->showCervezaPorEstilo($params[1], $estilos);
        break;

    //AGREGA EL ESTILO A LA BD
    case 'addEstilo':
        $estiloController->addEstilo();
    break;

    //ELIMINA EL ESTILO DE LA BD
    case 'deleteEstilo':
        $estiloController->deleteEstilo($params[1]);
    break;

    //REDIRIGE AL PHTML PARA EDITAR LA CATEGORIA SELECCIONADO
    case 'editEstilo':
        $estiloController->showEditEstilo($params[1]);
    break;

    //ACTUALIZA LOS CAMPOS DE LA CATEGORIA EN LA BD
    case 'updateEstilo':
        $estiloController->updateEstilo($params[1]);
    break;

    case 'cervezas':
        $estilos = $estiloController->getEstilos();
        $cervezaController->showCervezas($estilos);
        break;

    case 'cerveza':
        $cervezaController->showCerveza($params[1]);
        break;

    //AGREGA EL PRODUCTO A LA BD
    case 'addCerveza':
        $cervezaController->addCerveza();
    break;

    //ELIMINA EL PRODUCTO DE LA BD
    case 'deleteCerveza':
        $cervezaController->deleteCerveza($params[1]);
    break;

    //REDIRIGE A LA VISTA PARA EDITAR EL PRODUCTO SELECCIONADO
    case 'editCerveza':
        $estilos = $estiloController->getEstilos();
        $cervezaController->showEditCerveza($params[1], $estilos);
    break;

    //EDITA LOS CAMPOS DEL PRODUCTO EN LA DB
    case 'updateCerveza':
            $cervezaController->updateCerveza($params[1]);
            
    break;

    //PAGINA USUARIOS
    case 'users':
        $userController->showUsers();
    break;

    //ELIMINAR USUARIO EN LA DB
    case 'deleteUser':
        $userController->deleteUser($params[1]);
    break;
    default:
        echo "404 page not found";
    break;
}