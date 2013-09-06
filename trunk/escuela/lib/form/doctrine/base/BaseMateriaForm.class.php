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
      'id_materia'        => new sfWidgetFormInputHidden(),
      'nombre'            => new sfWidgetFormInputText(),
      'cantidad_unidades' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_materia'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_materia', 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 70, 'required' => false)),
      'cantidad_unidades' => new sfValidatorInteger(array('required' => false)),
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
