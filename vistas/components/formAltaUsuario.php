    <?php
    // $Titulo='Titulo';
    $DocumentoInvalidFeedback = "Documento es requerido";
    $NombreCampo = "Nombre";
    $NombreInvalidFeedback = "Nombre es requerido";
    $ApellidoCampo = "Apellido";
    $ApellidoInvalidFeedback = "Apellido es requerido";
    $PasswordInvalidFeedback = "Password es requerido";
    $ConfirmPasswordCampo = "Confirmar Password";
    $ConfirmPasswordInvalidFeedback = "Contraseña no coincide";
    $MateriaInvalidFeedback = "Materia es requerido";
    $GrupoCampo = "Seleccionar Grupo";
    $GrupoInvalidFeedback = "El Grupo es obligatorio";
    $RegistrarCampo = "Registrarse";
    $GrupoDefault = "Seleccionar Grupo";
    $Materia = "Materia";
    $Return = "Volver Login";
    ?>

    <div class="container-fluid d-flex flex-column justify-content-center" style="height: 800px; width: 900px; border-radius: 8px;">

        <h2 style="text-align: center;"><?php echo $Titulo; ?></h2>

        <form id='fomularioRegistro' action='<?php echo $action; ?>' method='post' class="needs-validation mx-auto p-5 mt-4" novalidate style="background-color: #d0e7ff; width: 800px; border-radius: 8px;" oninput="confirmPassword.setCustomValidity(confirmPassword.value !== password.value ? true : '')">

            <div class="form-group row">
                <label for="ci" class="col-sm-3 col-form-label">Ci</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="ci" id="ci" placeholder="Ci" required>
                    <div class="invalid-feedback">
                        <?php echo $DocumentoInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre" class="col-sm-3 col-form-label"><?php echo $NombreCampo; ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="<?php echo $NombreCampo; ?>" required>
                    <div class="invalid-feedback">
                        <?php echo $NombreInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="apellido" class="col-sm-3 col-form-label"><?php echo $ApellidoCampo; ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="<?php echo $ApellidoCampo; ?>" required>
                    <div class="invalid-feedback">
                        <?php echo $ApellidoInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <div class="invalid-feedback">
                        <?php echo $PasswordInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="confirmPassword" class="col-sm-3 col-form-label"><?php echo $ConfirmPasswordCampo; ?></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="<?php echo $ConfirmPasswordCampo; ?>" required>
                    <div class="invalid-feedback">
                        <?php echo $ConfirmPasswordInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <?php if ($tipoUsuario === "Docente") : ?>
                <div class='form-group row'>
                    <label for='materia' class='col-sm-3 col-form-label'><?php echo $Materia; ?></label>
                    <div class='col-sm-9'>
                        <input type='text' class='form-control' name='materia' id='materia' placeholder='<?php echo $Materia; ?>' required>
                        <div class='invalid-feedback'>
                            <?php echo $MateriaInvalidFeedback; ?>
                        </div>
                    </div>
                </div>
                <div class='form-group row d-flex justify-content-center'>
                    <?php
                    $hombreId='/hombre.png';
                    $hombre =  cargarContenidoEstatico($hombreId);
                    $hombre = 'data:image/' . $hombre['contentType'] . ';base64,' . base64_encode($hombre['contenido']);
                    $hombre1Id='/hombre1.png';
                    $hombre1 =  cargarContenidoEstatico($hombre1Id);
                    $hombre1 = 'data:image/' . $hombre1['contentType'] . ';base64,' . base64_encode($hombre1['contenido']);
                    $ninaId='/nina.png';
                    $nina =  cargarContenidoEstatico($ninaId);
                    $nina = 'data:image/' . $nina['contentType'] . ';base64,' . base64_encode($nina['contenido']);
                    $nina1Id =  '/nina1.png';
                    $nina1 =  cargarContenidoEstatico($nina1Id);
                    $nina1 = 'data:image/' . $nina1['contentType'] . ';base64,' . base64_encode($nina1['contenido']);
                    ?>
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="avatar" id="inlineRadio1" value="<?php echo $hombreId; ?>" checked>
                        <label class="form-check-label" for="inlineRadio1"><img style='height: 50px; width:50px;' src='<?php echo $hombre; ?>' alt=''></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="avatar" id="inlineRadio2" value="<?php echo $hombre1Id; ?>">
                        <label class="form-check-label" for="inlineRadio2"><img style='height: 50px; width:50px;' src='<?php echo $hombre1; ?>' alt=''></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="avatar" id="inlineRadio3" value="<?php echo $ninaId; ?>">
                        <label class="form-check-label" for="inlineRadio3"><img style='height: 50px; width:50px;' src='<?php echo $nina; ?>' alt=''></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="avatar" id="inlineRadio3" value="<?php echo $nina1Id; ?>">
                        <label class="form-check-label" for="inlineRadio4"><img style='height: 50px; width:50px;' src='<?php echo $nina1; ?>' alt=''></label>
                    </div>
                </div>






            <?php endif; ?>

            <div class="form-group row">
                <label for="grupo" class="col-sm-3 col-form-label"><?php echo $GrupoCampo; ?></label>
                <div class="col-sm-9">
                    <select class="form-control" name="grupo" required>
                        <option value=""><?php echo $GrupoDefault; ?></option>
                        <?php
                        foreach ($grupos as $value) {
                            echo "<option value=" . $value['idGrupo'] . ">" . $value['nombreGrupo'] . " </option>";
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback"><?php echo $GrupoInvalidFeedback; ?></div>
                </div>
            </div>

            <div class="form-group row d-flex justify-content-center">
                <button type="submit" class="btn btn-primary m-3"><?php echo $RegistrarCampo; ?></button>
            </div>
            <div style="display: flex; justify-content:center">
                <a href="/login"><?php echo $Return; ?> </a>
            </div>
        </form>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </div>