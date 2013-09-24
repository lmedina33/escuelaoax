<?php

/**
 * materia actions.
 *
 * @package    escuela
 * @subpackage materia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class materiaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->materias = Doctrine::getTable('Materia')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MateriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MateriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($materia = Doctrine::getTable('Materia')->find(array($request->getParameter('clave'))), sprintf('Object materia does not exist (%s).', $request->getParameter('id_materia')));
    $this->form = new MateriaForm($materia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($materia = Doctrine::getTable('Materia')->find(array($request->getParameter('clave'))), sprintf('Object materia does not exist (%s).', $request->getParameter('id_materia')));
    $this->form = new MateriaForm($materia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($materia = Doctrine::getTable('Materia')->find(array($request->getParameter('id_materia'))), sprintf('Object materia does not exist (%s).', $request->getParameter('id_materia')));
    $materia->delete();

    $this->redirect('materia/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $materia = $form->save();

      $this->redirect('materia/edit?clave='.$materia->getClave());
    }
  }
}
