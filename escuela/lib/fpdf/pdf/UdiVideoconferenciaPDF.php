<?php
class UdiVideoconferenciaPDF extends FPDF{
  var $udiFormato;
  var $titulo;
  var $codigo;
  var $udiVideoconferencia;
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
  function setUdiVideoconferencia($udiVideoconferencia){
    $this->udiVideoconferencia=$udiVideoconferencia;
  }
  function Header(){
    $this->udiFormato->getCabecera();
  }
  public function ini(){
    $this->AddPage();
    //CAMPOS
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->Ln();
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->udiFormato->campo('',$this->udiVideoconferencia->get());
    $this->Ln();
    //RELACIONES
    $this->udiFormato->campo('Per Datos Personales',$this->udiVideoconferencia->getPerDatosPersonales());
    $this->Ln();
    $this->udiFormato->campo('Per Datos Personales_2',$this->udiVideoconferencia->getPerDatosPersonales_2());
    $this->Ln();
  }
}
?>
