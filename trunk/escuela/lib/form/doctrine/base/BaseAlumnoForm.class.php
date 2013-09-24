<?php

/**
 * Alumno form base class.
 *
 * @method Alumno getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAlumnoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'matricula'  => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInputText(),
      'ap_paterno' => new sfWidgetFormInputText(),
      'ap_materno' => new sfWidgetFormInputText(),
      'estatus'    => new sfWidgetFormInputText(),
      'id_grupo'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'matricula'  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'matricula', 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'ap_paterno' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ap_materno' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'estatus'    => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'id_grupo'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alumno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumno';
  }

}
