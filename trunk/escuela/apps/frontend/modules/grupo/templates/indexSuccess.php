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
<h1>Grupos List</h1>

<table id="tablaIndex" border="1">
  <thead>
    <tr>
      <th>Id grupo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($grupos as $grupo): ?>
    <tr>
      <td><a href="<?php echo url_for('grupo/edit?id_grupo='.$grupo->getIdGrupo()) ?>"><?php echo $grupo->getIdGrupo() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('grupo/new') ?>">New</a>
