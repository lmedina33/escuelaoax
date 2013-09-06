<h1>Materias List</h1>

<table>
  <thead>
    <tr>
      <th>Id materia</th>
      <th>Nombre</th>
      <th>Cantidad unidades</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($materias as $materia): ?>
    <tr>
      <td><a href="<?php echo url_for('materia/edit?id_materia='.$materia->getIdMateria()) ?>"><?php echo $materia->getIdMateria() ?></a></td>
      <td><?php echo $materia->getNombre() ?></td>
      <td><?php echo $materia->getCantidadUnidades() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('materia/new') ?>">New</a>
