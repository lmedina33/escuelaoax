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
      'id_unidad'                                         => new sfWidgetFormInputHidden(),
      'numero_unidad'                                     => new sfWidgetFormInputText(),
      'clasificacion'                                     => new sfWidgetFormInputText(),
      'tipo'                                              => new sfWidgetFormInputText(),
      'alumno_profesor_materiaid_alumno_profesor_materia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_unidad'                                         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_unidad', 'required' => false)),
      'numero_unidad'                                     => new sfValidatorInteger(array('required' => false)),
      'clasificacion'                                     => new sfValidatorNumber(array('required' => false)),
      'tipo'                                              => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'alumno_profesor_materiaid_alumno_profesor_materia' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'required' => false)),
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
