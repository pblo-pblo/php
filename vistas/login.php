<?php include "components/header.php" ?>

<?php 
$Titulo = 'Login ';
$action = '/login';
include "components/formLogin.php" ?>

<?php if (isset($parametros['exito']) && $parametros['exito'] == false) : ?>
    <script>
        alertify.notify('Documento o password incorrectos', 'error', 3);
    </script>
<?php endif; ?>

<?php include "components/footer.php" ?>