<?php

/**
 * VariablesGlobales form base class.
 *
 * @method VariablesGlobales getObject() Returns the current form's model object
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVariablesGlobalesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_variables_globales' => new sfWidgetFormInputHidden(),
      'eval_fecha_inicio'     => new sfWidgetFormDate(),
      'eval_fecha_fin'        => new sfWidgetFormDate(),
      'estatus'               => new sfWidgetFormInputText(),
      'unidad_actual'         => new sfWidgetFormInputText(),
      'semestre_actual'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_variables_globales' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_variables_globales', 'required' => false)),
      'eval_fecha_inicio'     => new sfValidatorDate(array('required' => false)),
      'eval_fecha_fin'        => new sfValidatorDate(array('required' => false)),
      'estatus'               => new sfValidatorInteger(array('required' => false)),
      'unidad_actual'         => new sfValidatorInteger(array('required' => false)),
      'semestre_actual'       => new sfValidatorString(array('max_length' => 1, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('variables_globales[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VariablesGlobales';
  }

}
