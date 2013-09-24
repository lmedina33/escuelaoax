<?php

/**
 * Grupo filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseGrupoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'semestre'  => new sfWidgetFormFilterInput(),
      'num_grupo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'semestre'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'num_grupo' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('grupo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grupo';
  }

  public function getFields()
  {
    return array(
      'id_grupo'  => 'Number',
      'semestre'  => 'Number',
      'num_grupo' => 'Number',
    );
  }
}
