<?php

/**
 * AlumnoProfesorMateria form.
 *
 * @package    escuela
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AlumnoProfesorMateriaForm extends BaseAlumnoProfesorMateriaForm
{
  public function configure()
  {
      $this->widgetSchema['profesor_materiaid_profesor_materia']=new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProfesorMateria'), 'add_empty' => false));
  }
}
