<h1>Detalles faltas</h1>
<table border="1">
    <thead>
        <tr>
            <th>N°</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php $cont=1?>
        <?php foreach ($faltas as $falta):?>
        <tr>
            <td><?php echo $cont;$cont++?></td>
            <td><?php echo $falta->getFecha()?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>