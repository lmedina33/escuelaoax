<?php use_stylesheet("registroDiario.css");?>
<script>
$(document).ready(function(){
    $("#noTarea").hide()

    $("#btnPasarLista").click(function(){
            $("#pasarLista").show()
            $("#noTarea").hide()
    })
    $("#btnNoTarea").click(function(){
        $("#pasarLista").hide()
        $("#noTarea").show()
    })

    //formularios emergentes
    var formFaltasAcum=$("#formFaltasAcum").dialog({
        title:"Faltas acumuladas en la unidad",
        width: 400,
        draggable: true,
        resizable:false,
        modal: true,
        autoOpen: false,
        //////EVENTOS/////////
        open: function(event,ui){
        },
        close: function(event,ui){
        },
        hide: 'fade'
     })
     
     $(".faltasAcum").click(function(){
         $.get('<?php echo url_for("registroDiario/detallesFaltas")?>',{id:$(this).attr("idalumcurso")},function(resp){
             $("#formFaltasAcum").html(resp)
             formFaltasAcum.dialog("open")
         })
     })

    
    //confirmar pase de lista
    $("#confirmarPasLista").click(function(){
        var faltaAlumno= Array()
        
        $(".asistencia:not(:checked)").each(
            function ()
            {
                faltaAlumno.push($(this).attr("idalumcurso"))
            });
        console.log(faltaAlumno)
        $.get('<?php echo url_for('registroDiario/pasarLista')?>',{faltaAlumno:faltaAlumno},function(resp){
            for(var i=0;i<faltaAlumno.length;i++){
                var faltasAcum=parseInt($(".faltasAcum[idAlumCurso="+faltaAlumno[i]+"]").text())
                $(".faltasAcum[idAlumCurso="+faltaAlumno[i]+"]").text(faltasAcum+1)
            }
            alert("se a registrado el pase de lista")
        })
    })
    
    //confirmar tareas no realizadas
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

<!--Formularios emergentes-->
<div id="formFaltasAcum"></div>
<!--Fin formularios emergentes-->

<div id="cabecera">
    <table>
        <tr>
            <td colspan="5"><h1>Registro Diario</h1></td>
        </tr>
        <tr>
            <th><h3>GRUPO:</h3></th><td><?php echo $curso->getGrupo()->__toString()?></td>
            <td style="width: 20%"></td>
            <th><h3>MATERIA:</h3></th><td><?php echo $curso->getMateria()?></td>
        </tr>
    </table>

    <input type="hidden" id="idCurso" value="<?php echo $curso->getIdProfesorMateria() ?>">
</div>
<div id="botones">
    <button class="btn" id="btnPasarLista" title="Pase de lista">
        <div id="imgPasarLista"></div>
    </button>
    <button class="btn" id="btnNoTarea" title="Registrar incumplimiento de tareas">
        <div id="imgNoTarea"></div>
    </button>
</div>
<div id="contenedorListas">
    <div id="pasarLista">
        <table class="tabla1">
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
                <tr class="<?php if($cont%2==0){ echo 'tr2';} else{ echo 'tr1';}?>">
                    <td class="tdCentrado"><?php echo $cont;$cont++?></td>
                    <td><?php echo $alumno['alumno']?></td>
                    <td class="tdCentrado">
                        <?php if($alumno["faltas_uni"]==0):?>
                        <?php echo $alumno["faltas_uni"]?>
                        <?php else:?>
                        <label class="faltasAcum detalles" idAlumCurso="<?php echo $alumno["idAlumProfMat"]?>" ><?php echo $alumno["faltas_uni"]?></label>
                        <?php endif;?>
                    </td>
                    <td class="tdCentrado"><input type="checkbox" class="asistencia" idAlumCurso="<?php echo $alumno["idAlumProfMat"]?>"></td>
                </tr>
                <?php endforeach;?>
            </tbody>

        </table>
        <input type="button" value="Confirmar Pase de lista" id="confirmarPasLista">
    </div>
    <div id="noTarea">
        <table id="descNoTarea">
            <tr>
                <th>Descripcion de la tarea no entregada:</th>
                <td><textarea cols="50" id="descripcion"></textarea></td>
            </tr>
        </table>
        <table class="tabla1">
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
                <tr class="<?php if($cont%2==0){ echo 'tr2';} else{ echo 'tr1';}?>">
                    <td class="tdCentrado"><?php echo $cont;$cont++?></td>
                    <td><?php echo $alumno['alumno']?></td>
                    <td class="tdCentrado">
                        <?php if($alumno["no_tareas_uni"]==0):?>
                        <?php echo $alumno["no_tareas_uni"]?>
                        <?php else:?>
                        <a idAlumCurso="<?php echo $alumno["idAlumProfMat"]?>" href=<?php echo url_for("registroDiario/detallesNoTareas?id=".$alumno["idAlumProfMat"])?>><?php echo $alumno["no_tareas_uni"]?></a>
                        <?php endif;?>
                    </td>
                    <td class="tdCentrado"><input type="checkbox" class="noTarea" idAlumCurso="<?php echo $alumno["idAlumProfMat"]?>"></td>
                </tr>
                <?php endforeach;?>
            </tbody>

        </table>
        <input type="button" value="Confirmar Incumplimientos" id="confirmarIncumplimientos">
    </div>
</div>