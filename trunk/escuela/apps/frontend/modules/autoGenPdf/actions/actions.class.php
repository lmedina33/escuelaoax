<?php

/**
 * autoGenPdf actions.
 *
 * @package    SIA
 * @subpackage autoGenPdf
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoGenPdfActions extends sfActions
{
 public function executePdf(sfWebRequest $request) {
      $udiIps=Doctrine_Core::getTable("UdiVideoconferencia")->createQuery("q")->execute();
      $pdf= new UdiVideoconferenciaPDF();
      $pdf->setUdiVideoconferencia($udiIps[0]);
      $pdf->setTituloDoc("Reporte personal");
      $pdf->setCodigoDoc("PO-CIIDIROAX-04-04-F06");
      $pdf->ini();
      $pdf->Output();
      return $this->renderText("hola");
  }
  public function executeGenerarPdf(sfWebRequest $request){
    $auto= new AutoGenReportes();
    $auto->GenerarReporte($request->getParameter('clase'));
    return $this->renderText("archivo generado");
  }
  public function executeEstructura(sfWebRequest $request){
      $auto= new AutoGenReportes();
      $clase=$auto->buscarClase2('UdiVideoconferencia');
      $estructura=$auto->crearEstructura($clase,'videoconferencia', '_form');
      //$auto->GenerarReporte('UdiVideoconferencia', $estructura);
  }
  public function executeTestpdf(sfWebRequest $request) {
      $vd=Doctrine_Core::getTable('UdiVideoconferencia')->find($request->getParameter('id'));
      $pdf= new UdiVideoconferenciaPDF();
      $pdf->setTituloDoc('prueba');
      $pdf->setCodigoDoc('code');
      $pdf->setUdiVideoconferencia($vd);
      $pdf->ini();
      $pdf->Output();
      
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$auto= new AutoGenReportes();
    //$auto->GenerarReporte($request->getParameter('clase'));
  }
}
