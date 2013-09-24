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
      'periodo'             => new sfWidgetFormInputText(),
      'profesorid_profesor' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profesor'), 'add_empty' => false)),
      'materiaclave'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Materia'), 'add_empty' => true)),
      'grupoid_grupo'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_profesor_materia' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_profesor_materia', 'required' => false)),
      'periodo'             => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'profesorid_profesor' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profesor'))),
      'materiaclave'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Materia'), 'required' => false)),
      'grupoid_grupo'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'required' => false)),
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
