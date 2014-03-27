<?php

/**
 * Profesor form base class.
 *
 * @method Profesor getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfesorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_profesor'     => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormInputText(),
      'ap_paterno'      => new sfWidgetFormInputText(),
      'ap_materno'      => new sfWidgetFormInputText(),
      'tel'             => new sfWidgetFormInputText(),
      'cel'             => new sfWidgetFormInputText(),
      'cuentaid_cuenta' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cuenta'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_profesor'     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_profesor', 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ap_paterno'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ap_materno'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'tel'             => new sfValidatorString(array('max_length' => 10)),
      'cel'             => new sfValidatorString(array('max_length' => 17)),
      'cuentaid_cuenta' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cuenta'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profesor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profesor';
  }

}
