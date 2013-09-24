<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <!--Menu-->
    <div id="encabezadoSistema">
        <div id="logoSistema"></div>
        <div id="tituloSistema"><h1>Colegio Torres Bodet Preparatoria</h1></div>
        <?php if($sf_user->getAttribute('admin')): ?>
        <div id='cssmenu'>
            <ul>
                <li class='active'><a href=<?php echo url_for('inicio/index')?>><span>Inicio</span></a></li>
                <li class='has-sub'><a href='#'><span>Catálogos</span></a>
                    <ul>
                        <li><a href=<?php echo url_for('profesor/index')?>><span>Profesores</span></a></li>
                        <li><a href=<?php echo url_for('materia/index') ?>><span>Materias</span></a></li>
                        <li><a href=<?php echo url_for('alumno/index')?>><span>Alumnos</span></a></li>
                        <li><a href=<?php echo url_for('grupo/index')?>><span>Grupos</span></a></li>  
                        <li class='last'><a href=<?php echo url_for('cuentas/index')?>><span>Cuentas de usuario</span></a></li>
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>Cursos</span></a>
                    <ul>
                        <li><a href=<?php echo url_for('periodoCalif/new')?>><span>Abrir periodo de calificaciones</span></a></li>
                        <li><a href='#'><span>Editar calificaciones</span></a></li>
                        <li><a href=<?php echo url_for('profesorMat/index')?>><span>Consultar cursos</span></a></li>
                        <li class='last'><a href='#'><span>Consultar registros diarios</span></a></li>
                    </ul>
                </li>
                <li class='has-sub'><a href='#'><span>Reportes</span></a>
                    <ul>
                        <li class='last'><a href='#'><span>Por Materia</span></a></li>
                    </ul>
                </li>
                <li class="last"><a href=<?php echo url_for('logueo/logout')?>><span>Salir</span></a></li>
            </ul>
        </div>
        <?php elseif($sf_user->getAttribute('profesor')):?>
        <div id='cssmenu'>
            <ul>
                <li class='active'><a href=<?php echo url_for('inicio/index')?>><span>Inicio</span></a></li>
                <li class='has-sub'><a href=<?php echo url_for('registroDiario/index')?>><span>Registro Diario</span></a></li>
                <li class='has-sub'><a href='<?php echo url_for('registroDiario/subirCalificaciones')?>'><span>Subir Calificaciones</span></a></li>
                <li class="last"><a href=<?php echo url_for('logueo/logout')?>><span>Salir</span></a></li>
            </ul>
        </div>
        <?php endif;?>
    </div>
      
    <?php echo $sf_content ?>
  </body>
</html>
