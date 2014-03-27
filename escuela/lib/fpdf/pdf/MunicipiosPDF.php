<?php
class MunicipiosPDF extends FPDF{
  var $formatoGeneric;
  var $titulo;
  var $codigo;
  var $municipios;
  public function __construct(){
    parent::FPDF();
    $this->formatoGeneric=new FormatoGeneric($this);
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
  function setMunicipios($municipios){
    $this->municipios=$municipios;
  }
  function Header(){
    $this->formatoGeneric->getCabecera();
  }
  public function ini(){
    $this->AddPage();
    //CAMPOS
    $this->formatoGeneric->campo('Clave Municipio',$this->municipios->getClaveMunicipio());
    $this->Ln();
    $this->formatoGeneric->campo('Nombre',$this->municipios->getNombre());
    $this->Ln();
    //RELACIONES
    $this->formatoGeneric->fieldSet('Localidad');
    $clase= array('columnas'=>array(0=>array('campo'=>'ClaveLocalidad'),1=>array('campo'=>'Nombre'),2=>array('campo'=>'ClaveMunicipio')));
    $this->formatoGeneric->tabla($clase,$this->municipios->getLocalidad());
    $this->Ln();
    $this->formatoGeneric->fieldSet('Tutor');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdTutor'),1=>array('campo'=>'Nombre'),2=>array('campo'=>'ApPaterno'),3=>array('campo'=>'ApMaterno'),4=>array('campo'=>'Tel'),5=>array('campo'=>'Cel'),6=>array('campo'=>'Calle'),7=>array('campo'=>'CalleNumero'),8=>array('campo'=>'IdMunicipio'),9=>array('campo'=>'IdLocalidad')));
    $this->formatoGeneric->tabla($clase,$this->municipios->getTutor());
    $this->Ln();
  }
}
?>
