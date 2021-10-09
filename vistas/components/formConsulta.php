<?php
$InvalidFeedback = 'No puede comprar mas articulos que los disponibles en stock'
?>
<div style="height: 100%;display: flex;justify-content: center;align-items: center;">
  <div style="display: flex;flex-direction: column;justify-content: center;align-items: center; background-color: #d0e7ff; border-radius: 8px; width:50%;padding: 30px 0px; ">
    <h2 style="text-align: center;"><?php echo $Titulo; ?></h2>

    <form id='formularioConsulta' action="<?php echo $action; ?>" method="post" class="needs-validation mx-auto p-5 mt-4" style="width: 80%;" novalidate oninput="cantidadcomprar.setCustomValidity(Number(cantidadcomprar.value) > Number(stock.value) ? true : '')">

      <div class="form-group">
        <label for="exampleFormControlInput1">ID</label>
        <input type="number" class="form-control" name="id" id="id" placeholder="id" value="<?php echo $souvenir->id; ?>">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Stock</label>
        <input type="number" class="form-control" name="stock" id="stock" placeholder="stock" value="<?php echo $souvenir->stock; ?>">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Cantidad a comprar</label>
        <input type="number" class="form-control" name="cantidadcomprar" id="cantidadcomprar" placeholder="Cantidad a comprar" value="<?php echo $consulta->asunto; ?>" required>
        <div class="invalid-feedback">
          <?php echo $InvalidFeedback; ?>
        </div>
      </div>

      <div class="form-group row d-flex justify-content-center">

        <?php if ($consulta->estado === 'Respondida' || $tipo === 'Alumno') : ?>
          <button type="submit" class="btn btn-primary m-3" style="display: none;"><?php echo $buttonText; ?></button>
        <?php else : ?>
          <button type="submit" class="btn btn-primary m-3"><?php echo $buttonText; ?></button>
        <?php endif; ?>

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
</div>