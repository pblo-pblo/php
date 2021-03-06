    <?php
    $ciLabel = "Ci";
    $UsuarioInvalidFeedback = "Usuario es requerido";
    $PasswordInvalidFeedback = "Password es requerido";
    $LoginCampo = "Iniciar Session";
    ?>
    <div class="container-fluid d-flex flex-column justify-content-center" style="height: 800px; width: 900px; border-radius: 8px;">

        <h2 style="text-align: center;"><?php echo $Titulo; ?></h2>

        <form id='fomularioRegistro' action='<?php echo $action; ?>' method='post' class="needs-validation mx-auto p-5 mt-4" novalidate style="background-color: #d0e7ff; width: 800px; border-radius: 8px;">

            <div class="form-group row">
                <label for="ci" class="col-sm-3 col-form-label"><?php echo $ciLabel; ?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ci" id="ci" placeholder="Ci" required>
                    <div class="invalid-feedback">
                        <?php echo $UsuarioInvalidFeedback; ?>
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

            <div class="form-group row d-flex justify-content-center">
                <button type="submit" class="btn btn-primary m-3"><?php echo $LoginCampo; ?></button>
            </div>
        </form>
        <script>
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    var forms = document.getElementsByClassName('needs-validation');
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