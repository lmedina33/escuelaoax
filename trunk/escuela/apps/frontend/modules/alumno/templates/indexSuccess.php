<h1>Alumnos List</h1>

<table>
  <thead>
    <tr>
      <th>Id alumno</th>
      <th>Nombre</th>
      <th>Ap paterno</th>
      <th>Ap materno</th>
      <th>N lista</th>
      <th>Id grupo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alumnos as $alumno): ?>
    <tr>
      <td><a href="<?php echo url_for('alumno/edit?id_alumno='.$alumno->getIdAlumno()) ?>"><?php echo $alumno->getIdAlumno() ?></a></td>
      <td><?php echo $alumno->getNombre() ?></td>
      <td><?php echo $alumno->getApPaterno() ?></td>
      <td><?php echo $alumno->getApMaterno() ?></td>
      <td><?php echo $alumno->getNLista() ?></td>
      <td><?php echo $alumno->getIdGrupo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('alumno/new') ?>">New</a>
