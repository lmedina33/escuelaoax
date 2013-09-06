<?php

/**
 * calificacion actions.
 *
 * @package    escuela
 * @subpackage calificacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calificacionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->calificacions = Doctrine::getTable('Calificacion')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CalificacionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CalificacionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($calificacion = Doctrine::getTable('Calificacion')->find(array($request->getParameter('id_unidad'))), sprintf('Object calificacion does not exist (%s).', $request->getParameter('id_unidad')));
    $this->form = new CalificacionForm($calificacion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($calificacion = Doctrine::getTable('Calificacion')->find(array($request->getParameter('id_unidad'))), sprintf('Object calificacion does not exist (%s).', $request->getParameter('id_unidad')));
    $this->form = new CalificacionForm($calificacion);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($calificacion = Doctrine::getTable('Calificacion')->find(array($request->getParameter('id_unidad'))), sprintf('Object calificacion does not exist (%s).', $request->getParameter('id_unidad')));
    $calificacion->delete();

    $this->redirect('calificacion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $calificacion = $form->save();

      $this->redirect('calificacion/edit?id_unidad='.$calificacion->getIdUnidad());
    }
  }
}
