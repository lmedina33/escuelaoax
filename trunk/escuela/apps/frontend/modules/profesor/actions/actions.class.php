<?php

/**
 * profesor actions.
 *
 * @package    escuela
 * @subpackage profesor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profesorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->profesors = Doctrine::getTable('Profesor')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProfesorForm();
    $this->formCuenta= new CuentaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProfesorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($profesor = Doctrine::getTable('Profesor')->find(array($request->getParameter('id_profesor'))), sprintf('Object profesor does not exist (%s).', $request->getParameter('id_profesor')));
    $this->form = new ProfesorForm($profesor);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($profesor = Doctrine::getTable('Profesor')->find(array($request->getParameter('id_profesor'))), sprintf('Object profesor does not exist (%s).', $request->getParameter('id_profesor')));
    $this->form = new ProfesorForm($profesor);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($profesor = Doctrine::getTable('Profesor')->find(array($request->getParameter('id_profesor'))), sprintf('Object profesor does not exist (%s).', $request->getParameter('id_profesor')));
    $profesor->delete();

    $this->redirect('profesor/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $profesor = $form->save();

      $this->redirect('profesor/edit?id_profesor='.$profesor->getIdProfesor());
    }
  }
}
