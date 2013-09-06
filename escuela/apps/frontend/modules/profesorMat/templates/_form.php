<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('profesorMat/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_profesor_materia='.$form->getObject()->getIdProfesorMateria() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('profesorMat/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'profesorMat/delete?id_profesor_materia='.$form->getObject()->getIdProfesorMateria(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['materiaid_materia']->renderLabel() ?></th>
        <td>
          <?php echo $form['materiaid_materia']->renderError() ?>
          <?php echo $form['materiaid_materia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['profesorid_profesor']->renderLabel() ?></th>
        <td>
          <?php echo $form['profesorid_profesor']->renderError() ?>
          <?php echo $form['profesorid_profesor'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['anio']->renderLabel() ?></th>
        <td>
          <?php echo $form['anio']->renderError() ?>
          <?php echo $form['anio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['semestreid_semestre']->renderLabel() ?></th>
        <td>
          <?php echo $form['semestreid_semestre']->renderError() ?>
          <?php echo $form['semestreid_semestre'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
