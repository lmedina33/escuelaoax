<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cuentas/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_cuenta='.$form->getObject()->getIdCuenta() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('cuentas/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'cuentas/delete?id_cuenta='.$form->getObject()->getIdCuenta(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['usuario']->renderLabel() ?></th>
        <td>
          <?php echo $form['usuario']->renderError() ?>
          <?php echo $form['usuario'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['contrasenia']->renderLabel() ?></th>
        <td>
          <?php echo $form['contrasenia']->renderError() ?>
          <?php echo $form['contrasenia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rol']->renderLabel() ?></th>
        <td>
          <?php echo $form['rol']->renderError() ?>
          <?php echo $form['rol'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
