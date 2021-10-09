<?php

require '../utils/autoloader.php';

class CompraModelo extends Modelo
{
    public $id;
    public $fechaCompra;
    public $idSouvenir;
    public $cantidad;
    public $nombreGrupo;

    public function obtenerTodos()
    {
        $filas = $this->crearArrayDeGrupos();
        if ($this->conexion->error) {
            throw new Exception("Error al obtener los grupos: " . $this->conexion->error);
        }
        return $filas;
    }
    private function crearArrayDeGrupos()
    {
        $sql = "SELECT * FROM Compras";
        $filas = array();
        foreach ($this->conexion->query($sql)->fetch_all(MYSQLI_ASSOC) as $fila) {
            $g = new CompraModelo();
            $g->id = $fila['id'];
            $g->fechaCompra = $fila['fechaCompra'];
            $g->idSouvenir = $fila['idSouvenir'];
            $g->cantidad = $fila['cantidad'];
            array_push($filas, $g);
        }
        return $filas;
    }
}
