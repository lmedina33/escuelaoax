<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('calificacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_unidad='.$form->getObject()->getIdUnidad() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('calificacion/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'calificacion/delete?id_unidad='.$form->getObject()->getIdUnidad(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['numero_unidad']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_unidad']->renderError() ?>
          <?php echo $form['numero_unidad'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['clasificacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['clasificacion']->renderError() ?>
          <?php echo $form['clasificacion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['asistencia']->renderLabel() ?></th>
        <td>
          <?php echo $form['asistencia']->renderError() ?>
          <?php echo $form['asistencia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fltas']->renderLabel() ?></th>
        <td>
          <?php echo $form['fltas']->renderError() ?>
          <?php echo $form['fltas'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['alumno_profesor_materiaid_alumno_profesor_materia']->renderLabel() ?></th>
        <td>
          <?php echo $form['alumno_profesor_materiaid_alumno_profesor_materia']->renderError() ?>
          <?php echo $form['alumno_profesor_materiaid_alumno_profesor_materia'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
