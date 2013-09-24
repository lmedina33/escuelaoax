<script>
    $(document).ready(function(){
        $(".calif").change(function(){
            var x=$(this).attr("x")
            var suma=0;
            console.log($(".calif[x="+x+"]").length)
            for(var i=0;i<$(".calif[x="+x+"]").length;i++){
                suma+=parseInt($($(".calif[x="+x+"]")[i]).val())
            }
            console.log(suma)
            var promedio=suma/3;
            $(".promedio[x="+x+"]").text(promedio)
            
        })
    })
</script>
<div>
        <table border="1">
            <thead>
                <tr>
                    <th rowspan="2">N° lista</th>
                    <th rowspan="2">Alumno</th>
                    <th colspan="3">Unidad 1</th>
                    <th colspan="3">Unidad 2</th>
                    <th colspan="3">Unidad 3</th>
                    <th rowspan="2">Promedio</th>
                    <th rowspan="2">Examen Semestral</th>
                    <th rowspan="2">E. EO. 1</th>
                    <th rowspan="2">E. EO. 2</th>
                    <th rowspan="2">E. EO. 3</th>
                    <th rowspan="2">Calificacion final</th>
                </tr>
                <tr>
                    <th>Calif</th>
                    <th>F</th>
                    <th>In</th>
                    <th>Calif</th>
                    <th>F</th>
                    <th>In</th>
                    <th>Calif</th>
                    <th>F</th>
                    <th>In</th>
                </tr>
            </thead>
            <tbody>
                <?php $cont=1;?>
                <?php foreach($alumnos as $alumno ):?>
                <tr>
                    <td><?php echo $cont;$cont++?></td>
                    <td><?php echo $alumno['alumno']?></td>
                    <td><input type="text" size="2" x="<?php echo $cont?>" class="calif"></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" size="2" x="<?php echo $cont?>" class="calif"></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" size="2" x="<?php echo $cont?>" class="calif"></td>
                    <td></td>
                    <td></td>
                    <td><label class="promedio" x="<?php echo $cont?>"></label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php endforeach;?>
            </tbody>

        </table>
        <input type="button" value="Confirmar Pase de lista" id="confirmarPasLista">
    </div>