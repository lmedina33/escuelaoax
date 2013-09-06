<h1>Alumno profesor materias List</h1>

<table>
  <thead>
    <tr>
      <th>Id alumno profesor materia</th>
      <th>Alumnoid alumno</th>
      <th>Profesor materiaid profesor materia</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alumno_profesor_materias as $alumno_profesor_materia): ?>
    <tr>
      <td><a href="<?php echo url_for('alumnoProfMat/edit?id_alumno_profesor_materia='.$alumno_profesor_materia->getIdAlumnoProfesorMateria()) ?>"><?php echo $alumno_profesor_materia->getIdAlumnoProfesorMateria() ?></a></td>
      <td><?php echo $alumno_profesor_materia->getAlumnoidAlumno() ?></td>
      <td><?php echo $alumno_profesor_materia->getProfesorMateriaidProfesorMateria() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('alumnoProfMat/new') ?>">New</a>
