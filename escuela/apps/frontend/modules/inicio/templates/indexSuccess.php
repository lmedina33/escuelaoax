<label>Unidad en curso:<?php echo $variablesGlobales[0]->getUnidadActual() ?></label>
<label>Semestre en curso:<?php echo $variablesGlobales[0]->getSemestreActual() ?></label>
<div id="contenedor">
    <div id="inicio">
        <div id="presentacion">
            <div id="nombreSistema">Control de Calificaciones</div>
            <div id="bienvenida"><b>Bienvenid@:</b></div>
            <div id="infoUsuario"><?php echo $sf_user->getAttribute('nombre') ?></div>
        </div>
        <div id="avisos">
            <label><b>Avisos:</b></label>
            <p>Ninguno</p>
        </div>
    </div>
</div>
