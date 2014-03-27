<?php

/**
 * Municipios form base class.
 *
 * @method Municipios getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseMunicipiosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'clave_municipio' => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'clave_municipio' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'clave_municipio', 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 80)),
    ));

    $this->widgetSchema->setNameFormat('municipios[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Municipios';
  }

}
