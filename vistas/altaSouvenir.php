<?php include "components/header.php" ?>

<?php
$Titulo = 'Alta Souvenir';
$action = '/insert-souvenirs';
include "components/formAltaSouvenir.php" ?>

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