<h1>Calificacions List</h1>

<table>
  <thead>
    <tr>
      <th>Id unidad</th>
      <th>Numero unidad</th>
      <th>Clasificacion</th>
      <th>Asistencia</th>
      <th>Fltas</th>
      <th>Alumno profesor materiaid alumno profesor materia</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($calificacions as $calificacion): ?>
    <tr>
      <td><a href="<?php echo url_for('calificacion/edit?id_unidad='.$calificacion->getIdUnidad()) ?>"><?php echo $calificacion->getIdUnidad() ?></a></td>
      <td><?php echo $calificacion->getNumeroUnidad() ?></td>
      <td><?php echo $calificacion->getClasificacion() ?></td>
      <td><?php echo $calificacion->getAsistencia() ?></td>
      <td><?php echo $calificacion->getFltas() ?></td>
      <td><?php echo $calificacion->getAlumnoProfesorMateriaidAlumnoProfesorMateria() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('calificacion/new') ?>">New</a>
