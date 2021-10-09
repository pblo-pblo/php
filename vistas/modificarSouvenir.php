<?php include "components/header.php" ?>
<?php
    $title = 'La Franja';
    include "components/nav.php" ?>


<?php
$Titulo = 'Edit Souvenir';
$action = '/edit-souvenirs';
$usuario = $parametros['souvenir'];
include "components/formModificarSouvenir.php" ?>

<?php if (isset($parametros['exito']) && $parametros['exito'] == true) : ?>
    <script>
        alertify.notify('Souvenir modificdo Correctamente', 'success', 3);
    </script>
<?php endif; ?>
<?php if (isset($parametros['exito']) && $parametros['exito'] == false) : ?>
    <script>
        alertify.notify('Souvenir modificdo Correctamente', 'error', 3);
    </script>
<?php endif; ?>

<?php include "components/footer.php" ?>