<?php

/**
 * profesorMat actions.
 *
 * @package    escuela
 * @subpackage logueo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class logueoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request){
      
  }
  public function executeIngresar(sfWebRequest $request){
     $usuario=$request->getParameter('usuario');
     $contrasenia=$request->getParameter('contrasenia');
     
     $userResult= Doctrine_Core::getTable('Cuenta')->createQuery('q')
             ->where("q.usuario='".$usuario."' and "."q.contrasenia='".$contrasenia."'")
             ->execute();
     
     if(count($userResult)>0){
         $rol=$userResult[0]->getRol();
         $this->logMessage($rol);
         if($rol=='profesor'){
             $profesores= $userResult[0]->getProfesor();
             $this->getUser()->setAttribute('nombre',"Prof. ".$profesores[0]->__toString());
             $this->getUser()->setAttribute($rol->getNombre(),$rol->getNombre());
             return $this->redirect('inicio/index');
         }
         else{
             $this->getUser()->setAttribute('nombre', 'Administrador');
             $this->getUser()->setAttribute($rol->getNombre(),$rol->getNombre());
             $this->redirect('inicio/index');
         }
         
     }
     /*if($usuario=="lizandro" && $contrasenia="aunquenoestas"){
         $this->getUser()->setAttribute('nombre', "Jesus Lizandro Hernandez Villannueva");
         $this->getUser()->setAttribute("profesor", "profesor");
         $this->redirect("inicio/index");
     }
     elseif($usuario=="admin" && $contrasenia=="admin"){
         $this->getUser()->setAttribute('nombe', "administrador");
         $this->getUser()->setAttribute("admin", "admin");
         $this->redirect("inicio/index");
     }*/
     else{
         $this->redirect("logueo/errorLogueo");
     }
     
  }
  public function executeErrorLogueo(sfWebRequest $request){
      
  }
  public function executeLogout(sfWebRequest $request){
      if($this->getUser()->hasAttribute("profesor"))
        $this->getUser()->offsetUnset('profesor');
      else
          $this->getUser()->offsetUnset ("admin");
      $holder=$this->getUser()->getAttributeHolder();
      $this->redirect("logueo/index");
  }
}
