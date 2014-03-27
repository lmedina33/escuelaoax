<?php

/**
 * Tutor form base class.
 *
 * @method Tutor getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTutorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tutor'        => new sfWidgetFormInputHidden(),
      'nombre'          => new sfWidgetFormInputText(),
      'ap_paterno'      => new sfWidgetFormInputText(),
      'ap_materno'      => new sfWidgetFormInputText(),
      'tel'             => new sfWidgetFormInputText(),
      'cel'             => new sfWidgetFormInputText(),
      'calle'           => new sfWidgetFormInputText(),
      'calle_numero'    => new sfWidgetFormInputText(),
      'clave_municipio' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Municipios'), 'add_empty' => false)),
      'clave_localidad' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Localidad'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_tutor'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_tutor', 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 80)),
      'ap_paterno'      => new sfValidatorString(array('max_length' => 80)),
      'ap_materno'      => new sfValidatorString(array('max_length' => 80)),
      'tel'             => new sfValidatorString(array('max_length' => 10)),
      'cel'             => new sfValidatorString(array('max_length' => 17)),
      'calle'           => new sfValidatorString(array('max_length' => 80)),
      'calle_numero'    => new sfValidatorInteger(),
      'clave_municipio' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Municipios'))),
      'clave_localidad' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Localidad'))),
    ));

    $this->widgetSchema->setNameFormat('tutor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tutor';
  }

}
