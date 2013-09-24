<?php

/**
 * VariablesGlobales filter form base class.
 *
 * @package    escuela
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVariablesGlobalesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eval_fecha_inicio'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'eval_fecha_fin'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'estatus'               => new sfWidgetFormFilterInput(),
      'unidad_actual'         => new sfWidgetFormFilterInput(),
      'semestre_actual'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eval_fecha_inicio'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'eval_fecha_fin'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'estatus'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'unidad_actual'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'semestre_actual'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('variables_globales_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VariablesGlobales';
  }

  public function getFields()
  {
    return array(
      'id_variables_globales' => 'Number',
      'eval_fecha_inicio'     => 'Date',
      'eval_fecha_fin'        => 'Date',
      'estatus'               => 'Number',
      'unidad_actual'         => 'Number',
      'semestre_actual'       => 'Text',
    );
  }
}
