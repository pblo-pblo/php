<?php
require '../utils/autoloader.php';

class UsuarioModelo extends Modelo
{
    public $id;
    public $ci;
    public $nombre;
    public $password;
    
    private function asignarCamposDePersona($resultado)
    {
        $this->id = $resultado['id'];
        $this->ci = $resultado['ci'];
        $this->nombre = $resultado['nombre'];
    }

    public function Autenticar()
    {
        $this->prepararAutenticacion();
        $this->sentencia->execute();

        $resultado = $this->sentencia->get_result()->fetch_assoc();

        if ($this->sentencia->error) {
            throw new Exception("Error al obtener el usuario: " . $this->sentencia->error);
        }
        if ($resultado) {
            $comparacion = $this->compararPasswords($resultado['password']);
            if ($comparacion) {
                $this->asignarCamposDePersona($resultado);
            } else {
                throw new Exception("Error al iniciar sesion");
            }
        } else throw new Exception("Error al iniciar sesion");
    }
    private function compararPasswords($passwordHasheado)
    {
        return password_verify($this->password, $passwordHasheado);
    }
    
    private function prepararAutenticacion()
    {
        $sql = "SELECT * FROM Usuarios WHERE ci = ? ";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param("s", $this->ci);
    }
}
