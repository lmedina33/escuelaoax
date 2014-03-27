<?php

/**
 * Calificacion form base class.
 *
 * @method Calificacion getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCalificacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'calif1'                     => new sfWidgetFormInputText(),
      'calif2'                     => new sfWidgetFormInputText(),
      'calif3'                     => new sfWidgetFormInputText(),
      'eo1'                        => new sfWidgetFormInputText(),
      'eo2'                        => new sfWidgetFormInputText(),
      'eo3'                        => new sfWidgetFormInputText(),
      'id_alumno_profesor_materia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'calif1'                     => new sfValidatorNumber(array('required' => false)),
      'calif2'                     => new sfValidatorNumber(array('required' => false)),
      'calif3'                     => new sfValidatorNumber(array('required' => false)),
      'eo1'                        => new sfValidatorNumber(array('required' => false)),
      'eo2'                        => new sfValidatorNumber(array('required' => false)),
      'eo3'                        => new sfValidatorNumber(array('required' => false)),
      'id_alumno_profesor_materia' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('calificacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Calificacion';
  }

}
