<?php
require '../utils/autoloader.php';
$request = $_SERVER['REQUEST_URI'];
$params = basename($_SERVER['REQUEST_URI']);;

session_start();
function esContenidoEstatico($url)
{
    $extensiones = [
        ".css",
        ".png",
        ".jpg",
        ".jpeg",
        ".pdf",
        ".js"
    ];
    foreach ($extensiones as $extension) {
        if (strpos($url, $extension) !== false)
            return true;
    }
    return false;
}
function NecesitaAutenticacion() {
    if (AuthController::SeInicioSesion()) {
        return;
    } else {
        header('Location: /login');
    }
}
function cargarContenidoEstatico($archivo)
{

    $extensiones = [
        ".css" => "text/css",
        ".png" => "image/png",
        ".jpg" => "image/jpg",
        ".jpeg" => "image/jpeg",
        ".pdf" => "document/pdf",
        ".js" => "text/js"
    ];
    foreach ($extensiones as $extension => $contenido) {
        if (strpos($archivo, $extension) !== false)
            $contentType = $contenido;
    }
    $contenidoDelArchivo = [
        "contenido" => file_get_contents("../vistas/assets" . $archivo),
        "contentType" => $contentType
    ];
    return $contenidoDelArchivo;
}

if (esContenidoEstatico($request)) {
    $contenido = cargarContenidoEstatico($request);
    header("Content-Type: " . $contenido['contentType']);
    echo $contenido['contenido'];
} else {
    switch (strtok($request, '?')) {
        case '/':
        case '':
            NecesitaAutenticacion();
            SouvenirController::ListarSouvenir(['exito'=>true]);
            break;

        case '/lista-souvenirs':
            NecesitaAutenticacion();
            SouvenirController::ListarSouvenir(['exito'=>true]);
            break;
        case '/edit-souvenirs':
            NecesitaAutenticacion();
            if ($_SERVER['REQUEST_METHOD'] === 'GET')
                SouvenirController::ObtenerSouvenir($_GET['id']);
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
                SouvenirController::UpdateSouvenir(
                    $_POST['id'],
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['stock'],
                    $_POST['precio'],
                );
            break;
        case '/delete-souvenirs':
            NecesitaAutenticacion();
            SouvenirController::DeleteSovenir($_GET['id']);
            break;
        case '/insert-souvenirs':
            NecesitaAutenticacion();
            if ($_SERVER['REQUEST_METHOD'] === 'GET')
                return generarHtml('altaSouvenir', []);
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
                SouvenirController::InsertSouvenir(
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['stock'],
                    $_POST['precio']
                );
            break;
        case '/compra':
            NecesitaAutenticacion();
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                SouvenirController::ObtenerSouvenirParaComprar($_GET['id']);
                break;
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
                SouvenirController::Comprar(
                    $_POST['id'],
                    $_POST['cantidadcomprar'],
                    $_POST['stock'],
                );
            break;
        case '/login':
            if ($_SERVER['REQUEST_METHOD'] === 'GET') AuthController::MostrarLogin();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') AuthController::IniciarSesion($_POST['ci'], $_POST['password']);
            break;

        case '/logout':
            AuthController::cerrarSesion();
            break;

        default:
    }
}
