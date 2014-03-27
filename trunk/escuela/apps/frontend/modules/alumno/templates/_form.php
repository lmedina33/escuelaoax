<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php echo use_stylesheet('formAlumno.css') ?>
<script>
    $(document).ready(function(){
        $("input[type=text]").change(function(){
            console.log("cambio")
            $(this).val ($(this).val().toUpperCase())
        })
        $("#alumno_fecha_nac").datepicker({
            dateFormat:"dd/mm/yy",
            yearRange:"1980:+nn",
            changeYear:true,
            changeMonth:true
        })
        //BUSCADOR  MUNICIPIO
        $( "#municipio").autocomplete({
            source: 'buscarMunicipio',
            select: function(event,ui){
                $("#id_municipio").val(ui.item.id)
                $("#divLocalidad").text("Cargando localidades, por favor espere...");
                $.get('selectLocalidades',{claveMunicipio:ui.item.id},function(resp){
                    $("#divLocalidad").html(resp)
                })
            }
        });
    })
</script>
<div id="formAlumno">
    <form>
    <fieldset>
        <legend>Datos del Alumno</legend>
        <table>
            <tfoot>
            <tr>
                <td colspan="2">
                <?php echo $form->renderHiddenFields(false) ?>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <td><?php echo $form['nombre']->renderLabel() ?></td>
                <td>
                <?php echo $form['nombre']->renderError() ?>
                <?php echo $form['nombre'] ?>
                </td>
                <td><?php echo $form['ap_paterno']->renderLabel("Apellido Paterno") ?></td>
                <td>
                <?php echo $form['ap_paterno']->renderError() ?>
                <?php echo $form['ap_paterno'] ?>
                </td>
                <td><?php echo $form['ap_materno']->renderLabel("Apellido Materno") ?></td>
                <td>
                <?php echo $form['ap_materno']->renderError() ?>
                <?php echo $form['ap_materno'] ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form['fecha_nac']->renderLabel("Fecha de Nacimiento") ?></td>
                <td>
                <?php echo $form['fecha_nac']->renderError() ?>
                <?php echo $form['fecha_nac'] ?>
                </td>
                <td><?php echo $form['id_grupo']->renderLabel("Grupo") ?></td>
                <td>
                <?php echo $form['id_grupo']->renderError() ?>
                <?php echo $form['id_grupo'] ?>
                </td>
            </tr>
            </tbody>
        </table>
  </fieldset>
    <!--DATOS DEL TUTOR-->
    <fieldset>
        <legend>Datos del Tutor</legend>
        <table>
            <tbody>
                <tr>
                    <td><?php echo $formTutor['nombre']->renderLabel("Nombre") ?></td>
                    <td>
                    <?php echo $formTutor['nombre']->renderError() ?>
                    <?php echo $formTutor['nombre'] ?>
                    </td>
                    <td><?php echo $formTutor['ap_paterno']->renderLabel("Apellido paterno") ?></td>
                    <td>
                    <?php echo $formTutor['ap_paterno']->renderError() ?>
                    <?php echo $formTutor['ap_paterno'] ?>
                    </td>
 
                    <td colspan="2"><?php echo $formTutor['ap_materno']->renderLabel("Apellido Materno") ?></td>
                    <td>
                    <?php echo $formTutor['ap_materno']->renderError() ?>
                    <?php echo $formTutor['ap_materno'] ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $formTutor['tel']->renderLabel("Telefono") ?></td>
                    <td>
                    <?php echo $formTutor['tel']->renderError() ?>
                        <input type="tel"size="1"/>-
                        <input type="tel"size="1"/>-
                        <input type="tel"size="1"/>-
                        <input type="tel"size="1"/>
                    </td>
                    <td><?php echo $formTutor['cel']->renderLabel("Celular") ?></td>
                    <td colspan="3">
                    <?php echo $formTutor['cel']->renderError() ?>
                        <input type="tel"size="2"/>-
                        <input type="tel"size="2"/>-
                        <input type="tel"size="2"/>-
                        <input type="tel"size="2"/>-
                        <input type="tel"size="2"/>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $formTutor['calle']->renderLabel("Calle") ?></td>
                    <td colspan="2">
                    <?php echo $formTutor['calle']->renderError() ?>
                    <?php echo $formTutor['calle'] ?>
                    </td>
                    <td><?php echo $formTutor['calle_numero']->renderLabel("Numero") ?></td>
                    <td>
                    <?php echo $formTutor['calle_numero']->renderError() ?>
                    <?php echo $formTutor['calle_numero'] ?>
                    </td>
                    <td><?php echo $formTutor['id_municipio']->renderLabel("Municipio") ?></td>
                    <td>
                        <?php echo $formTutor['id_municipio']->renderError() ?>
                        <input type="hidden" id="id_municipio">
                        <input type="text" id="municipio" size="30">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $formTutor['id_localidad']->renderLabel("Localidad o Colonia") ?></td>
                    <td colspan="2">
                    <?php echo $formTutor['id_localidad']->renderError() ?>
                        <div id="divLocalidad"></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
</form>
</div>
