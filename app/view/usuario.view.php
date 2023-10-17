<?php
class UserView {
    private $authHelper;

    function __construct() {
        $this->authHelper = new AuthHelper();
    }

    function renderRegister() {
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/registrar.phtml');
    }

    function renderUsers($users) {
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/listaUsuarios.phtml');
    }

    function renderLogIn(){
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/login.phtml');
    }

    function renderHome(){
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/home.phtml');
    }

    function renderError($mensaje) {
        $userRol = $this->authHelper->getRol();
        $userEmail = $this->authHelper->getUserEmail();
        include('templates/error.phtml');
    }
}