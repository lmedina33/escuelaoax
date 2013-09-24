<?php

/**
 * Cuenta filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCuentaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario'     => new sfWidgetFormFilterInput(),
      'contrasenia' => new sfWidgetFormFilterInput(),
      'rolid_rol'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rol'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'usuario'     => new sfValidatorPass(array('required' => false)),
      'contrasenia' => new sfValidatorPass(array('required' => false)),
      'rolid_rol'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Rol'), 'column' => 'id_rol')),
    ));

    $this->widgetSchema->setNameFormat('cuenta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cuenta';
  }

  public function getFields()
  {
    return array(
      'id_cuenta'   => 'Number',
      'usuario'     => 'Text',
      'contrasenia' => 'Text',
      'rolid_rol'   => 'ForeignKey',
    );
  }
}
