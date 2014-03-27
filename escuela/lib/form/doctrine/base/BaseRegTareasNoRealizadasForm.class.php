<?php

/**
 * RegTareasNoRealizadas form base class.
 *
 * @method RegTareasNoRealizadas getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRegTareasNoRealizadasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'fecha'                      => new sfWidgetFormDate(),
      'descripcion'                => new sfWidgetFormInputText(),
      'num_unidad'                 => new sfWidgetFormInputText(),
      'id_alumno_profesor_materia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'fecha'                      => new sfValidatorDate(array('required' => false)),
      'descripcion'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'num_unidad'                 => new sfValidatorInteger(array('required' => false)),
      'id_alumno_profesor_materia' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('reg_tareas_no_realizadas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RegTareasNoRealizadas';
  }

}
