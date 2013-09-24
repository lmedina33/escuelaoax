<h1>Grupo <?php echo ($grupo->getSemestre()*100)+$grupo->getNumGrupo()?></h1>

<table border="1">
    <thead>
        <tr>
            <th>N° lista</th>
            <th>Alumno</th>
        </tr>
    </thead>
    <tbody>
        <?php $cont=1;?>
        <?php foreach ($grupo->getAlumno() as $alumno):?>
        <tr>
            <td><?php echo $cont ?></td>
            <td><?php echo $alumno->getApPaterno()." ".$alumno->getApMaterno()." ".$alumno->getNombre() ?></td>
        </tr>
        <?php $cont++?>
        <?php endforeach;?>
    </tbody>
</table>
