<?php

require '../utils/autoloader.php';


class AuthController
{
    public static function cerrarSesion()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /login");
    }
    public static function MostrarLogin()
    {
        session_start();
        if (isset($_SESSION['autenticado'])) header("Location: /principal");
        else return cargarVista("login");
    }



    public static function IniciarSesion($ci, $password, $autenticar = true)
    {
        try {
            $u = new UsuarioModelo();
            $u->ci = $ci;
            $u->password = $password;
            if ($autenticar) {
                $u->Autenticar();
            }
            self::crearSesion($u);
            header("Location: /principal");
        } catch (Exception $e) {
            error_log("Fallo login del usuario " . $ci);
            generarHtml("login", ['exito' => false]);
        }
    }
    private static function crearSesion($usuario)
    {
        session_start();
        ob_start();
        $_SESSION['ci'] = $usuario->ci;
        $_SESSION['TipoUsuario'] =$usuario->idRol;
        $_SESSION['NombreCompleto'] = $usuario->nombre ." ". $usuario->apellido;
        $_SESSION['autenticado'] = true;
        $_SESSION['avatar'] = $usuario->avatar;
        $_SESSION['grupo'] = $usuario->idGrupo;
        $_SESSION['nickName'] = $usuario->nickName;
    }
}
