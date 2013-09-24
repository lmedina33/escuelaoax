<?php

/**
 * RegFaltas filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRegFaltasFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha'                                             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'num_unidad'                                        => new sfWidgetFormFilterInput(),
      'alumno_profesor_materiaid_alumno_profesor_materia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fecha'                                             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'num_unidad'                                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'alumno_profesor_materiaid_alumno_profesor_materia' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'column' => 'id_alumno_profesor_materia')),
    ));

    $this->widgetSchema->setNameFormat('reg_faltas_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RegFaltas';
  }

  public function getFields()
  {
    return array(
      'id'                                                => 'Number',
      'fecha'                                             => 'Date',
      'num_unidad'                                        => 'Number',
      'alumno_profesor_materiaid_alumno_profesor_materia' => 'ForeignKey',
    );
  }
}
