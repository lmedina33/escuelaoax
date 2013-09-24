<?php

/**
 * Materia form.
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MateriaForm extends BaseMateriaForm
{
  public function configure()
  {
      $this->widgetSchema['clave']= new sfWidgetFormInputText();
      $this->validatorSchema['clave']= new sfValidatorString();
  }
}
