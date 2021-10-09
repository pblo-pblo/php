    <?php
    $DocumentoInvalidFeedback = "Documento es requerido";
    $NicknameLabel = "Nickname";
    $FotoLabel = "Foto";
    $AvatarLabel = "Avatar";
    $RegistrarCampo = "Modificar";
    ?>


    <div class="container-fluid d-flex flex-column justify-content-center" style="height: 800px; width: 900px; border-radius: 8px;">

        <h2 style="text-align: center;"><?php echo $Titulo; ?></h2>

        <form id='fomularioRegistro' action='<?php echo $action; ?>' method='POST' class="needs-validation mx-auto p-5 mt-4" novalidate style="background-color: #d0e7ff; width: 800px; border-radius: 8px;" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="ci" class="col-sm-3 col-form-label">Ci</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="ci" id="ci" placeholder="Ci"value="<?php echo $usuario->ci; ?>"  disabled>
                    <div class="invalid-feedback">
                        <?php echo $DocumentoInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nickname" class="col-sm-3 col-form-label"><?php echo $NicknameLabel; ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nickname" id="nickname" placeholder="nickname" value="<?php echo $usuario->nickName; ?>" required>
                    <div class="invalid-feedback">
                        <?php echo $DocumentoInvalidFeedback; ?>
                    </div>
                </div>
            </div>

            <div class='form-group row d-flex justify-content-center'>
                <?php
                $hombreId = '/hombre.png';
                $hombre =  cargarContenidoEstatico($hombreId);
                $hombre = 'data:image/' . $hombre['contentType'] . ';base64,' . base64_encode($hombre['contenido']);
                $hombre1Id = '/hombre1.png';
                $hombre1 =  cargarContenidoEstatico($hombre1Id);
                $hombre1 = 'data:image/' . $hombre1['contentType'] . ';base64,' . base64_encode($hombre1['contenido']);
                $ninaId = '/nina.png';
                $nina =  cargarContenidoEstatico($ninaId);
                $nina = 'data:image/' . $nina['contentType'] . ';base64,' . base64_encode($nina['contenido']);
                $nina1Id =  '/nina1.png';
                $nina1 =  cargarContenidoEstatico($nina1Id);
                $nina1 = 'data:image/' . $nina1['contentType'] . ';base64,' . base64_encode($nina1['contenido']);
?>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="avatar" id="inlineRadio1" value="<?php echo $hombreId; ?>" <?php echo ($hombreId===$usuario->avatar ? 'checked' : '');?>>
                    <label class="form-check-label" for="inlineRadio1"><img style='height: 50px; width:50px;' src='<?php echo $hombre; ?>' alt=''></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="avatar" id="inlineRadio2" value="<?php echo $hombre1Id; ?>"<?php echo ($hombre1Id===$usuario->avatar ? 'checked' : '');?>>
                    <label class="form-check-label" for="inlineRadio2"><img style='height: 50px; width:50px;' src='<?php echo $hombre1; ?>' alt=''></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="avatar" id="inlineRadio3" value="<?php echo $ninaId; ?>"<?php echo ($ninaId===$usuario->avatar ? 'checked' : '');?>>
                    <label class="form-check-label" for="inlineRadio3"><img style='height: 50px; width:50px;' src='<?php echo $nina; ?>' alt=''></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="avatar" id="inlineRadio3" value="<?php echo $nina1Id; ?>" <?php echo ($nina1Id===$usuario->avatar ? 'checked' : '');?>>
                    <label class="form-check-label" for="inlineRadio4"><img style='height: 50px; width:50px;' src='<?php echo $nina1; ?>' alt=''></label>
                </div>
            </div>

            <div class="form-group row d-flex justify-content-center">
                <button type="submit" class="btn btn-primary m-3"><?php echo $RegistrarCampo; ?></button>
            </div>
        </form>

    </div>