<script>
$(document).ready(function(){
    //poner el foco al primer checked button
    $(".asistencia")[0].focus()
    //tabs
    $( "#tabs" ).tabs();
    
    
    //confirmar pase de lista
    $("#confirmarPasLista").click(function(){
        var faltaAlumno= Array()
        
        $(".asistencia:not(:checked)").each(
            function ()
            {
                faltaAlumno.push($(this).attr("idalumcurso"))
            });
        console.log(faltaAlumno)
        $.get('<?php echo url_for('registroDiario/pasarLista')?>',{faltaAlumno:faltaAlumno},function(){
            alert("se a registrado el pase de lista")
        })
    })
    
    //confirmar adeudo de tareas
    $("#confirmarIncumplimientos").click(function(){
        var incumplimientoAlumno= Array()
        
        $(".noTarea:checked").each(
            function ()
            {
                incumplimientoAlumno.push($(this).attr("idalumcurso"))
            });
        console.log(incumplimientoAlumno)
        $.get('<?php echo url_for('registroDiario/inclumplimientoTarea')?>',{incumplimientoAlumno:incumplimientoAlumno,descripcion:$("#descripcion").val()},function(){
            alert("se a registraron las tareas no realizadas")
        })
    })
    
    
})
</script>
<h1>Grupo <?php //echo $grupo->__toString() ?></h1>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Pase de lista</a></li>
        <li><a href="#tabs-2">Registro de incumplimiento de tareas</a></li>
    </ul>
    <div id="tabs-1">
        <table border="1">
            <thead>
                <tr>
                    <th>N° lista</th>
                    <th>Alumno</th>
                    <th>N° faltas acumuladas en la Unidad</th>
                    <th>Asistencia</th>
                </tr>
            </thead>
            <tbody>
                <?php $cont=1;?>
                <?php foreach($alumnos as $alumno ):?>
                <tr>
                    <td><?php echo $cont;$cont++?></td>
                    <td><?php echo $alumno['alumno']?></td>
                    <td>
                        <?php if($alumno["faltas_uni"]==0):?>
                        <?php echo $alumno["faltas_uni"]?>
                        <?php else:?>
                        <a href=<?php echo url_for("registroDiario/detallesFaltas?id=".$alumno["idAlumProfMat"])?>><?php echo $alumno["faltas_uni"]?></a>
                        <?php endif;?>
                    </td>
                    <td><input type="checkbox" class="asistencia" idAlumCurso="<?php echo $alumno["idAlumProfMat"]?>"></td>
                </tr>
                <?php endforeach;?>
            </tbody>

        </table>
        <input type="button" value="Confirmar Pase de lista" id="confirmarPasLista">
    </div>
    <div id="tabs-2">
        <table border="1">
            <thead>
                <tr>
                    <th>N° lista</th>
                    <th>Alumno</th>
                    <th>N° Incumplimentos de tareas en la Unidad</th>
                    <th>No trajo tarea</th>
                </tr>
            </thead>
            <tbody>
                <?php $cont=1;?>
                <?php foreach($alumnos as $alumno ):?>
                <tr>
                    <td><?php echo $cont;$cont++?></td>
                    <td><?php echo $alumno['alumno']?></td>
                    <td>
                        <?php if($alumno["no_tareas_uni"]==0):?>
                        <?php echo $alumno["no_tareas_uni"]?>
                        <?php else:?>
                        <a href=<?php echo url_for("registroDiario/detallesNoTareas?id=".$alumno["idAlumProfMat"])?>><?php echo $alumno["no_tareas_uni"]?></a>
                        <?php endif;?>
                    </td>
                    <td><input type="checkbox" class="noTarea" idAlumCurso="<?php echo $alumno["idAlumProfMat"]?>"></td>
                </tr>
                <?php endforeach;?>
            </tbody>

        </table>
        <div>
            <table>
                <tr>
                    <th>Descripcion de la tarea no entregada:</th>
                    <td><textarea cols="50" id="descripcion"></textarea></td>
                </tr>
            </table>
        </div>
        <input type="button" value="Confirmar Icumplimientos" id="confirmarIncumplimientos">
    </div>
</div>