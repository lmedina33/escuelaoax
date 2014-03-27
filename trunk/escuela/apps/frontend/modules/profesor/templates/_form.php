<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div id="formProfesor">
<form>
  <fieldset>
      <legend>Datos del Profesor</legend>
    <table>
        <tfoot>
        <tr>
            <td colspan="2">
            <?php echo $form->renderHiddenFields(false) ?>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php echo $form->renderGlobalErrors() ?>
        <tr>
            <td><?php echo $form['nombre']->renderLabel('Nombre') ?></td>
            <td>
            <?php echo $form['nombre']->renderError() ?>
            <?php echo $form['nombre'] ?>
            </td>
            <td><?php echo $form['ap_paterno']->renderLabel('Apellido paterno') ?></td>
            <td>
            <?php echo $form['ap_paterno']->renderError() ?>
            <?php echo $form['ap_paterno'] ?>
            </td>
            <td><?php echo $form['ap_materno']->renderLabel('Apellido materno') ?></td>
            <td>
            <?php echo $form['ap_materno']->renderError() ?>
            <?php echo $form['ap_materno'] ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form['tel']->renderLabel('Telefono') ?></td>
            <td>
            <?php echo $form['tel']->renderError() ?>
            <?php echo $form['tel'] ?>
            </td>
            <td><?php echo $form['cel']->renderLabel('Celular') ?></td>
            <td>
            <?php echo $form['cel']->renderError() ?>
            <?php echo $form['cel'] ?>
            </td>
        </tr>
        </tbody>
    </table>
  </fieldset>
  <fieldset>
      <table>
          <tr>
            <td><?php echo $formCuenta['usuario']->renderLabel('Usuario') ?></td>
            <td>
            <?php echo $formCuenta['usuario']->renderError() ?>
            <?php echo $formCuenta['usuario'] ?>
            </td>
            <td><?php echo $formCuenta['contrasenia']->renderLabel('Contraseña') ?></td>
            <td>
            <?php echo $formCuenta['contrasenia']->renderError() ?>
            <?php echo $formCuenta['contrasenia'] ?>
            </td>
          </tr>
      </table>
  </fieldset>
</form>
</div>