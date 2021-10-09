<!-- <?php include "components/header.php" ?>

<?php
$Titulo = 'Alta '. $parametros['tipo'];
$action = '/alta-docente';
$grupos = $parametros['grupos'];
$tipoUsuario = $parametros['tipo'];
include "components/formAltaUsuario.php" ?>

<?php if (isset($parametros['exito']) && $parametros['exito'] == true) : ?>
    <script>
        alertify.notify('Usuario Creado Correctamente', 'success', 3);
    </script>
<?php endif; ?>

<?php include "components/footer.php" ?> 
