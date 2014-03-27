<?php

/**
 * profesor actions.
 *
 * @package    escuela
 * @subpackage reportes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reportesActions extends sfActions
{
    public function executeBoletaAlumno(sfWebRequest $request){
        $alumno=Doctrine_Core::getTable('Alumno')->find($request->getParameter('matricula'));
        $BoletaAlumno= new AlumnoPDF();
        $BoletaAlumno->setTituloDoc("BOLETA SEMESTRAL DE CALIFICACIONES");  
        $BoletaAlumno->setAlumno($alumno);
        $BoletaAlumno->ini();
        $BoletaAlumno->Output();
    }
}
