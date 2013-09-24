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
<h1>Alumnos List</h1>

<table id="tablaIndex" borrder="1">
  <thead>
    <tr>
      <th>Id alumno</th>
      <th>Nombre</th>
      <th>Ap paterno</th>
      <th>Ap materno</th>
      <th>Id grupo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alumnos as $alumno): ?>
    <tr>
      <td><a href="<?php echo url_for('alumno/edit?matricula='.$alumno->getMatricula()) ?>"><?php echo $alumno->getMatricula() ?></a></td>
      <td><?php echo $alumno->getNombre() ?></td>
      <td><?php echo $alumno->getApPaterno() ?></td>
      <td><?php echo $alumno->getApMaterno() ?></td>
      <td><?php echo $alumno->getGrupo()->__toString() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('alumno/new') ?>">New</a>
