<?php

/**
 * alumno actions.
 *
 * @package    escuela
 * @subpackage alumno
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class alumnoActions extends sfActions
{
    //------BUSCADORES------//
    public function executeBuscarMunicipio(sfWebRequest $request){
        $this->getResponse()->setContentType('application/json');
        $municipio=Doctrine::getTable('Municipios')->findByKeyword($request->getParameter('term'),$request->getParameter('limit')); 
        return $this->renderText(json_encode($municipio));
    }
    public function executeSelectLocalidades(sfWebRequest $request){
        $clave_municipio=$request->getParameter('claveMunicipio');
        $localidades= Doctrine_Core::getTable('Localidad')->createQuery('q')
                ->where("q.clave_municipio='".$clave_municipio."'")
                ->execute();
        $selectLocalidades= "<select id='localidades'>";
        foreach ($localidades as $localidad){
            $selectLocalidades.="<option value='".$localidad->getClaveLocalidad()."'>".$localidad->getNombre()."</option>";
        }
        $selectLocalidades.="</select>";
        return $this->renderText($selectLocalidades);
    }
  public function executeIndex(sfWebRequest $request)
  {
    $this->alumnos = Doctrine::getTable('Alumno')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AlumnoForm();
    $this->formTutor= new TutorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AlumnoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($alumno = Doctrine::getTable('Alumno')->find(array($request->getParameter('matricula'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('matricula')));
    $this->form = new AlumnoForm($alumno);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($alumno = Doctrine::getTable('Alumno')->find(array($request->getParameter('matricula'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('matricula')));
    $this->form = new AlumnoForm($alumno);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($alumno = Doctrine::getTable('Alumno')->find(array($request->getParameter('matricula'))), sprintf('Object alumno does not exist (%s).', $request->getParameter('matricula')));
    $alumno->delete();

    $this->redirect('alumno/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $alumno = $form->save();

      $this->redirect('alumno/edit?matricula='.$alumno->getMatricula());
    }
  }
  
  public function  executeMunicipio(sfWebRequest $request){
      $id= $request->getParameter('id');
      $alumno= Doctrine_Core::getTable('Alumno')->find($id);
      $pdf= new AlumnoPDF();
      $pdf->setAlumno($alumno);
      $pdf->ini();
      $pdf->Output();
  }
}