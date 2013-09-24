<?php

/**
 * Profesor filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProfesorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'          => new sfWidgetFormFilterInput(),
      'ap_paterno'      => new sfWidgetFormFilterInput(),
      'ap_materno'      => new sfWidgetFormFilterInput(),
      'cuentaid_cuenta' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cuenta'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'          => new sfValidatorPass(array('required' => false)),
      'ap_paterno'      => new sfValidatorPass(array('required' => false)),
      'ap_materno'      => new sfValidatorPass(array('required' => false)),
      'cuentaid_cuenta' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cuenta'), 'column' => 'id_cuenta')),
    ));

    $this->widgetSchema->setNameFormat('profesor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profesor';
  }

  public function getFields()
  {
    return array(
      'id_profesor'     => 'Number',
      'nombre'          => 'Text',
      'ap_paterno'      => 'Text',
      'ap_materno'      => 'Text',
      'cuentaid_cuenta' => 'ForeignKey',
    );
  }
}
