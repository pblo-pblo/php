<?php
session_start();
?>
<?php include "components/header.php" ?>

<?php
$title = 'La Franja';
include "components/nav.php" ?>

<?php
$titulo = 'Souvenir';
?>

<div style="height: 100%;display: flex;flex-direction: column;justify-content: center;align-items: center;">
  <h2 style="text-align: center;"><?php echo $titulo; ?></h2>

  <div style="display: flex;justify-content: center;background-color: #d0e7ff;border-radius: 8px;width: 50%;padding: 30px 0px;">
    <div class="list-group" style="width: 92%;">

      <table class="table" style="background-color: white;">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio</th>
            <th scope="col">FechaAlta</th>

          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($parametros['consultas'] as $fila) {
            $id = $fila['id'];
            $nombre = $fila['nombre'];
            $descripcion = $fila['descripcion'];
            $stock = $fila['stock'];
            $precio = $fila['precio'];
            $fechaAlta = $fila['fechaAlta'];
            $editar = "Editar";
            $borrar = "Borrar";
            echo "<tr>
            <th scope='row'>$id</th>
            <td>$nombre</td>
            <td>$descripcion</td>
            <td>$stock</td>
            <td>$$precio</td>
            <td>$fechaAlta</td>
            <td><a href='edit-souvenirs?id=$id'>$editar</a></td>
            <td><a href='delete-souvenirs?id=$id' style='color:red'>$borrar</a></td>
            <td><a href='compra?id=$id' style='color:green'>Comprar</a></td>
          </tr>";
          }
          ?>
        </tbody>
      </table>
      <div class="form-group row d-flex justify-content-center">
        <a href='/insert-souvenirs' class="btn btn-primary m-3">Agregar Souvenir</a>
      </div>
    </div>
  </div>
</div>

<?php include "components/footer.php" ?>