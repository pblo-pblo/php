<?php
session_start();
?>
<?php include "components/header.php" ?>

<?php
include "components/nav.php" ?>

<?php
$Titulo = 'Compra Souvenir';
$souvenir = $parametros['souvenir'];
$buttonText='Comprar';
$action='/compra';
include "components/formCompra.php" ?>

<?php if (isset($parametros['exito']) && $parametros['exito'] == true) : ?>
    <script>
        alertify.notify('Compra realizada Correctamente', 'success', 3);
    </script>
<?php endif; ?>
<?php if (isset($parametros['exito']) && $parametros['exito'] == false) : ?>
    <script>
        alertify.notify('Error al realizar la compra', 'error', 3);
    </script>
<?php endif; ?>

<?php include "components/footer.php" ?>