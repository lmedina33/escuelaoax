<?php

/**
 * Grupo form base class.
 *
 * @method Grupo getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseGrupoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_grupo'  => new sfWidgetFormInputHidden(),
      'semestre'  => new sfWidgetFormInputText(),
      'num_grupo' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_grupo'  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_grupo', 'required' => false)),
      'semestre'  => new sfValidatorInteger(array('required' => false)),
      'num_grupo' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('grupo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grupo';
  }

}
