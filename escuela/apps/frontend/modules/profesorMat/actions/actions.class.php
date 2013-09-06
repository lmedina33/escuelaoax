<?php

/**
 * profesorMat actions.
 *
 * @package    escuela
 * @subpackage profesorMat
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profesorMatActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->profesor_materias = Doctrine::getTable('ProfesorMateria')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProfesorMateriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProfesorMateriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($profesor_materia = Doctrine::getTable('ProfesorMateria')->find(array($request->getParameter('id_profesor_materia'))), sprintf('Object profesor_materia does not exist (%s).', $request->getParameter('id_profesor_materia')));
    $this->form = new ProfesorMateriaForm($profesor_materia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($profesor_materia = Doctrine::getTable('ProfesorMateria')->find(array($request->getParameter('id_profesor_materia'))), sprintf('Object profesor_materia does not exist (%s).', $request->getParameter('id_profesor_materia')));
    $this->form = new ProfesorMateriaForm($profesor_materia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($profesor_materia = Doctrine::getTable('ProfesorMateria')->find(array($request->getParameter('id_profesor_materia'))), sprintf('Object profesor_materia does not exist (%s).', $request->getParameter('id_profesor_materia')));
    $profesor_materia->delete();

    $this->redirect('profesorMat/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $profesor_materia = $form->save();

      $this->redirect('profesorMat/edit?id_profesor_materia='.$profesor_materia->getIdProfesorMateria());
    }
  }
}
