<?php

/**
 * semestre actions.
 *
 * @package    escuela
 * @subpackage semestre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class semestreActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->semestres = Doctrine::getTable('Semestre')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SemestreForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SemestreForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($semestre = Doctrine::getTable('Semestre')->find(array($request->getParameter('id_semestre'))), sprintf('Object semestre does not exist (%s).', $request->getParameter('id_semestre')));
    $this->form = new SemestreForm($semestre);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($semestre = Doctrine::getTable('Semestre')->find(array($request->getParameter('id_semestre'))), sprintf('Object semestre does not exist (%s).', $request->getParameter('id_semestre')));
    $this->form = new SemestreForm($semestre);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($semestre = Doctrine::getTable('Semestre')->find(array($request->getParameter('id_semestre'))), sprintf('Object semestre does not exist (%s).', $request->getParameter('id_semestre')));
    $semestre->delete();

    $this->redirect('semestre/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $semestre = $form->save();

      $this->redirect('semestre/edit?id_semestre='.$semestre->getIdSemestre());
    }
  }
}
