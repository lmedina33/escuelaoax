<?php

/**
 * Localidad form base class.
 *
 * @method Localidad getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseLocalidadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'clave_localidad' => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormInputText(),
      'clave_municipio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipios'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'clave_localidad' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'clave_localidad', 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 80)),
      'clave_municipio' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipios'))),
    ));

    $this->widgetSchema->setNameFormat('localidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Localidad';
  }

}
