<table>
    <tr>
        <td><b>Alumno:</b></td>
    </tr>
    <tr><td><?php echo $faltas[0]->getAlumnoProfesorMateria()->getAlumno()?></td></tr>
</table>

<table class="tabla1">
    <thead>
        <tr>
            <th>N°</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php $cont=1?>
        <?php foreach ($faltas as $falta):?>
        <tr class="<?php if($cont%2==0){ echo 'tr2';} else{ echo 'tr1';}?>">
            <td><?php echo $cont;$cont++?></td>
            <td><?php echo date("d/m/Y", strtotime($falta->getFecha()))?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>