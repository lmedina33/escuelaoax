<?php

/**
 * Cuenta form base class.
 *
 * @method Cuenta getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCuentaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cuenta'   => new sfWidgetFormInputHidden(),
      'usuario'     => new sfWidgetFormInputText(),
      'contrasenia' => new sfWidgetFormInputText(),
      'rolid_rol'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rol'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_cuenta'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_cuenta', 'required' => false)),
      'usuario'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'contrasenia' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'rolid_rol'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Rol'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cuenta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cuenta';
  }

}
