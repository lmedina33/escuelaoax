<h1>Profesor materias List</h1>

<table border="1">
  <thead>
    <tr>
      <th>Id</th>
      <th>Materia</th>
      <th>Profesor</th>
      <th>Periodo</th>
      <th>Grupo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($profesor_materias as $profesor_materia): ?>
    <tr>
      <td><a href="<?php echo url_for('profesorMat/edit?id_profesor_materia='.$profesor_materia->getIdProfesorMateria()) ?>"><?php echo $profesor_materia->getIdProfesorMateria() ?></a></td>
      <td><?php echo $profesor_materia->getMateria() ?></td>
      <td><?php echo $profesor_materia->getProfesor() ?></td>
      <td><?php echo $profesor_materia->getPeriodo() ?></td>
      <td><a href="<?php echo url_for('profesorMat/alumnoCurso?id='.$profesor_materia->getGrupoidGrupo())?>"><?php echo $profesor_materia->getGrupo()->__toString()?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('profesorMat/new') ?>">New</a>
