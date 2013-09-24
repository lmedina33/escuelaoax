<?php

/**
 * profesorMat actions.
 *
 * @package    escuela
 * @subpackage registroDiario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registroDiarioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $id=$this->getUser()->getAttribute('idProfesor');
      $this->cursos=  Doctrine_Core::getTable('ProfesorMateria')
              ->createQuery('q')
              ->where('q.profesorid_profesor='.$id)
              ->execute();
  }
  public function executeRegistroDiarioCurso(sfWebRequest $request){
      $q=Doctrine_Manager::getInstance()->getCurrentConnection();
      $idProfesorCurso=$request->getParameter('id');
      $curso=  Doctrine_Core::getTable('ProfesorMateria')->find($idProfesorCurso);
      //ordenar alumnos por apellido paterno, apellido materno, nombre
      $alumnos=$q->execute("select concat(ap_paterno,' ',ap_materno,' ',nombre) as alumno, matricula 
                    from alumno
                    where id_grupo=".$curso->getGrupo()->getIdGrupo()." order by ap_paterno,ap_materno,nombre");
      $this->alumnos=array();
      
      foreach ($alumnos as $alumno) {
          $idalumnoProfMat=$q->execute("select id_alumno_profesor_materia from alumno_profesor_materia where alumnomatricula='".$alumno['matricula'].
                  "' and profesor_materiaid_profesor_materia=".$idProfesorCurso);
          $idalumnoProfMat=$idalumnoProfMat->fetch();
          //obtener faltas para este alumno
          $faltas_unidad=$q->execute("select count(fecha) as faltas
              from reg_faltas
              where alumno_profesor_materiaid_alumno_profesor_materia =".$idalumnoProfMat['id_alumno_profesor_materia']);
          $faltas_unidad=$faltas_unidad->fetch();
          //obtenerr tareas incumplidas
          $no_tareas_unidad=$q->execute("select count(fecha) as no_tareas_unidad
              from reg_tareas_no_realizadas
              where alumno_profesor_materiaid_alumno_profesor_materia =".$idalumnoProfMat['id_alumno_profesor_materia']);
          $no_tareas_unidad=$no_tareas_unidad->fetch();
          array_push($this->alumnos,
                  array(
                      'idAlumProfMat'=>$idalumnoProfMat['id_alumno_profesor_materia'],
                      'alumno'=>$alumno['alumno'],
                      'faltas_uni'=>(int)$faltas_unidad['faltas'],
                      'no_tareas_uni'=>(int)$no_tareas_unidad['no_tareas_unidad'],
                  )
                  );
          
      }
      //$this->logMessage(print_r($this->alumnos));
  }
  public function executeDetallesFaltas(sfWebRequest $rquest){
      $this->faltas=  Doctrine_Core::getTable('RegFaltas')->findByalumno_profesor_materiaid_alumno_profesor_materia($rquest->getParameter("id"));
  }
  public function executePasarLista(sfWebRequest $request){
      $faltasAlumnos=$request->getParameter("faltaAlumno");
      $numUnidad=  Doctrine_Core::getTable('VariablesGlobales')->createQuery("q")->execute();
      $numUnidad= $numUnidad[0]->getUnidadActual();
      for($i=0;$i<count($faltasAlumnos);$i++){
          $faltaAlumno= new RegFaltas();
          $faltaAlumno->setFecha(date("Y-m-d"));
          $faltaAlumno->setNumUnidad($numUnidad);
          $faltaAlumno->setAlumnoProfesorMateriaidAlumnoProfesorMateria($faltasAlumnos[$i]);
          $faltaAlumno->save();
      }
      return $this->renderText("registro realizado correctamente");
  }
  public function executeDetallesNoTareas(sfWebRequest $request){
      $this->noTareas=  Doctrine_Core::getTable('RegTareasNoRealizadas')->findByalumno_profesor_materiaid_alumno_profesor_materia($request->getParameter("id"));
  }
  public function executeInclumplimientoTarea(sfwebrequest $request){
      $incumplimientosAulmno= $request->getParameter("incumplimientoAlumno");
      $descripcion=$request->getParameter("descripcion");
      $numUnidad=  Doctrine_Core::getTable('VariablesGlobales')->createQuery("q")->execute();
      $numUnidad= $numUnidad[0]->getUnidadActual();
      
      for($i=0;$i<count($incumplimientosAulmno);$i++){
          $incumpli= new RegTareasNoRealizadas();
          $incumpli->setFecha(date("Y-m-d"));
          $incumpli->setDescripcion($descripcion);
          $incumpli->setAlumnoProfesorMateriaidAlumnoProfesorMateria($incumplimientosAulmno[$i]);
          $incumpli->setNumUnidad($numUnidad);
          $incumpli->save();
      }
      return $this->renderText("registro realizado correctamente");
  }
  
  public function executeSubirCalificaciones(sfwebrequest $request){
      $id=$this->getUser()->getAttribute('idProfesor');
      $this->cursos=  Doctrine_Core::getTable('ProfesorMateria')
              ->createQuery('q')
              ->where('q.profesorid_profesor='.$id)
              ->execute();
  }
  public function executeCalificarCurso(sfWebRequest $request){
      $q=Doctrine_Manager::getInstance()->getCurrentConnection();
      $idProfesorCurso=$request->getParameter('id');
      $curso=  Doctrine_Core::getTable('ProfesorMateria')->find($idProfesorCurso);
      //ordenar alumnos por apellido paterno, apellido materno, nombre
      $alumnos=$q->execute("select concat(ap_paterno,' ',ap_materno,' ',nombre) as alumno, matricula 
                    from alumno
                    where id_grupo=".$curso->getGrupo()->getIdGrupo()." order by ap_paterno,ap_materno,nombre");
      $this->alumnos=array();
      
      foreach ($alumnos as $alumno) {
          $idalumnoProfMat=$q->execute("select id_alumno_profesor_materia from alumno_profesor_materia where alumnomatricula='".$alumno['matricula'].
                  "' and profesor_materiaid_profesor_materia=".$idProfesorCurso);
          $idalumnoProfMat=$idalumnoProfMat->fetch();
          //obtener faltas para este alumno
          $faltas_unidad=$q->execute("select count(fecha) as faltas
              from reg_faltas
              where alumno_profesor_materiaid_alumno_profesor_materia =".$idalumnoProfMat['id_alumno_profesor_materia']);
          $faltas_unidad=$faltas_unidad->fetch();
          //obtenerr tareas incumplidas
          $no_tareas_unidad=$q->execute("select count(fecha) as no_tareas_unidad
              from reg_tareas_no_realizadas
              where alumno_profesor_materiaid_alumno_profesor_materia =".$idalumnoProfMat['id_alumno_profesor_materia']);
          $no_tareas_unidad=$no_tareas_unidad->fetch();
          array_push($this->alumnos,
                  array(
                      'idAlumProfMat'=>$idalumnoProfMat['id_alumno_profesor_materia'],
                      'alumno'=>$alumno['alumno'],
                      'faltas_uni'=>(int)$faltas_unidad['faltas'],
                      'no_tareas_uni'=>(int)$no_tareas_unidad['no_tareas_unidad'],
                  )
                  );
    }
  }
}
