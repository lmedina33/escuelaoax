<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('materia/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?clave='.$form->getObject()->getClave() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('materia/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'materia/delete?clave='.$form->getObject()->getClave(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
        <tr>
            <th><?php echo $form['clave']->renderLabel()?></th>
            <td><?php echo $form['clave']?></td>
        </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['semestre']->renderLabel() ?></th>
        <td>
          <?php echo $form['semestre']->renderError() ?>
          <?php echo $form['semestre'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
