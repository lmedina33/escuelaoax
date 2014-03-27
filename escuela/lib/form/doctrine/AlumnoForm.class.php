<?php

/**
 * Alumno form.
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AlumnoForm extends BaseAlumnoForm
{
  public function configure()
  {
      $this->widgetSchema['matricula']= new sfWidgetFormInputText();
      $this->widgetSchema['fecha_nac']= new sfWidgetFormInputText();
      $this->widgetSchema['id_grupo']=new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Grupo'), 'add_empty' => false));
      
      //validadores
      $this->validatorSchema['matricula']= new sfValidatorString();
  }
}
