<?php
session_start();

require '../utils/autoloader.php';

class SouvenirController
{
    public static function ListarSouvenir($exito=null)
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
        if ($exito) {
            return generarHtml('listadoSouvenir', ['consultas' => $souvenirs,'exito'=> true]);
        }
        else{
            return generarHtml('listadoSouvenir', ['consultas' => $souvenirs,'exito'=> false]);
        }
    }

    public static function ObtenerSouvenir($id)
    {
        $c = new SouvenirModelo();
        $c->GetSouvenir($id);
        return generarHtml('modificarSouvenir', ['souvenir' => $c]);
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
            self::ListarSouvenir(true,"Souvenir modificado correctamente");
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            self::ListarSouvenir(false,"Error al modificar souvenir");
        }
    }
    public static function DeleteSovenir($id)
    {
        try {
            $consulta = new SouvenirModelo();
            $consulta->id = $id;
            $consulta->delete();
            self::ListarSouvenir(true,"Souvenir eliminado correctamente");
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            self::ListarSouvenir(false,"Tenga en cuenta que no puede eliminar un producto con compras asociadas");
        }
    }

    public static function InsertSouvenir($nombre, $descripcion, $stock, $precio)
    {
        try {
            $consulta = new SouvenirModelo();
            $consulta->nombre = $nombre;
            $consulta->descripcion = $descripcion;
            $consulta->stock = $stock;
            $consulta->precio = $precio;
            $consulta->Insert();
            self::ListarSouvenir(true,"Souvenir agregado correctamente");
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            self::ListarSouvenir(false,"Error al agregar souvenir");
        }
    }

    public static function ObtenerSouvenirParaComprar($id)
    {
        $c = new SouvenirModelo();
        $c->GetSouvenir($id);
        return generarHtml('compraSouvenir', ['souvenir' => $c]);
    }

    public static function Comprar($id, $cantidadcomprar, $stock)
    {
        $c = new CompraModelo();
        $c->idSouvenir = $id;
        $c->cantidad = $cantidadcomprar;
        $c->Comprar($stock);
        self::ListarSouvenir(true,"Compra realizada correctamente");
        // return generarHtml('respuesta', ['exito' => true, 'souvenir' => $c]);
    }
}
