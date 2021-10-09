<?php include "components/header.php" ?>

<?php
$Titulo = 'Alta '. $parametros['tipo'];
$action = '/alta-alumno';
$grupos = $parametros['grupos'];
$tipoUsuario = $parametros['tipo'];
include "components/formAltaUsuario.php" ?>

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