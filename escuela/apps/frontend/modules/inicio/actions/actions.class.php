<?php

/**
 * alumno actions.
 *
 * @package    escuela
 * @subpackage inicio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inicioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->variablesGlobales= Doctrine_Core::getTable('VariablesGlobales')->createQuery('q')->execute();
  }
}
