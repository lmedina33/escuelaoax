<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('alumno/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_alumno='.$form->getObject()->getIdAlumno() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('alumno/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'alumno/delete?id_alumno='.$form->getObject()->getIdAlumno(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ap_paterno']->renderLabel() ?></th>
        <td>
          <?php echo $form['ap_paterno']->renderError() ?>
          <?php echo $form['ap_paterno'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ap_materno']->renderLabel() ?></th>
        <td>
          <?php echo $form['ap_materno']->renderError() ?>
          <?php echo $form['ap_materno'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['n_lista']->renderLabel() ?></th>
        <td>
          <?php echo $form['n_lista']->renderError() ?>
          <?php echo $form['n_lista'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_grupo']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_grupo']->renderError() ?>
          <?php echo $form['id_grupo'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
