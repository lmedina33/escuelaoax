<h1>Cuentas List</h1>

<table>
  <thead>
    <tr>
      <th>Id cuenta</th>
      <th>Usuario</th>
      <th>Contraseña</th>
      <th>Rol</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cuentas as $cuenta): ?>
    <tr>
      <td><a href="<?php echo url_for('cuentas/edit?id_cuenta='.$cuenta->getIdCuenta()) ?>"><?php echo $cuenta->getIdCuenta() ?></a></td>
      <td><?php echo $cuenta->getUsuario() ?></td>
      <td><?php echo $cuenta->getContrasenia() ?></td>
      <td><?php echo $cuenta->getRol() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('cuentas/new') ?>">New</a>
