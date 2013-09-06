<?php

/**
 * alumnoProfMat actions.
 *
 * @package    escuela
 * @subpackage alumnoProfMat
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class alumnoProfMatActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->alumno_profesor_materias = Doctrine::getTable('AlumnoProfesorMateria')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AlumnoProfesorMateriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AlumnoProfesorMateriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($alumno_profesor_materia = Doctrine::getTable('AlumnoProfesorMateria')->find(array($request->getParameter('id_alumno_profesor_materia'))), sprintf('Object alumno_profesor_materia does not exist (%s).', $request->getParameter('id_alumno_profesor_materia')));
    $this->form = new AlumnoProfesorMateriaForm($alumno_profesor_materia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($alumno_profesor_materia = Doctrine::getTable('AlumnoProfesorMateria')->find(array($request->getParameter('id_alumno_profesor_materia'))), sprintf('Object alumno_profesor_materia does not exist (%s).', $request->getParameter('id_alumno_profesor_materia')));
    $this->form = new AlumnoProfesorMateriaForm($alumno_profesor_materia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($alumno_profesor_materia = Doctrine::getTable('AlumnoProfesorMateria')->find(array($request->getParameter('id_alumno_profesor_materia'))), sprintf('Object alumno_profesor_materia does not exist (%s).', $request->getParameter('id_alumno_profesor_materia')));
    $alumno_profesor_materia->delete();

    $this->redirect('alumnoProfMat/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $alumno_profesor_materia = $form->save();

      $this->redirect('alumnoProfMat/edit?id_alumno_profesor_materia='.$alumno_profesor_materia->getIdAlumnoProfesorMateria());
    }
  }
}
