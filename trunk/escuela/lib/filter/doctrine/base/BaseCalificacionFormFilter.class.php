<?php

/**
 * Calificacion filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCalificacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'numero_unidad'                                     => new sfWidgetFormFilterInput(),
      'clasificacion'                                     => new sfWidgetFormFilterInput(),
      'tipo'                                              => new sfWidgetFormFilterInput(),
      'alumno_profesor_materiaid_alumno_profesor_materia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'numero_unidad'                                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'clasificacion'                                     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'tipo'                                              => new sfValidatorPass(array('required' => false)),
      'alumno_profesor_materiaid_alumno_profesor_materia' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AlumnoProfesorMateria'), 'column' => 'id_alumno_profesor_materia')),
    ));

    $this->widgetSchema->setNameFormat('calificacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Calificacion';
  }

  public function getFields()
  {
    return array(
      'id_unidad'                                         => 'Number',
      'numero_unidad'                                     => 'Number',
      'clasificacion'                                     => 'Number',
      'tipo'                                              => 'Text',
      'alumno_profesor_materiaid_alumno_profesor_materia' => 'ForeignKey',
    );
  }
}
