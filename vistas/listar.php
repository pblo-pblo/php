<?php include "components/header.php" ?>

<?php
    $title = 'La Franja';
    include "components/nav.php" ?>



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <?php
        foreach ($parametros['personas'] as $fila) {
            $filaid = $fila['id'] ;
            $filaNombre = $fila['nombre'];
            $filaApellido = $fila['apellido'];

            echo "<tr>
            <th scope='row'>$filaid</th>
            <td>$filaNombre</td>
            <td>$filaApellido</td>
          </tr>";
        }
        ?>
  </tbody>
</table>

<!-- Vertically centered modal -->
<div class="modal-dialog modal-dialog-centered">
  ...
</div>

<!-- Vertically centered scrollable modal -->
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
  ...
</div>

<?php include "components/footer.php" ?>