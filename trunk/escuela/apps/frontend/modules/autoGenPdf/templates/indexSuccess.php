<script>
    $(document).ready(function(){
        $("#GenClase").click(function(){
            //alert("hola");
            $.get('AutoGenPdf/generarPdf', {clase:$("#clase").val()}, function(respuesta){
                $("#respuesta").html(respuesta);
            })
        })
    });
</script>
<h1>Auto Generador de PDFs</h1>
<fieldset>
    <legend>Generar clase</legend>
<p>Genera clases que heredand de FPDF y que tienen todos los campos que tenga una tabla de la BD,
Funciona similar a las vistas que genera automaticamente symfony</p>
<table>
    <tr><th>Generar clase para:</th><td><input type="text" size="30" id="clase"></td><td>(Nombre de una clase modelo del proyecto)</td></tr>
    <tr><td><input type="button" value="Generar Clase" id="GenClase"></td></tr>
</table>
</fieldset>
<fieldset>
    <legend>Respuesta</legend>
    <div id="respuesta"></div>
</fieldset>
<input type="button" value="Generar Todas las clases" id="GenTodas">