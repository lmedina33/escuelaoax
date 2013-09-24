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
<h1>Materias List</h1>

<table id="tablaIndex" border="1">
  <thead>
    <tr>
      <th>clave</th>
      <th>Nombre</th>
      <th>Semestre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($materias as $materia): ?>
    <tr>
      <td><a href="<?php echo url_for('materia/edit?clave='.$materia->getClave()) ?>"><?php echo $materia->getClave() ?></a></td>
      <td><?php echo $materia->getNombre() ?></td>
      <td><?php echo $materia->getSemestre()?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('materia/new') ?>">New</a>
