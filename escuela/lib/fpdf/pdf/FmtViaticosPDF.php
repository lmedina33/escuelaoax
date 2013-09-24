<?php
class FmtViaticosPDF extends FPDF{
  var $udiFormato;
  var $titulo;
  var $codigo;
  var $fmtViaticos;
  public function __construct(){
    parent::FPDF();
    $this->udiFormato=new UdiFormato($this);
  }
  /**
  *Establece el codigo del documento
  * @param string$codigo
  */
  public function setCodigoDoc($codigo){
    $this->codigo=$codigo;
  }
  /**
  *Establece el titulo que se imprimira en al cabecera de la pagina
  * @param string$titulo
  */
  public function setTituloDoc($titulo){
    $this->titulo=$titulo;
  }
  function setFmtViaticos($fmtViaticos){
    $this->fmtViaticos=$fmtViaticos;
  }
  function Header(){
    $this->udiFormato->getCabecera();
  }
  public function ini(){
    $this->AddPage();
    //CAMPOS
    $this->udiFormato->campo('Id Formato Viaticos',$this->fmtViaticos->getIdFormatoViaticos());
    $this->Ln();
    $this->udiFormato->campo('Id Per Datos Personales',$this->fmtViaticos->getIdPerDatosPersonales());
    $this->Ln();
    $this->udiFormato->campo('Comision',$this->fmtViaticos->getComision());
    $this->Ln();
    $this->udiFormato->campo('Motivo Comision',$this->fmtViaticos->getMotivoComision());
    $this->Ln();
    $this->udiFormato->campo('Medio Transporte',$this->fmtViaticos->getMedioTransporte());
    $this->Ln();
    $this->udiFormato->campo('Concepto',$this->fmtViaticos->getConcepto());
    $this->Ln();
    $this->udiFormato->campo('Nivel Aplicacion',$this->fmtViaticos->getNivelAplicacion());
    $this->Ln();
    $this->udiFormato->campo('Lugares Comision',$this->fmtViaticos->getLugaresComision());
    $this->Ln();
    $this->udiFormato->campo('Cuota Diaria',$this->fmtViaticos->getCuotaDiaria());
    $this->Ln();
    $this->udiFormato->campo('Importe',$this->fmtViaticos->getImporte());
    $this->Ln();
    $this->udiFormato->campo('Observaciones',$this->fmtViaticos->getObservaciones());
    $this->Ln();
    $this->udiFormato->campo('Cantidad',$this->fmtViaticos->getCantidad());
    $this->Ln();
    $this->udiFormato->campo('Periodo Ini',$this->fmtViaticos->getPeriodoIni());
    $this->Ln();
    $this->udiFormato->campo('Periodo Fin',$this->fmtViaticos->getPeriodoFin());
    $this->Ln();
    $this->udiFormato->campo('Tipo',$this->fmtViaticos->getTipo());
    $this->Ln();
    //RELACIONES
    $this->udiFormato->fieldSet('PerDatosPersonales');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdPerDatosPersonales'),1=>array('campo'=>'Nombre'),2=>array('campo'=>'ApPaterno'),3=>array('campo'=>'ApMaterno'),4=>array('campo'=>'Rfc'),5=>array('campo'=>'Curp'),6=>array('campo'=>'Direccion'),7=>array('campo'=>'CodigoPostal'),8=>array('campo'=>'Extension'),9=>array('campo'=>'IdCatPais'),10=>array('campo'=>'IdCatEstado'),11=>array('campo'=>'IdCatNivelEstudio'),12=>array('campo'=>'IdCatEscuela'),13=>array('campo'=>'Especialidad'),14=>array('campo'=>'Sexo'),15=>array('campo'=>'IdCatEstadoCivil'),16=>array('campo'=>'Foto'),17=>array('campo'=>'Status'),18=>array('campo'=>'ClaveCopiadora'),19=>array('campo'=>'Usuario'),20=>array('campo'=>'CtaBancaria')));
    $this->udiFormato->tabla($clase,$this->fmtViaticos->getPerDatosPersonales());
    $this->Ln();
  }
}
?>
