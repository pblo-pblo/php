<?php

require '../utils/autoloader.php';

class CompraModelo extends Modelo
{
    public $id;
    public $fechaCompra;
    public $idSouvenir;
    public $cantidad;


    public function Comprar($stock)
    {
        $disponibles = $stock - $this->cantidad;  
        $sql = "CALL CompraSouvenir(?,?,?)";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param(
            "ssi",
            $this->idSouvenir,
            $this->cantidad,
            $disponibles
        );
        $this->sentencia->execute();
    }
}
