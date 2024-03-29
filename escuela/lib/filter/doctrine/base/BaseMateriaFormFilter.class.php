<?php

/**
 * Materia filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseMateriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'   => new sfWidgetFormFilterInput(),
      'semestre' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'   => new sfValidatorPass(array('required' => false)),
      'semestre' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('materia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Materia';
  }

  public function getFields()
  {
    return array(
      'clave'    => 'Text',
      'nombre'   => 'Text',
      'semestre' => 'Number',
    );
  }
}
