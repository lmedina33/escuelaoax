<h1>Semestres List</h1>

<table>
  <thead>
    <tr>
      <th>Id semestre</th>
      <th>Periodo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($semestres as $semestre): ?>
    <tr>
      <td><a href="<?php echo url_for('semestre/edit?id_semestre='.$semestre->getIdSemestre()) ?>"><?php echo $semestre->getIdSemestre() ?></a></td>
      <td><?php echo $semestre->getPeriodo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('semestre/new') ?>">New</a>
