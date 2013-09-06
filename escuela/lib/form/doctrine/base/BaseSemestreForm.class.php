<?php

/**
 * Semestre form base class.
 *
 * @method Semestre getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSemestreForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_semestre' => new sfWidgetFormInputHidden(),
      'periodo'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_semestre' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_semestre', 'required' => false)),
      'periodo'     => new sfValidatorString(array('max_length' => 1, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('semestre[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Semestre';
  }

}
