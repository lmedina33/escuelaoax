<h1>Detalles tareas no realizadas</h1>
<table border="1">
    <thead>
        <tr>
            <th>N°</th>
            <th>Fecha</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        <?php $cont=1?>
        <?php foreach ($noTareas as $tarea):?>
        <tr>
            <td><?php echo $cont;$cont++?></td>
            <td><?php echo $tarea->getFecha()?></td>
            <td><?php echo $tarea->getDescripcion()?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>