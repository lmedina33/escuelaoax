<?php

/**
 * Materia form base class.
 *
 * @method Materia getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseMateriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'clave'    => new sfWidgetFormInputHidden(),
      'nombre'   => new sfWidgetFormInputText(),
      'semestre' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'clave'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'clave', 'required' => false)),
      'nombre'   => new sfValidatorString(array('max_length' => 70, 'required' => false)),
      'semestre' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('materia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Materia';
  }

}
