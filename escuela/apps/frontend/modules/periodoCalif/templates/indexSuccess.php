<h1>Variables globaless List</h1>

<table>
  <thead>
    <tr>
      <th>Eval fecha inicio</th>
      <th>Eval fecha fin</th>
      <th>Estatus</th>
      <th>Unidad actual</th>
      <th>Semestre actual</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($variables_globaless as $variables_globales): ?>
    <tr>
      <td><?php echo $variables_globales->getEvalFechaInicio() ?></td>
      <td><?php echo $variables_globales->getEvalFechaFin() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('periodoCalif/new') ?>">New</a>
