<?php
class PosHistoricoPDF extends FPDF{
  var $udiFormato;
  var $titulo;
  var $codigo;
  var $posHistorico;
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
  function setPosHistorico($posHistorico){
    $this->posHistorico=$posHistorico;
  }
  function Header(){
    $this->udiFormato->getCabecera();
  }
  public function ini(){
    $this->AddPage();
    //CAMPOS
    $this->udiFormato->campo('Id Pos Historico',$this->posHistorico->getIdPosHistorico());
    $this->Ln();
    $this->udiFormato->campo('Id Inv Docente Titular',$this->posHistorico->getIdInvDocenteTitular());
    $this->Ln();
    $this->udiFormato->campo('Id Inv Docente Asistentea',$this->posHistorico->getIdInvDocenteAsistentea());
    $this->Ln();
    $this->udiFormato->campo('Id Inv Docente Asistenteb',$this->posHistorico->getIdInvDocenteAsistenteb());
    $this->Ln();
    $this->udiFormato->campo('Id Inv Docente Asistentec',$this->posHistorico->getIdInvDocenteAsistentec());
    $this->Ln();
    $this->udiFormato->campo('Id Pos Asignatura',$this->posHistorico->getIdPosAsignatura());
    $this->Ln();
    $this->udiFormato->campo('Id Cat Linea Investigacion',$this->posHistorico->getIdCatLineaInvestigacion());
    $this->Ln();
    $this->udiFormato->campo('Cve Semestre',$this->posHistorico->getCveSemestre());
    $this->Ln();
    $this->udiFormato->campo('Horas Clase',$this->posHistorico->getHorasClase());
    $this->Ln();
    $this->udiFormato->campo('Aula',$this->posHistorico->getAula());
    $this->Ln();
    $this->udiFormato->campo('Anio',$this->posHistorico->getAnio());
    $this->Ln();
    $this->udiFormato->campo('Lu',$this->posHistorico->getLu());
    $this->Ln();
    $this->udiFormato->campo('Ma',$this->posHistorico->getMa());
    $this->Ln();
    $this->udiFormato->campo('Mi',$this->posHistorico->getMi());
    $this->Ln();
    $this->udiFormato->campo('Ju',$this->posHistorico->getJu());
    $this->Ln();
    $this->udiFormato->campo('Vi',$this->posHistorico->getVi());
    $this->Ln();
    $this->udiFormato->campo('Sa',$this->posHistorico->getSa());
    $this->Ln();
    //RELACIONES
    $this->udiFormato->campo('Inv Docente',$this->posHistorico->getInvDocente());
    $this->Ln();
    $this->udiFormato->campo('Inv Docente_2',$this->posHistorico->getInvDocente_2());
    $this->Ln();
    $this->udiFormato->campo('Inv Docente_3',$this->posHistorico->getInvDocente_3());
    $this->Ln();
    $this->udiFormato->campo('Inv Docente_4',$this->posHistorico->getInvDocente_4());
    $this->Ln();
    $this->udiFormato->campo('Pos Asignatura',$this->posHistorico->getPosAsignatura());
    $this->Ln();
    $this->udiFormato->campo('Cat Linea Investigacion',$this->posHistorico->getCatLineaInvestigacion());
    $this->Ln();
    $this->udiFormato->fieldSet('PosAlumnoHistorico');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdPosAlumnoHistorico'),1=>array('campo'=>'IdPosAlumno'),2=>array('campo'=>'IdPosHistorico'),3=>array('campo'=>'Semestre'),4=>array('campo'=>'Calificacion')));
    $this->udiFormato->tabla($clase,$this->posHistorico->getPosAlumnoHistorico());
    $this->Ln();
  }
}
?>
