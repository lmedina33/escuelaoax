<?php

/**
 * ProfesorMateria filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfesorMateriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'periodo'             => new sfWidgetFormFilterInput(),
      'profesorid_profesor' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profesor'), 'add_empty' => true)),
      'materiaclave'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Materia'), 'add_empty' => true)),
      'grupoid_grupo'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'periodo'             => new sfValidatorPass(array('required' => false)),
      'profesorid_profesor' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Profesor'), 'column' => 'id_profesor')),
      'materiaclave'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Materia'), 'column' => 'clave')),
      'grupoid_grupo'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Grupo'), 'column' => 'id_grupo')),
    ));

    $this->widgetSchema->setNameFormat('profesor_materia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfesorMateria';
  }

  public function getFields()
  {
    return array(
      'id_profesor_materia' => 'Number',
      'periodo'             => 'Text',
      'profesorid_profesor' => 'ForeignKey',
      'materiaclave'        => 'ForeignKey',
      'grupoid_grupo'       => 'ForeignKey',
    );
  }
}
