<h1>Subir calificaciones</h1>

<p>Seleccione un curso...</p>
<table border="1">
  <thead>
    <tr>
      <th>Materia</th>
      <th>Grupo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cursos as $curso): ?>
    <tr>
      <td>
          <a href="<?php echo url_for('registroDiario/calificarCurso?id='.$curso->getIdProfesorMateria())?>">
              <?php echo $curso->getMateria() ?>
          </a>
      </td>
      <td><?php echo $curso->getGrupo()->__toString()?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
