<?php
class UdiOrdenServicioPDF extends FPDF{
  var $udiFormato;
  var $titulo;
  var $codigo;
  var $udiOrdenServicio;
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
  function setUdiOrdenServicio($udiOrdenServicio){
    $this->udiOrdenServicio=$udiOrdenServicio;
  }
  function Header(){
    $this->udiFormato->getCabecera();
  }
  public function ini(){
    $this->AddPage();
    //CAMPOS
    $this->udiFormato->campo('Id Udi Orden Servicio',$this->udiOrdenServicio->getIdUdiOrdenServicio());
    $this->Ln();
    $this->udiFormato->campo('Tipo Solicitante',$this->udiOrdenServicio->getTipoSolicitante());
    $this->Ln();
    $this->udiFormato->campo('Id Per Datos Personales',$this->udiOrdenServicio->getIdPerDatosPersonales());
    $this->Ln();
    $this->udiFormato->campo('Descripcion Usuario',$this->udiOrdenServicio->getDescripcionUsuario());
    $this->Ln();
    $this->udiFormato->campo('Descripcion Personal Asignado',$this->udiOrdenServicio->getDescripcionPersonalAsignado());
    $this->Ln();
    $this->udiFormato->campo('Status',$this->udiOrdenServicio->getStatus());
    $this->Ln();
    $this->udiFormato->campo('Fecha Inicio',$this->udiOrdenServicio->getFechaInicio());
    $this->Ln();
    $this->udiFormato->campo('Fecha Fin',$this->udiOrdenServicio->getFechaFin());
    $this->Ln();
    $this->udiFormato->campo('Id Udi Tecnicos',$this->udiOrdenServicio->getIdUdiTecnicos());
    $this->Ln();
    $this->udiFormato->campo('Fecha Asignacion',$this->udiOrdenServicio->getFechaAsignacion());
    $this->Ln();
    $this->udiFormato->campo('Observacion Personal Asignado',$this->udiOrdenServicio->getObservacionPersonalAsignado());
    $this->Ln();
    $this->udiFormato->campo('Indicaciones Admin',$this->udiOrdenServicio->getIndicacionesAdmin());
    $this->Ln();
    $this->udiFormato->campo('Folio Ipn',$this->udiOrdenServicio->getFolioIpn());
    $this->Ln();
    $this->udiFormato->campo('Clasif General',$this->udiOrdenServicio->getClasifGeneral());
    $this->Ln();
    $this->udiFormato->checked($this->GetX(),$this->GetY()+2,'Mat Correct Equipo',$this->udiOrdenServicio->getMatCorrectEquipo());
    $this->Ln();
    $this->udiFormato->checked($this->GetX(),$this->GetY()+2,'Elim Virus',$this->udiOrdenServicio->getElimVirus());
    $this->Ln();
    $this->udiFormato->checked($this->GetX(),$this->GetY()+2,'Inst Sotware Inst',$this->udiOrdenServicio->getInstSotwareInst());
    $this->Ln();
    $this->udiFormato->checked($this->GetX(),$this->GetY()+2,'Reinst So',$this->udiOrdenServicio->getReinstSo());
    $this->Ln();
    $this->udiFormato->checked($this->GetX(),$this->GetY()+2,'Inst Reinst Prog Apli',$this->udiOrdenServicio->getInstReinstProgApli());
    $this->Ln();
    $this->udiFormato->checked($this->GetX(),$this->GetY()+2,'Falla Red Alambrica',$this->udiOrdenServicio->getFallaRedAlambrica());
    $this->Ln();
    $this->udiFormato->checked($this->GetX(),$this->GetY()+2,'Falla Red Inalambrica',$this->udiOrdenServicio->getFallaRedInalambrica());
    $this->Ln();
    $this->udiFormato->checked($this->GetX(),$this->GetY()+2,'Acesoria Internet',$this->udiOrdenServicio->getAcesoriaInternet());
    $this->Ln();
    $this->udiFormato->campo('Otro Equipo',$this->udiOrdenServicio->getOtroEquipo());
    $this->Ln();
    //RELACIONES
    $this->udiFormato->campo('Per Datos Personales',$this->udiOrdenServicio->getPerDatosPersonales());
    $this->Ln();
    $this->udiFormato->campo('Udi Tecnicos',$this->udiOrdenServicio->getUdiTecnicos());
    $this->Ln();
    $this->udiFormato->fieldSet('UdiColaOrdenServicio');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdUdiOrdenServicio'),1=>array('campo'=>'Pos'),2=>array('campo'=>'Id')));
    $this->udiFormato->tabla($clase,$this->udiOrdenServicio->getUdiColaOrdenServicio());
    $this->Ln();
    $this->udiFormato->fieldSet('UdiOrdenServicioEquiposReportados');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdUdiOrdenServicioEquiposReportados'),1=>array('campo'=>'IdUdiOrdenServicio'),2=>array('campo'=>'IdAlEquipoComputo'),3=>array('campo'=>'DescripcionFalla'),4=>array('campo'=>'DescripcionPersonalAsignado'),5=>array('campo'=>'ObservacionPersonalAsignado'),6=>array('campo'=>'IndicacionesAdmin')));
    $this->udiFormato->tabla($clase,$this->udiOrdenServicio->getUdiOrdenServicioEquiposReportados());
    $this->Ln();
  }
}
?>
