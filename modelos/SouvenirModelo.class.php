<?php

require '../utils/autoloader.php';

class SouvenirModelo extends Modelo
{
    public $id;
    public $nombre;
    public $descripcion;
    public $stock;
    public $precio;
    public $fechaAlta;

    private function asignarCamposDeConsulta($resultado)
    {
        $this->id = $resultado['id'];
        $this->nombre = $resultado['nombre'];
        $this->descripcion = $resultado['descripcion'];
        $this->stock = $resultado['stock'];
        $this->precio = $resultado['precio'];
        $this->asunto = $resultado['asunto'];
        $this->fechaAlta = $resultado['fechaAlta'];
    }

    public function Insert()
    {
        $sql = "INSERT INTO Souvenirs(nombre,descripcion,stock,precio) VALUES (?,?,?,?)";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param(
            "sssii",
            $this->nombre,
            $this->descripcion,
            $this->stock,
            $this->precio
        );
        $this->sentencia->execute();
    }
    public function Update()
    {
        $sql = "UPDATE Souvenirs set nombre = ?,descripcion = ?,stock = ?,precio = ?  WHERE id = ? ";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param(
            "sssii",
            $this->nombre,
            $this->descripcion,
            $this->stock,
            $this->precio,
            $this->id
        );
        $this->sentencia->execute();
    }

    public function GetAllSouvenir()
    {
        $filas = $this->crearGetAllSouvenir();
        if ($this->conexion->error) {
            throw new Exception("Error al obtener los Souvenirs: " . $this->conexion->error);
        }
        return $filas;
    }
    private function crearGetAllSouvenir()
    {
        $sql = "SELECT * FROM Souvenirs";
        $filas = array();
        foreach ($this->conexion->query($sql)->fetch_all(MYSQLI_ASSOC) as $fila) {
            $g = new SouvenirModelo();
            $g->id = $fila['id'];
            $g->nombre = $fila['nombre'];
            $g->descripcion = $fila['descripcion'];
            $g->stock = $fila['stock'];
            $g->precio = $fila['precio'];
            $g->fechaAlta = $fila['fechaAlta'];
            array_push($filas, $g);
        }
        return $filas;
    }

    public function GetSouvenir($id)
    {
        $sql = "SELECT * FROM Souvenirs WHERE id = ?";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param("s", $id);
        $this->sentencia->execute();
        $result = $this->sentencia->get_result();
        $this->asignarCamposDeConsulta($result->fetch_array(MYSQLI_ASSOC));

        if ($this->sentencia->error) {
            throw new Exception("Error al obtener la Souvenirs: " . $this->sentencia->error);
        }
    }
}