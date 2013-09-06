<h1>Profesors List</h1>

<table>
  <thead>
    <tr>
      <th>Id profesor</th>
      <th>Nombre</th>
      <th>Ap paterno</th>
      <th>Ap materno</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($profesors as $profesor): ?>
    <tr>
      <td><a href="<?php echo url_for('profesor/edit?id_profesor='.$profesor->getIdProfesor()) ?>"><?php echo $profesor->getIdProfesor() ?></a></td>
      <td><?php echo $profesor->getNombre() ?></td>
      <td><?php echo $profesor->getApPaterno() ?></td>
      <td><?php echo $profesor->getApMaterno() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('profesor/new') ?>">New</a>
