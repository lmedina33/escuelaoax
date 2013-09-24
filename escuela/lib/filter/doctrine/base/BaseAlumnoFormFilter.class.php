<?php

/**
 * Alumno filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAlumnoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'     => new sfWidgetFormFilterInput(),
      'ap_paterno' => new sfWidgetFormFilterInput(),
      'ap_materno' => new sfWidgetFormFilterInput(),
      'estatus'    => new sfWidgetFormFilterInput(),
      'id_grupo'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'     => new sfValidatorPass(array('required' => false)),
      'ap_paterno' => new sfValidatorPass(array('required' => false)),
      'ap_materno' => new sfValidatorPass(array('required' => false)),
      'estatus'    => new sfValidatorPass(array('required' => false)),
      'id_grupo'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Grupo'), 'column' => 'id_grupo')),
    ));

    $this->widgetSchema->setNameFormat('alumno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumno';
  }

  public function getFields()
  {
    return array(
      'matricula'  => 'Text',
      'nombre'     => 'Text',
      'ap_paterno' => 'Text',
      'ap_materno' => 'Text',
      'estatus'    => 'Text',
      'id_grupo'   => 'ForeignKey',
    );
  }
}
