<?php

/**
 * VariablesGlobales form.
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VariablesGlobalesForm extends BaseVariablesGlobalesForm
{
  public function configure()
  {
      $this->widgetSchema['eval_fecha_inicio']=new sfWidgetFormInput();
      $this->widgetSchema['eval_fecha_fin']= new sfWidgetFormInput();
  }
}
