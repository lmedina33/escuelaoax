<?php

/**
 * Grupo form.
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GrupoForm extends BaseGrupoForm
{
  public function configure()
  {
      $this->widgetSchema['semestre']= new sfWidgetFormSelect(array("choices"=>array(1=>100,2=>200,3=>300,4=>400,5=>500,6=>600)),array());
      
      $grupos=array(1,2,3,4,5);
      $grupos=array_combine($grupos,$grupos);
      $this->widgetSchema['num_grupo']= new sfWidgetFormSelect(array("choices"=>$grupos),array());
  }
}
