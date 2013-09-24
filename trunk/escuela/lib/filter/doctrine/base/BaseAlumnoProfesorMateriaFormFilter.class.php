<?php

/**
 * AlumnoProfesorMateria filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAlumnoProfesorMateriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'examen_semestral'                    => new sfWidgetFormFilterInput(),
      'observaciones'                       => new sfWidgetFormFilterInput(),
      'profesor_materiaid_profesor_materia' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesorMateria'), 'add_empty' => true)),
      'alumnomatricula'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alumno'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'examen_semestral'                    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'observaciones'                       => new sfValidatorPass(array('required' => false)),
      'profesor_materiaid_profesor_materia' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProfesorMateria'), 'column' => 'id_profesor_materia')),
      'alumnomatricula'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Alumno'), 'column' => 'matricula')),
    ));

    $this->widgetSchema->setNameFormat('alumno_profesor_materia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlumnoProfesorMateria';
  }

  public function getFields()
  {
    return array(
      'id_alumno_profesor_materia'          => 'Number',
      'examen_semestral'                    => 'Number',
      'observaciones'                       => 'Text',
      'profesor_materiaid_profesor_materia' => 'ForeignKey',
      'alumnomatricula'                     => 'ForeignKey',
    );
  }
}
