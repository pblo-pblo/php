<?php include "components/header.php" ?>
<?php
    $title = 'La Franja';
    include "components/nav.php" ?>


<?php
$Titulo = 'Mi Perfil';
$action = '/modificar-usuario';
$grupos = $parametros['grupos'];
$usuario = $parametros['usuario'];
include "components/formModificarUsuario.php" ?>

<?php if (isset($parametros['exito']) && $parametros['exito'] == true) : ?>
    <script>
        alertify.notify('Usuario Modificado Correctamente', 'success', 3);
    </script>
<?php endif; ?>
<?php if (isset($parametros['exito']) && $parametros['exito'] == false) : ?>
    <script>
        alertify.notify('Error Modificar Usuario', 'error', 3);
    </script>
<?php endif; ?>

<?php include "components/footer.php" ?>