<?php
session_start();

require '../utils/autoloader.php';

class SouvenirController
{
    public static function ListarSouvenir()
    {
        $p = new SouvenirModelo();
        $souvenirs = array();
        foreach ($p->GetAllSouvenir() as $fila) {
            $souvenir = array(
                "id" => $fila->id,
                "nombre" => $fila->nombre,
                "descripcion" => $fila->descripcion,
                "stock" => $fila->stock,
                "precio" => $fila->precio,
                "fechaAlta" => $fila->fechaAlta,
            );
            array_push($souvenirs, $souvenir);
        }
        return generarHtml('listadoConsultas', ['consultas' => $souvenirs]);
    }

    public static function ObtenerSouvenir($id)
    {
        $c = new SouvenirModelo();
        $c->GetSouvenir($id);
        return generarHtml('modificarUsuario', ['exito' => true, 'souvenir' => $c]);
    }
    public static function UpdateSouvenir($id, $nombre, $descripcion, $stock, $precio)
    {
        try {
            $consulta = new SouvenirModelo();
            $consulta->id = $id;
            $consulta->nombre = $nombre;
            $consulta->descripcion = $descripcion;
            $consulta->stock = $stock;
            $consulta->precio = $precio;
            $consulta->Update();
            self::ListarSouvenir();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return generarHtml('consulta', ['exito' => false]);
        }
    }
    // public static function GuardarConsulta ($idDocente,$asunto,$mensaje){
    //     try {
    //         $consulta = new ConsultaModelo();
    //         $consulta->usuarioEmisor = $_SESSION['ci'];
    //         $consulta->usuarioReceptor = $idDocente;
    //         $consulta->mensaje = $mensaje;
    //         $consulta->asunto = $asunto;
    //         $consulta->estado = 'Realizada';
    //         $consulta->Insert();
    //         self::ObtenerFormularioConsultas();
    //     } catch (Exception $ex) {
    //         error_log($ex->getMessage());
    //         return generarHtml('consulta', ['exito' => false]);
    //     }
    // }

    // public static function ObtenerMisConsultas()
    // {
    //     $c = new ConsultaModelo();
    //     $c -> usuarioReceptor = $_SESSION['ci'];
    //     $consultas = array();
    //     foreach ($c->ObtenerMisConsultas() as $fila) {
    //         $consulta = array(
    //             "usuarioEmisor" => $fila->usuarioEmisor,
    //             "usuarioReceptor" => $fila->usuarioReceptor,
    //             "mensaje" => $fila->mensaje,
    //             "estado" => $fila->estado,
    //             "asunto" => $fila->asunto,
    //             "fecha" => $fila->fecha,
    //             "id" => $fila->id,
    //         );
    //         array_push($consultas, $consulta);
    //     }
    //     return generarHtml('listadoConsultas', ['consultas' => $consultas]);
    // }
    // public static function ObtenerMisConsultasRealizadas()
    // {
    //     $c = new ConsultaModelo();
    //     $c -> usuarioEmisor = $_SESSION['ci'];
    //     $consultas = array();
    //     foreach ($c->ObtenerMisConsultasRealizadas() as $fila) {
    //         $consulta = array(
    //             "usuarioEmisor" => $fila->usuarioEmisor,
    //             "usuarioReceptor" => $fila->usuarioReceptor,
    //             "mensaje" => $fila->mensaje,
    //             "asunto" => $fila->asunto,
    //             "estado" => $fila->estado,
    //             "fecha" => $fila->fecha,
    //             "id" => $fila->id,
    //         );
    //         array_push($consultas, $consulta);
    //     }
    //     return generarHtml('listadoConsultasRealizadas', ['consultas' => $consultas]);
    // }

    // public static function ObtenerConsultaAlumno($id){
    //     $c = new ConsultaModelo();
    //     $c -> ObtenerConsultaById($id);
    //     return generarHtml('respuestaAlumno',['consulta'=>$c]);
    // }
}
