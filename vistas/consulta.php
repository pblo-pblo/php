<?php
session_start();
?>
<?php include "components/header.php" ?>

<?php
$title = 'La Franja';
include "components/nav.php" ?>

<?php
$Titulo = 'Formulario Consulta';
$buttonText='Enviar Consulta';
$action='/generarConsulta';
include "components/formConsulta.php" ?>

<?php if (isset($parametros['exito']) && $parametros['exito'] == true) : ?>
    <script>
        alertify.notify('Usuario Creado Correctamente', 'success', 3);
    </script>
<?php endif; ?>
<?php if (isset($parametros['exito']) && $parametros['exito'] == false) : ?>
    <script>
        alertify.notify('Error al dar de alta usuario', 'error', 3);
    </script>
<?php endif; ?>

<?php include "components/footer.php" ?>