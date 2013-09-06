<?php

/**
 * ProfesorMateria form base class.
 *
 * @method ProfesorMateria getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfesorMateriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_profesor_materia' => new sfWidgetFormInputHidden(),
      'materiaid_materia'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Materia'), 'add_empty' => false)),
      'profesorid_profesor' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profesor'), 'add_empty' => false)),
      'anio'                => new sfWidgetFormInputText(),
      'semestreid_semestre' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Semestre'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_profesor_materia' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_profesor_materia', 'required' => false)),
      'materiaid_materia'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Materia'))),
      'profesorid_profesor' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profesor'))),
      'anio'                => new sfValidatorInteger(array('required' => false)),
      'semestreid_semestre' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Semestre'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profesor_materia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfesorMateria';
  }

}
