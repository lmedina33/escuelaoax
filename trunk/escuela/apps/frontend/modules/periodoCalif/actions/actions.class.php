<?php

/**
 * periodoCalif actions.
 *
 * @package    escuela
 * @subpackage periodoCalif
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class periodoCalifActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->variables_globaless = Doctrine::getTable('VariablesGlobales')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VariablesGlobalesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VariablesGlobalesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($variables_globales = Doctrine::getTable('VariablesGlobales')->find(array($request->getParameter('id'))), sprintf('Object variables_globales does not exist (%s).', $request->getParameter('id')));
    $this->form = new VariablesGlobalesForm($variables_globales);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($variables_globales = Doctrine::getTable('VariablesGlobales')->find(array($request->getParameter('id'))), sprintf('Object variables_globales does not exist (%s).', $request->getParameter('id')));
    $this->form = new VariablesGlobalesForm($variables_globales);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($variables_globales = Doctrine::getTable('VariablesGlobales')->find(array($request->getParameter('id'))), sprintf('Object variables_globales does not exist (%s).', $request->getParameter('id')));
    $variables_globales->delete();

    $this->redirect('periodoCalif/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $variables_globales = $form->save();

      $this->redirect('periodoCalif/edit?id='.$variables_globales->getId());
    }
  }
}
