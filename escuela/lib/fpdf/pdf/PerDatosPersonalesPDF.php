<?php
class PerDatosPersonalesPDF extends FPDF{
  var $udiFormato;
  var $titulo;
  var $codigo;
  var $perDatosPersonales;
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
  function setPerDatosPersonales($perDatosPersonales){
    $this->perDatosPersonales=$perDatosPersonales;
  }
  function Header(){
    $this->udiFormato->getCabecera();
  }
  public function ini(){
    $this->AddPage();
    //CAMPOS
    $this->udiFormato->campo('Id Per Datos Personales',$this->perDatosPersonales->getIdPerDatosPersonales());
    $this->Ln();
    $this->udiFormato->campo('Nombre',$this->perDatosPersonales->getNombre());
    $this->Ln();
    $this->udiFormato->campo('Ap Paterno',$this->perDatosPersonales->getApPaterno());
    $this->Ln();
    $this->udiFormato->campo('Ap Materno',$this->perDatosPersonales->getApMaterno());
    $this->Ln();
    $this->udiFormato->campo('Rfc',$this->perDatosPersonales->getRfc());
    $this->Ln();
    $this->udiFormato->campo('Curp',$this->perDatosPersonales->getCurp());
    $this->Ln();
    $this->udiFormato->campo('Direccion',$this->perDatosPersonales->getDireccion());
    $this->Ln();
    $this->udiFormato->campo('Codigo Postal',$this->perDatosPersonales->getCodigoPostal());
    $this->Ln();
    $this->udiFormato->campo('Extension',$this->perDatosPersonales->getExtension());
    $this->Ln();
    $this->udiFormato->campo('Id Cat Pais',$this->perDatosPersonales->getIdCatPais());
    $this->Ln();
    $this->udiFormato->campo('Id Cat Estado',$this->perDatosPersonales->getIdCatEstado());
    $this->Ln();
    $this->udiFormato->campo('Id Cat Nivel Estudio',$this->perDatosPersonales->getIdCatNivelEstudio());
    $this->Ln();
    $this->udiFormato->campo('Id Cat Escuela',$this->perDatosPersonales->getIdCatEscuela());
    $this->Ln();
    $this->udiFormato->campo('Especialidad',$this->perDatosPersonales->getEspecialidad());
    $this->Ln();
    $this->udiFormato->campo('Sexo',$this->perDatosPersonales->getSexo());
    $this->Ln();
    $this->udiFormato->campo('Id Cat Estado Civil',$this->perDatosPersonales->getIdCatEstadoCivil());
    $this->Ln();
    $this->udiFormato->campo('Foto',$this->perDatosPersonales->getFoto());
    $this->Ln();
    $this->udiFormato->campo('Status',$this->perDatosPersonales->getStatus());
    $this->Ln();
    $this->udiFormato->campo('Clave Copiadora',$this->perDatosPersonales->getClaveCopiadora());
    $this->Ln();
    $this->udiFormato->campo('Usuario',$this->perDatosPersonales->getUsuario());
    $this->Ln();
    $this->udiFormato->campo('Cta Bancaria',$this->perDatosPersonales->getCtaBancaria());
    $this->Ln();
    //RELACIONES
    $this->udiFormato->campo('Cat Estado Civil',$this->perDatosPersonales->getCatEstadoCivil());
    $this->Ln();
    $this->udiFormato->campo('Cat Nivel Estudio',$this->perDatosPersonales->getCatNivelEstudio());
    $this->Ln();
    $this->udiFormato->campo('Cat Pais',$this->perDatosPersonales->getCatPais());
    $this->Ln();
    $this->udiFormato->campo('Cat Estado',$this->perDatosPersonales->getCatEstado());
    $this->Ln();
    $this->udiFormato->campo('Cat Escuela',$this->perDatosPersonales->getCatEscuela());
    $this->Ln();
    $this->udiFormato->fieldSet('FmtJustificante');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdFmtJustificante'),1=>array('campo'=>'IdPerDatosPersonales'),2=>array('campo'=>'Tipo'),3=>array('campo'=>'Dias'),4=>array('campo'=>'Hora'),5=>array('campo'=>'Descripcion')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getFmtJustificante());
    $this->Ln();
    $this->udiFormato->fieldSet('PerTelefono');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdPerTelefono'),1=>array('campo'=>'IdPerDatosPersonales'),2=>array('campo'=>'TipoTel'),3=>array('campo'=>'NumTel')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getPerTelefono());
    $this->Ln();
    $this->udiFormato->fieldSet('InvDocente');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdInvDocente'),1=>array('campo'=>'IdPerDatosPersonales'),2=>array('campo'=>'CveNombramiento'),3=>array('campo'=>'FechaEmisionNombramiento'),4=>array('campo'=>'FechaFinNombramiento'),5=>array('campo'=>'FechaObtencionGrado'),6=>array('campo'=>'NivelSni'),7=>array('campo'=>'FechaIngresoSni'),8=>array('campo'=>'VigenciaSni'),9=>array('campo'=>'IdCatCategoriaDocente'),10=>array('campo'=>'IdCatEscuela'),11=>array('campo'=>'IdCatLineaInvestigacionMaestria'),12=>array('campo'=>'IdCatLineaInvestigacionDoctorado')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getInvDocente());
    $this->Ln();
    $this->udiFormato->fieldSet('AlComponentesEquipoComputo');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdComponenteEquipoComputo'),1=>array('campo'=>'NumInventarioIpn'),2=>array('campo'=>'IdMarca'),3=>array('campo'=>'NumModelo'),4=>array('campo'=>'NumSerie'),5=>array('campo'=>'StatusEquipo'),6=>array('campo'=>'IdPerDatosPersonales'),7=>array('campo'=>'IdRmEspacioFisico'),8=>array('campo'=>'IdEquipoComunicaciones'),9=>array('campo'=>'IdImpresora'),10=>array('campo'=>'IdMonitor'),11=>array('campo'=>'IdMultifuncional'),12=>array('campo'=>'IdRaton'),13=>array('campo'=>'IdTeclado'),14=>array('campo'=>'IdPc'),15=>array('campo'=>'Tipo'),16=>array('campo'=>'IdEquipoComputo'),17=>array('campo'=>'TipoConexion')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getAlComponentesEquipoComputo());
    $this->Ln();
    $this->udiFormato->fieldSet('PerEmail');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdPerEmail'),1=>array('campo'=>'IdPerDatosPersonales'),2=>array('campo'=>'TipoEmail'),3=>array('campo'=>'Email')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getPerEmail());
    $this->Ln();
    $this->udiFormato->fieldSet('UdiOrdenServicio');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdUdiOrdenServicio'),1=>array('campo'=>'TipoSolicitante'),2=>array('campo'=>'IdPerDatosPersonales'),3=>array('campo'=>'IdUdiTipoServicio'),4=>array('campo'=>'DescripcionUsuario'),5=>array('campo'=>'DescripcionPersonalAsignado'),6=>array('campo'=>'Status'),7=>array('campo'=>'FechaInicio'),8=>array('campo'=>'FechaFin'),9=>array('campo'=>'IdUdiTecnicos'),10=>array('campo'=>'FechaAsignacion'),11=>array('campo'=>'ObservacionPersonalAsignado'),12=>array('campo'=>'IndicacionesAdmin'),13=>array('campo'=>'FolioIpn')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getUdiOrdenServicio());
    $this->Ln();
    $this->udiFormato->fieldSet('UdiTecnicos');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdUdiTecnicos'),1=>array('campo'=>'IdPerDatosPersonales'),2=>array('campo'=>'AreaServicio')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getUdiTecnicos());
    $this->Ln();
    $this->udiFormato->fieldSet('UdiIps');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdUdiIps'),1=>array('campo'=>'IpAddr'),2=>array('campo'=>'IdPerDatosPersonales'),3=>array('campo'=>'Uso'),4=>array('campo'=>'TipoUsuario')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getUdiIps());
    $this->Ln();
    $this->udiFormato->fieldSet('UdiVideoconferencia');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdUdiVideoconferencia'),1=>array('campo'=>'IdPerDatosPersonales'),2=>array('campo'=>'Fecha'),3=>array('campo'=>'HoraInicio'),4=>array('campo'=>'HoraFin'),5=>array('campo'=>'EcuEnlaceNombre'),6=>array('campo'=>'EcuEnlaceContactoTecNombre'),7=>array('campo'=>'EcuEnlaceContactoTecCargo'),8=>array('campo'=>'EcuEnlaceContactoTecCorreoElectronico'),9=>array('campo'=>'EcuEnlaceContactoTecExtension'),10=>array('campo'=>'Proyector'),11=>array('campo'=>'Bocinas'),12=>array('campo'=>'Microfono'),13=>array('campo'=>'BafleMovil'),14=>array('campo'=>'PersonalUdi'),15=>array('campo'=>'CoordinadorNombre'),16=>array('campo'=>'CoordinadorCorreoElectronico'),17=>array('campo'=>'CoordinadorExtension'),18=>array('campo'=>'CoordinadorAreaDepartamento'),19=>array('campo'=>'CoordinadorEcuNombre'),20=>array('campo'=>'Nombre'),21=>array('campo'=>'EcuEnlaceDireccionIp'),22=>array('campo'=>'TipoSolicitud'),23=>array('campo'=>'EcuEnlaceContactoTecTelefono'),24=>array('campo'=>'CoordinadorTelefono'),25=>array('campo'=>'CoordinadorIdPerDatosPersonales'),26=>array('campo'=>'Estatus'),27=>array('campo'=>'FechaRecepcion')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getUdiVideoconferencia());
    $this->Ln();
    $this->udiFormato->fieldSet('UdiVideoconferencia_2');
    $clase= array('columnas'=>array());
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getUdiVideoconferencia_2());
    $this->Ln();
    $this->udiFormato->fieldSet('ChPersonal');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdChPersonal'),1=>array('campo'=>'IdPerDatosPersonales'),2=>array('campo'=>'NumEmpleado'),3=>array('campo'=>'TipoPersonal'),4=>array('campo'=>'FechaIngresoSep'),5=>array('campo'=>'FechaIngresoIpn'),6=>array('campo'=>'FechaIngresoCiidir'),7=>array('campo'=>'HrsNomina'),8=>array('campo'=>'SueldoMensual'),9=>array('campo'=>'SituacionLaboral'),10=>array('campo'=>'Puesto'),11=>array('campo'=>'UltimaPromocion'),12=>array('campo'=>'AniosEfectivos'),13=>array('campo'=>'IdCatAreaAdscripcion'),14=>array('campo'=>'IdRmEspacioFisico'),15=>array('campo'=>'ClavePresupuestal'),16=>array('campo'=>'NivelPersonal'),17=>array('campo'=>'GrupoPersonal'),18=>array('campo'=>'NoCuenta')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getChPersonal());
    $this->Ln();
    $this->udiFormato->fieldSet('FmtViaticos');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdFormatoViaticos'),1=>array('campo'=>'IdPerDatosPersonales'),2=>array('campo'=>'Comision'),3=>array('campo'=>'MotivoComision'),4=>array('campo'=>'MedioTransporte'),5=>array('campo'=>'Concepto'),6=>array('campo'=>'NivelAplicacion'),7=>array('campo'=>'LugaresComision'),8=>array('campo'=>'CuotaDiaria'),9=>array('campo'=>'Importe'),10=>array('campo'=>'Observaciones'),11=>array('campo'=>'Cantidad'),12=>array('campo'=>'PeriodoIni'),13=>array('campo'=>'PeriodoFin'),14=>array('campo'=>'Tipo')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getFmtViaticos());
    $this->Ln();
    $this->udiFormato->fieldSet('AlEquipoComputo');
    $clase= array('columnas'=>array(0=>array('campo'=>'IdEquipoComputo'),1=>array('campo'=>'IdPerDatosPersonales')));
    $this->udiFormato->tabla($clase,$this->perDatosPersonales->getAlEquipoComputo());
    $this->Ln();
  }
}
?>
