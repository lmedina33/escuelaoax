<?php
class AlumnoPDF extends FPDF{
  var $formatoGeneric;
  var $titulo;
  var $codigo;
  var $alumno;
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
  function setAlumno($alumno){
    $this->alumno=$alumno;
  }
  function Header(){
    $this->formatoGeneric->getCabecera();
  }
  public function ini(){
    $this->AddPage();
    //CAMPOS
    $this->formatoGeneric->campo('Matricula',$this->alumno->getMatricula());
    $this->Ln();
    $this->formatoGeneric->campo('Nombre',$this->alumno->getNombre());
    $this->Ln();
    $this->formatoGeneric->campo('Ap Paterno',$this->alumno->getApPaterno());
    $this->Ln();
    $this->formatoGeneric->campo('Ap Materno',$this->alumno->getApMaterno());
    $this->Ln();
    $this->formatoGeneric->campo('Fecha Nac',$this->alumno->getFechaNac());
    $this->Ln();
    $this->formatoGeneric->campo('Estatus',$this->alumno->getEstatus());
    $this->Ln();
    $this->formatoGeneric->campo('Id Tutor',$this->alumno->getIdTutor());
    $this->Ln();
    $this->formatoGeneric->campo('Id Grupo',$this->alumno->getIdGrupo());
    $this->Ln();
    //RELACIONES
    $this->formatoGeneric->campo('Tutor',$this->alumno->getTutor());
    $this->Ln();
    $this->formatoGeneric->campo('Grupo',$this->alumno->getGrupo());
    $this->Ln();
    $this->formatoGeneric->fieldSet('AlumnoProfesorMateria');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdAlumnoProfesorMateria'),1=>array('campo'=>'ExamenSemestral'),2=>array('campo'=>'Observaciones'),3=>array('campo'=>'IdProfesorMateria'),4=>array('campo'=>'Matricula')));
    $this->formatoGeneric->tabla($clase,$this->alumno->getAlumnoProfesorMateria());
    $this->Ln();
  }
}
?>
