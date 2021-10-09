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
            return require "../vistas/home.php";
            break;
        case '/alta-alumno':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') UsuarioController::AltaAlumno(
                $_POST['id'],
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['password'],
                $_POST['grupo']
            );
            if ($_SERVER['REQUEST_METHOD'] === 'GET') UsuarioController::ObtenerGrupos(constant_Alumno_Title);
            break;

        case '/alta-docente':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') UsuarioController::AltaDocente(
                $_POST['ci'],
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['password'],
                $_POST['grupo'],
                $_POST['materia'],
                $_POST['avatar']
            );
            if ($_SERVER['REQUEST_METHOD'] === 'GET') UsuarioController::ObtenerGrupos(constant_Docente_Title);
            break;

        case '/modificar-usuario':
            if ($_SERVER['REQUEST_METHOD'] === 'GET') UsuarioController::ObtenerUsuarioByCedula($_SESSION['ci']);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') UsuarioController::ModificarUsuario(
                $_POST['nickname'],
                $_POST['foto'],
                $_POST['avatar'],
            );
            break;

        case '/lista-usuarios':
            UsuarioController::ObtenerUsuarios();
            break;


        case '/lista-souvenirs':
            SouvenirController::ListarSouvenir();
        case '/edit-souvenirs':
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
            SouvenirController::DeleteSovenir($_GET['id']);
        case '/insert-souvenirs':
            if ($_SERVER['REQUEST_METHOD'] === 'GET')
                return generarHtml('altaAlumno', ['exito' => true]);
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
                SouvenirController::InsertSouvenir(
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['stock'],
                    $_POST['precio']
                );
        case '/compra':
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                SouvenirController::ObtenerSouvenirParaComprar($_GET['id']);
                return generarHtml('respuesta', ['exito' => true]);
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
                SouvenirController::Comprar(
                    $_POST['id'],
                    $_POST['cantidadcomprar'],
                    $_POST['stock'],
                );


        case '/principal':
            UsuarioController::MostrarMenuPrincipal();
            break;
        case '/consultar':
            ConsultasController::ObtenerFormularioConsultas();
            break;

        case '/generarConsulta':
            ConsultasController::GuardarConsulta($_POST['docente'], $_POST['asunto'], $_POST['message']);
            break;
        case '/listar-consultas-recibidas':
            ConsultasController::ObtenerMisConsultas();
            break;
        case '/listar-consultas-realizadas':
            ConsultasController::ObtenerMisConsultasRealizadas();
            break;
        case '/obtenerConsulta':
            ConsultasController::ObtenerConsulta($_GET['id']);
            break;
        case '/obtenerConsultaAlumno':
            ConsultasController::ObtenerConsultaAlumno($_GET['id']);
            break;
        case '/responderConsulta':
            ConsultasController::UpdateConsulta($_POST['id'], $_POST['respuesta']);
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
