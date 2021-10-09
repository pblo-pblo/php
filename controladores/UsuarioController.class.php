<?php

require '../utils/autoloader.php';

class UsuarioController
{


    public static function MostrarMenuPrincipal()
    {
        session_start();
        if (!isset($_SESSION['autenticado'])) header("Location: /login");
        else return cargarVista("home");
    }

    public static function ObtenerUsuarioByCedula($ci)
    {
        // $p = new UsuarioModelo();
        // $p->ObtenerUsuarioByCedula($ci);
        // return generarHtml('modificarUsuario', ['usuario' => $p]);
    }

    // public static function ModificarUsuario($nickname, $foto, $avatar)
    // {
    //     try {
    //         $usuario = new UsuarioModelo();
    //         $usuario->ci = $_SESSION['ci'];
    //         $usuario->nickName = $nickname;
    //         $usuario->avatar = $avatar;
    //         $usuario->Update();
    //         $_SESSION['avatar']=$avatar;
    //         return generarHtml('modificarUsuario', ['exito' => true, 'usuario' => $usuario]);
    //     } catch (Exception $ex) {

    //         return generarHtml('modificarUsuario', ['exito' => false]);
    //     }
    //     return generarHtml('modificarUsuario', ['exito' => false]);
    // }

    // public static function ObtenerUsuarios()
    // {
    //     $p = new UsuarioModelo();
    //     $personas = array();
    //     foreach ($p->obtenerTodos() as $fila) {
    //         $persona = array(
    //             "id" => $fila->id,
    //             "nombre" => $fila->nombre,
    //             "apellido" => $fila->apellido,
    //             // "edad" => $fila -> 18,
    //             // "email" => $fila -> pablo.ferrari'
    //         );
    //         array_push($personas, $persona);
    //     }
    //     return generarHtml('listar', ['personas' => $personas]);
    // }
    // public static function AltaAlumno($ci, $nombre, $apellido, $password, $grupo)
    // {
    //     try {
    //         $usuario = new UsuarioModelo();
    //         $usuario->ci = $ci;
    //         $usuario->nombre = $nombre;
    //         $usuario->apellido = $apellido;
    //         $usuario->idRol = constant_Alumno;
    //         $usuario->password = $password;
    //         $usuario->idGrupo = $grupo;
    //         $usuario->inscripcionConfirmada = false;
    //         $usuario->Insert();
    //         UsuarioController::ObtenerGrupos(constant_Alumno_Title);
    //     } catch (Exception $ex) {
    //         error_log($ex->getMessage());
    //         return generarHtml('altaAlumno', ['exito' => false]);
    //     }
    //     return generarHtml('altaAlumno', ['exito' => true]);
    // }

    // public static function AltaDocente($ci, $nombre, $apellido, $password, $grupo,$materia,$avatar)
    // {
    //     try {
    //         $usuario = new UsuarioModelo();
    //         $usuario->ci = $ci;
    //         $usuario->nombre = $nombre;
    //         $usuario->apellido = $apellido;
    //         $usuario->idRol = constant_Docente;
    //         $usuario->password = $password;
    //         $usuario->idGrupo = $grupo;
    //         $usuario->materia = $materia;
    //         $usuario->inscripcionConfirmada = true;
    //         $usuario->avatar = $avatar;
    //         $usuario->Insert();
    //         UsuarioController::ObtenerGrupos(constant_Docente_Title);
    //     } catch (Exception $ex) {
    //         error_log($ex->getMessage());
    //         return generarHtml('altaDocente', ['exito' => false]);
    //     }
    //     return generarHtml('altaDocente', ['exito' => true]);
    // }
    // public static function ObtenerGrupos($tipo)
    // {
    //     $g = new GrupoModelo();
    //     $grupos = array();
    //     foreach ($g->obtenerTodos() as $fila) {
    //         $grupo = array(
    //             "idGrupo" => $fila->idGrupo,
    //             "nombreGrupo" => $fila->nombreGrupo
    //         );
    //         array_push($grupos, $grupo);
    //     }
    //     if ($tipo === constant_Alumno_Title) {
    //         return generarHtml('altaAlumno', ['grupos' => $grupos, 'tipo' => $tipo]);
    //     }
    //     else{
    //         return generarHtml('altaDocente', ['grupos' => $grupos, 'tipo' => $tipo]);
    //     }

    // }
}
