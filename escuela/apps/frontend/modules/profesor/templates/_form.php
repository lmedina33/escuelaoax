<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('profesor/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_profesor='.$form->getObject()->getIdProfesor() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('profesor/index') ?>">Regresar a la lista</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Borrar', 'profesor/delete?id_profesor='.$form->getObject()->getIdProfesor(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre']->renderLabel('Nombre:') ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ap_paterno']->renderLabel('Apellido paterno:') ?></th>
        <td>
          <?php echo $form['ap_paterno']->renderError() ?>
          <?php echo $form['ap_paterno'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ap_materno']->renderLabel('Apellido materno:') ?></th>
        <td>
          <?php echo $form['ap_materno']->renderError() ?>
          <?php echo $form['ap_materno'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
