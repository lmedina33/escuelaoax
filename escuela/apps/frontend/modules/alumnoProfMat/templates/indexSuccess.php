<h1>Alumno profesor materias List</h1>

<table border="1">
  <thead>
    <tr>
      <th>Id</th>
      <th>Alumno</th>
      <th>Materia</th>
      <th>Profesor</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alumno_profesor_materias as $alumno_profesor_materia): ?>
    <tr>
      <td><a href="<?php echo url_for('alumnoProfMat/edit?id_alumno_profesor_materia='.$alumno_profesor_materia->getIdAlumnoProfesorMateria()) ?>"><?php echo $alumno_profesor_materia->getIdAlumnoProfesorMateria() ?></a></td>
      <td><?php echo $alumno_profesor_materia->getAlumno() ?></td>
      <td><?php echo $alumno_profesor_materia->getProfesorMateria()->getMateria() ?></td>
      <td><?php echo $alumno_profesor_materia->getProfesorMateria()->getProfesor() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('alumnoProfMat/new') ?>">New</a>
