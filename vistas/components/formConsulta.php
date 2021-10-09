<?php

$AsuntoLabel = 'Asunto';
$IdLabel = 'Asunto';
$Docente = 'Docente';
$message = 'Consulta';
$respuestaMessage = 'Respuesta';
$docenteDefault = 'Seleccionar Docente';
$DocenteInvalidFeedback = 'Debe seleccionar un docente'
?>
<div style="height: 100%;display: flex;justify-content: center;align-items: center;">
  <div style="display: flex;flex-direction: column;justify-content: center;align-items: center; background-color: #d0e7ff; border-radius: 8px; width:50%;padding: 30px 0px; ">
    <h2 style="text-align: center;"><?php echo $Titulo; ?></h2>

    <form id='formularioConsulta' action="<?php echo $action; ?>" method="post" style="width: 80%;">
      <div class="form-group" style="display: none;">
        <label for="exampleFormControlInput1"><?php echo $IdLabel; ?></label>
        <input type="text" class="form-control" name="id" id="exampleFormControlInput1" value="<?php echo $consulta->id; ?>">
      </div>

      <?php if (!$respuesta) : ?>
        <div class="form-group">
          <label for="docente"><?php echo $Docente; ?></label>
          <select class="form-control" name="docente" required>
            <option value=""><?php echo $docenteDefault; ?></option>
            <?php
            foreach ($parametros['personas'] as $value) {
              echo "<option value=" . $value['ci'] . "> <span>" . $value['materia'] . "</span> " . $value['nombre'] . " " . $value['apellido'] . " </option>";
            }
            ?>
            <div class="invalid-feedback"><?php echo $DocenteInvalidFeedback; ?></div>
          </select>
        </div>
      <?php endif; ?>

      <div class="form-group">
        <label for="exampleFormControlInput1"><?php echo $AsuntoLabel; ?></label>
        <input type="text" class="form-control" name="asunto" id="exampleFormControlInput1" placeholder="<?php echo $AsuntoLabel; ?>" value="<?php echo $consulta->asunto; ?>" <?php echo $camposDisabled; ?>>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1"><?php echo $message; ?></label>
        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" <?php echo $camposDisabled; ?>><?php echo $consulta->mensaje; ?></textarea>
      </div>
      <?php if ($respuesta) : ?>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><?php echo $respuestaMessage; ?></label>
          <?php if ($consulta->estado === 'Respondida' || $tipo ==='Alumno') : ?>
            <textarea class="form-control" name="respuesta" id="exampleFormControlTextarea1" rows="3" disabled><?php echo $consulta->respuesta; ?></textarea>
          <?php else : ?>
            <textarea class="form-control" name="respuesta" id="exampleFormControlTextarea1" rows="3"><?php echo $consulta->respuesta; ?></textarea>
          <?php endif; ?>

        </div>
      <?php endif; ?>

      <div class="form-group row d-flex justify-content-center">
        
        <?php if ($consulta->estado === 'Respondida' || $tipo ==='Alumno') : ?>
          <button type="submit" class="btn btn-primary m-3" style="display: none;"><?php echo $buttonText; ?></button>
        <?php else : ?>
          <button type="submit" class="btn btn-primary m-3"><?php echo $buttonText; ?></button>
        <?php endif; ?>

      </div>
    </form>
  </div>
</div>