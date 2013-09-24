<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('alumno/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?matricula='.$form->getObject()->getMatricula() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
            &nbsp;<?php echo link_to('Delete', 'alumno/delete?matricula='.$form->getObject()->getMatricula(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
        <tr>
        <th><?php echo $form['matricula']->renderLabel("Matricula") ?></th>
        <td>
          <?php echo $form['matricula']->renderError() ?>
          <?php echo $form['matricula'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ap_paterno']->renderLabel("Apellido Paterno") ?></th>
        <td>
          <?php echo $form['ap_paterno']->renderError() ?>
          <?php echo $form['ap_paterno'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ap_materno']->renderLabel("Apellido Materno") ?></th>
        <td>
          <?php echo $form['ap_materno']->renderError() ?>
          <?php echo $form['ap_materno'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_grupo']->renderLabel("Grupo") ?></th>
        <td>
          <?php echo $form['id_grupo']->renderError() ?>
          <?php echo $form['id_grupo'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
