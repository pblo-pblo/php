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
    // public static function UpdateConsulta ($id,$respuesta){

    //     try {
    //         $consulta = new ConsultaModelo();
    //         $consulta->id = $id;
    //         $consulta->respuesta = $respuesta;
    //         $consulta->estado = 'Respondida';
    //         $consulta->Update();
    //         self::ObtenerMisConsultas();
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

    // public static function ObtenerConsulta($id){
    //     $c = new ConsultaModelo();
    //     $c -> ObtenerConsultaById($id);
    //     return generarHtml('respuesta',['consulta'=>$c]);
    // }
    // public static function ObtenerConsultaAlumno($id){
    //     $c = new ConsultaModelo();
    //     $c -> ObtenerConsultaById($id);
    //     return generarHtml('respuestaAlumno',['consulta'=>$c]);
    // }
}
