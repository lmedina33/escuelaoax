<?php

/**
 * Tutor form.
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TutorForm extends BaseTutorForm
{
  public function configure()
  {
      $this->getWidget('calle')->setAttribute('size', 40);
      $this->getWidget('calle_numero')->setAttribute('size', 3);
      $this->widgetSchema['id_municipio']= new sfWidgetFormInputText(array(),array('size'=>40));
      $this->widgetSchema['id_localidad']= new sfWidgetFormInputText(array(),array('size'=>40));
  }
}
