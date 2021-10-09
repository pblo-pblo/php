<?php
session_start();
?>
<?php include "components/header.php" ?>

<?php
$title = 'La Franja';
include "components/nav.php" ?>

<?php
$_GET['id'] = 'a';

$titulo = 'Consultas Realizadas';
?>

<div style="height: 100%;display: flex;flex-direction: column;justify-content: center;align-items: center;">
  <h2 style="text-align: center;"><?php echo $titulo; ?></h2>

  <div style="display: flex;justify-content: center;background-color: #d0e7ff;border-radius: 8px;width: 50%;padding: 30px 0px;">
    <div class="list-group" style="width: 92%;">

      <table class="table" style="background-color: white;">
        <thead>
          <tr>
            <th scope="col">Documento</th>
            <th scope="col">Asunto</th>
            <th scope="col">Fecha</th>
            <th scope="col"></th>

          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($parametros['consultas'] as $fila) {
            $id = $fila['id'];
            $filaEmisor = $fila['usuarioEmisor'];
            $filaAsunto = $fila['asunto'];
            $filaFecha = $fila['fecha'];
            $message = $fila['estado']==='Respondida'?'Ver Respuesta':'Ver Consulta'; 
            echo "<tr>
            <th scope='row'>$filaEmisor</th>
            <td>$filaAsunto</td>
            <td>$filaFecha</td>
            <td><a href='obtenerConsultaAlumno?id=$id'>$message</a></td>
          </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include "components/footer.php" ?>