<?php

/**
 * PaseDeLista form base class.
 *
 * @method PaseDeLista getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePaseDeListaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pase_de_lista'    => new sfWidgetFormInputHidden(),
      'fecha'               => new sfWidgetFormDate(),
      'id_profesor_materia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesorMateria'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_pase_de_lista'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_pase_de_lista', 'required' => false)),
      'fecha'               => new sfValidatorDate(),
      'id_profesor_materia' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesorMateria'))),
    ));

    $this->widgetSchema->setNameFormat('pase_de_lista[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaseDeLista';
  }

}
