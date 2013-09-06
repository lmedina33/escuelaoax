<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('alumnoProfMat/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_alumno_profesor_materia='.$form->getObject()->getIdAlumnoProfesorMateria() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('alumnoProfMat/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'alumnoProfMat/delete?id_alumno_profesor_materia='.$form->getObject()->getIdAlumnoProfesorMateria(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['alumnoid_alumno']->renderLabel() ?></th>
        <td>
          <?php echo $form['alumnoid_alumno']->renderError() ?>
          <?php echo $form['alumnoid_alumno'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['profesor_materiaid_profesor_materia']->renderLabel() ?></th>
        <td>
          <?php echo $form['profesor_materiaid_profesor_materia']->renderError() ?>
          <?php echo $form['profesor_materiaid_profesor_materia'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
