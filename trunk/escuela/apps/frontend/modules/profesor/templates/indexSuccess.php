<?php use_javascript('jquery.dataTables.min.js') ?>
<script>
    $(document).ready(function(){
        $("#tablaIndex").dataTable({
            "bFilter":  true,
            "bJQueryUI":true,
            "bPaginate": false,
            "sScrollY": '240px'
        });
    })
</script>

<h1>Profesores</h1>

<table id="tablaIndex" border="1">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellido paterno</th>
      <th>Apellido materno</th>
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

  <a href="<?php echo url_for('profesor/new') ?>">Nuevo</a>
