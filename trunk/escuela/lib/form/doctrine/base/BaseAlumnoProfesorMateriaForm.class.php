<?php

/**
 * AlumnoProfesorMateria form base class.
 *
 * @method AlumnoProfesorMateria getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAlumnoProfesorMateriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_alumno_profesor_materia'          => new sfWidgetFormInputHidden(),
      'examen_semestral'                    => new sfWidgetFormInputText(),
      'observaciones'                       => new sfWidgetFormInputText(),
      'profesor_materiaid_profesor_materia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesorMateria'), 'add_empty' => true)),
      'alumnomatricula'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumno'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_alumno_profesor_materia'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_alumno_profesor_materia', 'required' => false)),
      'examen_semestral'                    => new sfValidatorNumber(array('required' => false)),
      'observaciones'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'profesor_materiaid_profesor_materia' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesorMateria'), 'required' => false)),
      'alumnomatricula'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Alumno'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alumno_profesor_materia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlumnoProfesorMateria';
  }

}
