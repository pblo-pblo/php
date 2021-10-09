<?php

require '../utils/autoloader.php';

class UsuarioController
{
    public static function MostrarMenuPrincipal()
    {
        session_start();
        if (!isset($_SESSION['autenticado'])) header("Location: /login");
        else return cargarVista("listadoSouvenir");
    }
}
