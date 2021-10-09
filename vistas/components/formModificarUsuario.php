    <?php
    $CampoInvalidFeedback = "Campo requerido";
    $RegistrarCampo = "Modificar";
    ?>


    <div class="container-fluid d-flex flex-column justify-content-center" style="height: 800px; width: 900px; border-radius: 8px;">

        <h2 style="text-align: center;"><?php echo $Titulo; ?></h2>

        <form id='fomularioRegistro' action='<?php echo $action; ?>' method='POST' class="needs-validation mx-auto p-5 mt-4" novalidate style="background-color: #d0e7ff; width: 800px; border-radius: 8px;" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="id" class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="id" id="id" placeholder="id" value="<?php echo $usuario->id; ?>">
                    <div class="invalid-feedback">
                        <?php echo $CampoInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre" value="<?php echo $usuario->nombre; ?>" required>
                    <div class="invalid-feedback">
                        <?php echo $CampoInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Descripcion</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion" value="<?php echo $usuario->descripcion; ?>" required>
                    <div class="invalid-feedback">
                        <?php echo $CampoInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Stock</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="stock" id="stock" placeholder="stock" value="<?php echo $usuario->stock; ?>" required>
                    <div class="invalid-feedback">
                        <?php echo $CampoInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Precio ($)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="precio" id="precio" placeholder="precio" value="<?php echo $usuario->precio; ?>" required>
                    <div class="invalid-feedback">
                        <?php echo $CampoInvalidFeedback; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex justify-content-center">
                <button type="submit" class="btn btn-primary m-3"><?php echo $RegistrarCampo; ?></button>
            </div>
        </form>

    </div>