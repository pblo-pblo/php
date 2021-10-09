<?php
session_start();
?>

<?php include "components/header.php" ?>
<?php
$title = 'La Franja';
$tipoUsuario = $_SESSION['TipoUsuario'];
include "components/nav.php" ?>

<div style="padding: 20px 20px;display: flex;justify-content: center;">
    <?php if ($tipoUsuario === constant_Alumno) : ?>
        <div class="card" style="width: 300px;margin-right: 70px;">
            <?php
            $img =  cargarContenidoEstatico('/formulario.png');
            $img = 'data:image/' . $img['contentType'] . ';base64,' . base64_encode($img['contenido']);
            ?>
            <img src="<?php echo $img; ?>" class="card-img-top" alt="img" style="height: 100px;width: 100px;align-self: center;margin-top: 20px;">
            <div class="card-body">
                <h5 class="card-title">Realizar Consulta</h5>
                <p class="card-text">Puede seleccionar una docente generar una consulta</p>
                <div style="display: flex;justify-content: center;">
                    <a href="/consultar" class="btn btn-primary">Consultar</a>
                </div>
            </div>
        </div>
        <div class="card" style="width: 300px;margin-right: 70px;">
            <?php
            $img =  cargarContenidoEstatico('/respuesta.png');
            $img = 'data:image/' . $img['contentType'] . ';base64,' . base64_encode($img['contenido']);
            ?>
            <img src="<?php echo $img; ?>" class="card-img-top" alt="img" style="height: 100px;width: 100px;align-self: center;margin-top: 20px;">
            <div class="card-body">
                <h5 class="card-title">Listar Consultas Realizadas</h5>
                <p class="card-text">Puede seleccionar una consulta y ver su respuesta</p>
                <div style="display: flex;justify-content: center;">
                    <a href="/listar-consultas-realizadas" class="btn btn-primary">Listar</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($tipoUsuario === constant_Docente) : ?>
        <div class="card" style="width: 300px;margin-right: 70px;">
            <?php
            $img =  cargarContenidoEstatico('/respuesta.png');
            $img = 'data:image/' . $img['contentType'] . ';base64,' . base64_encode($img['contenido']);
            ?>
            <img src="<?php echo $img; ?>" class="card-img-top" alt="img" style="height: 100px;width: 100px;align-self: center;margin-top: 20px;">
            <div class="card-body">
                <h5 class="card-title">Listar Consultas Recibidas</h5>
                <p class="card-text">Puede seleccionar una consulta y responderla</p>
                <div style="display: flex;justify-content: center;">
                    <a href="/listar-consultas-recibidas" class="btn btn-primary">Listar</a>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<div class="container" style="position: absolute;bottom: 0;right: 0;width: auto;">
    <div class="card" style="width:300px">
        <?php
        $avatar =  cargarContenidoEstatico($_SESSION['avatar']);
        $avatar = 'data:image/' . $avatar['contentType'] . ';base64,' . base64_encode($avatar['contenido']);
        ?>
        <?php if ($_SESSION['avatar'] !== NULL) : ?>

            <img class="card-img-top" src="<?php echo $avatar; ?>" alt="Card image" style="width: 200px;height: 200px;align-self: center;margin-top: 19px;">
        <?php endif; ?>

        <div class="card-body">
            <h3 class="card-title"><?php echo $_SESSION['NombreCompleto'] ?></h3>
            <div style="display: flex;align-items: center;">
                <label style="margin-right: 5px;">Documento:</label>
                <h5 class="card-title"><?php echo $_SESSION['ci'] ?></h5>
            </div>
            <?php if ($_SESSION['nickName'] !== NULL) : ?>
                <div style="display: flex;align-items: center;">
                    <label style="margin-right: 5px;">Nickname:</label>
                    <h5 class="card-title"><?php echo $_SESSION['nickName'] ?></h5>
                </div>
            <?php endif; ?>
            <a href="/modificar-usuario" class="btn btn-primary">Modificar Perfil</a>
        </div>
    </div>
    <br>
</div>

<?php include "components/footer.php" ?>