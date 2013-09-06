<h1>Profesor materias List</h1>

<table>
  <thead>
    <tr>
      <th>Id profesor materia</th>
      <th>Materiaid materia</th>
      <th>Profesorid profesor</th>
      <th>Anio</th>
      <th>Semestreid semestre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($profesor_materias as $profesor_materia): ?>
    <tr>
      <td><a href="<?php echo url_for('profesorMat/edit?id_profesor_materia='.$profesor_materia->getIdProfesorMateria()) ?>"><?php echo $profesor_materia->getIdProfesorMateria() ?></a></td>
      <td><?php echo $profesor_materia->getMateriaidMateria() ?></td>
      <td><?php echo $profesor_materia->getProfesoridProfesor() ?></td>
      <td><?php echo $profesor_materia->getAnio() ?></td>
      <td><?php echo $profesor_materia->getSemestreidSemestre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('profesorMat/new') ?>">New</a>
