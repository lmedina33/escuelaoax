<?php
/**
 *formato generico  y ademas contiene un conjunto de funciones para agregar los
 *elementos comunes que se usan en los formatos (checkeds, campos de texto, areas de texto, tablas)
 * ayudando a desarrollarlos en menos tiempo y con menos codigo
 */
class FormatoGeneric{
    var $class;
    public function __construct(FPDF $claseSolicitante) {
        $this->class= $claseSolicitante;
    }
    public function getCabecera(){
        $this->class->SetFont('Arial','B',12);
        $this->class->Image('images/IPN_Logo.png', 17, 10, 17, 25);
        
        $wTitulo=$this->class->GetStringWidth($this->class->titulo);
        
        $this->class->SetFont('Arial','B',10);
        $wCodigo=$this->class->GetStringWidth($this->class->codigo);
        
        

        $this->class->Cell(26);
        $this->class->SetFont('Arial', 'B', 12);
        $this->class->Cell(123, $this->class->FontSize+1,utf8_decode("INSTITUTO POLITÉCNICO NACIONAL"),0,1,'C');
        $this->class->Cell(26);
        $this->class->Cell(123, $this->class->FontSize+1,utf8_decode("Centro Interdisciplinario de Investigación"),0,1,'C');
        $this->class->Cell(26);
        $this->class->Cell(123, $this->class->FontSize+1,utf8_decode("para el Desarrollo Integral Regional Unidad Oaxaca"),0,0,'C');
        
        $this->class->SetFontSize(9);
        $this->class->Cell(40, $this->class->FontSize+1,utf8_decode($this->class->codigo),0,1,'C');
        
        $this->class->SetFont('Arial', 'B', 12);
        $this->class->Cell($this->getWFila(), 3,'',0,1);//espacio
        $this->class->Cell(26);
        $this->class->Cell(123, $this->class->FontSize+1,utf8_decode("UNIDAD DE INFORMÁTICA"),0,1,'C');
        $this->class->Cell($this->getWFila(), 3,'',0,1);//espacio
        $this->class->Cell(26);
        $this->class->SetFontSize(14);
        $this->class->Cell(123, $this->class->FontSize+1,utf8_decode($this->class->titulo),0,1,'C');
            
        $this->class->Image('images/siglas.gif', 160, 10, 30, 10);
        $this->class->SetFontSize(10);
        
        
        $this->class->Line($this->class->lMargin,$this->class->GetY(), $this->getWFila(), $this->class->GetY());
    }

    /**
     *Dibuja una etiqueta en negrita segido de un texto subrayado ocupando toda la fila
     * @param string $titulo
     * @param string $valor 
     */
    public function campoCompleto($titulo,$valor=""){
        $titulo.=":";
        $titulo=  utf8_decode($titulo);
        $this->class->SetFont('Arial', 'B', 12);
        $widthTitulo=$this->class->GetStringWidth($titulo)+($this->class->cMargin*2);
        $this->class->Cell($widthTitulo,8,$titulo,0,0,'L');
        $this->class->SetFont('Arial', 'U', 12);
        
        //$libre=$this->class->GetStringWidth($valor)%(180-$widthTitulo-5);
        $libre=$this->getWFila()-$this->class->GetX();
        $libreDespuesDeValor=$libre-($this->class->GetStringWidth($valor)+($this->class->cMargin*2));
        $espacioAgregado=1.5;
        while(true){
            if($espacioAgregado<$libreDespuesDeValor){
                $valor.=" ";
                $espacioAgregado+=$this->class->GetStringWidth(" ");
            }
            else{
                break;
            }
            
        }
        $this->class->MultiCell($libre, 8, utf8_decode($valor));

        $this->class->SetFont('Arial', '');
    }
    public function campo($titulo,$valCampo,$ln=false,$margen=null,$wCampo=null){
        $titulo=  utf8_decode($titulo.":");
        $valCampo= utf8_decode($valCampo);
        
        $this->class->SetFont('Arial','B');
        if($wCampo==null)
            $wCampo=$this->class->GetStringWidth($valCampo);
        if($margen!=null)
            $this->class->Cell($margen);
        $this->class->SetFontSize(12);
        $this->class->Cell($this->class->GetStringWidth($titulo.": "),$this->class->FontSize+2,$titulo,0,0);
        $this->class->SetFont('Arial','');
        $this->class->SetFontSize(10);
        $this->class->Cell($wCampo+2, $this->class->FontSize+2,  $valCampo,'B',0);
        if($ln)
            $this->class->Ln ();
    }
    public function campoFirma($ancho=0,$alto=1,$leyeArriba='',$leyeAbajo=''){
        $leyeArriba=  utf8_decode($leyeArriba);
        $leyeAbajo= utf8_decode($leyeAbajo);
        
        $this->class->SetFontSize(12);
        $centro=$this->class->GetX()+($ancho/2);
        //escribir la leyenda de arriba centrada
        $centroLeyArriba=$this->class->GetStringWidth($leyeArriba)/2;
        $this->class->Text($centro-$centroLeyArriba, $this->class->GetY()+$alto,$leyeArriba);
        //linea
        $this->class->Line($this->class->GetX(), $this->class->GetY()+($alto*2), $this->class->GetX()+$ancho, $this->class->GetY()+($alto*2));
        //escribir la leyenda abajo centrada
        $centroLeyAbajo=$this->class->GetStringWidth($leyeAbajo)/2;
        $this->class->Text($centro-$centroLeyAbajo, $this->class->GetY()+($alto*3),$leyeAbajo);
        $this->class->Cell($ancho, $alto*3,'',0);
    }
    public function areaTexto($margenLeft=0,$marginTop=0,$ancho=0,$alto=0,$titulo='',$valor=''){
        $titulo.=":";
        $titulo= utf8_decode($titulo);
        $valor= utf8_decode($valor);
        $tamEspacion=0;
        $tamOcupado=$this->class->GetX()+$this->class->GetStringWidth($valor)+($this->class->cMargin*4);
        while($tamOcupado+$tamEspacion < $this->class->GetX()+$ancho){
            $tamEspacion+=$this->class->GetStringWidth(" ");
            $valor.=" ";
        }
        $this->class->SetFont('Arial', 'B', '12');
        $this->class->Cell($margenLeft,$marginTop,'',0,1);
        $this->class->Cell($ancho,$alto,$titulo,0,1);
        
        $this->class->Cell($margenLeft);
        $this->class->SetFont('Arial', 'U', '12');
        $this->class->MultiCell($ancho, $alto, $valor,0);
    }
    /**
     *Dibuja un checked box
     * 
     * @param integer $x //cordenada X 
     * @param integer $y //cordenada Y
     * @param String $legenda //Texto que se colocara al lado derecho del cheked
     * @param bool $marcado //indica si se marca o no
     * @param integer $w //ancho
     * @param integer $h //alto
     */
    public function checked($x, $y, $legenda, $marcado = false, $w=3, $h=3){
        $this->class->SetFont('Arial','',12);
        $tw=$x+$w;
        $th=$y+$h;
        $this->class->Line($x, $y, $tw, $y);
        $this->class->Line($tw, $y, $tw, $th);
        $this->class->Line($x, $th, $tw, $th);
        $this->class->Line($x, $y, $x, $th);
        if($marcado){
            $this->class->SetFont('Arial','B',7);
            $this->class->SetTextColor(234, 0, 0);
            $this->class->Text($x+0.6, $y+2.3, "X");
            $this->class->SetTextColor(0, 0, 0);
            $this->class->SetFont('Arial','',12);
        }
        $this->class->Text($tw+1, $th,  utf8_decode($legenda));
        $this->class->Cell(($x-$this->class->GetX())+$w+5+$this->class->GetStringWidth($legenda), $h*2);
    }
    /**
     *Crea una tabla con los valores indicados
     * @param array $titulos
     * @param array $campos //arreglo de funciones de la entidad de doctrina en formato de String, consulta el modelo de la clase php  que manejaras para esta tabla
     * @param Doctrine_collection $entidades
     */
    public function tabla($clase,$entidades){
        $this->class->SetFontSize(5);
        $margen=5;
        $wCols=array();
        //calcular ancho adecuado para cada columna
        for($i=0;$i<count($clase['columnas']);$i++){
            
            //inicializar $wCols a 0 para la posicion $i
            $wCols[$i]=0;
            //calcular el mas ancho de cada columna
            if($this->class->GetStringWidth($clase['columnas'][$i]['campo'])>$wCols[$i]){
                $wCols[$i]=$this->class->GetStringWidth($clase['columnas'][$i]['campo']);
            }
            foreach ($entidades as $entidad) {
                eval('$valor=$entidad->get'.$clase['columnas'][$i]['campo']."();");
                if($this->class->GetStringWidth($valor)>$wCols[$i]){
                    $wCols[$i]=$this->class->GetStringWidth($valor);
                }
            }
        }
        //GENERAR TABLA
        //imprimir titulos
        for($i=0;$i<count($clase['columnas']);$i++){
            $this->class->Cell($wCols[$i]+$margen,5,  utf8_decode($clase['columnas'][$i]['campo']),1,0,'C');
            if($i+1==  count($clase['columnas'])){
                $this->class->Ln();
                $this->class->SetFont('Arial', '');
            }
        }
        foreach ($entidades as $entidad) {
            for($i=0;$i<count($clase['columnas']);$i++){
                eval(" \$valor=\$entidad->get".$clase['columnas'][$i]['campo']."();");
                $this->class->Cell($wCols[$i]+$margen, 5,$valor,1,0,'C');
                if($i+1==  count($clase['columnas'])){
                $this->class->Ln();
            }
            }
        }
        $this->class->SetFontSize(12);
        //return $wCols;
    }
    
    
    /**
     *Crea una tabla con los valores indicados, esta es una version atualizada de la funcion tabla (ya no use la funcion tabla)
     * @param array $clase //formato del arraglo  array(0=>array('titulo')=>'tu titulo','funcion'=>'funcion para este campo'),1=>array(..),2=>arra(..))
     * @param Doctrine_collection $entidades //el conjunto de entidades que seran representados como registros en esta tabla
     * @param $fontSize //el tamaño de la fuente para escribir
     * @param $margenTabla //margen izquiero de la tbla
     */
    public function tabla2($clase,$entidades,$fontSize=5,$margenTabla=5){
        $this->class->SetFontSize($fontSize);
        $margenCelda=5;
        $wCols=array();
        //calcular ancho adecuado para cada columna
        $this->class->SetFont('Arial','B',$fontSize);
        for($i=0;$i<count($clase);$i++){
            //inicializar $wCols a 0 para la posicion $i
            $wCols[$i]=0;
            //calcular el mas ancho de cada columna
            if($this->class->GetStringWidth($clase[$i]['titulo'])>$wCols[$i]){
                $wCols[$i]=$this->class->GetStringWidth($clase[$i]['titulo']);
            }
            foreach ($entidades as $entidad) {
                $this->class->SetFont('Arial','',$fontSize);
                eval('$valor=$entidad->'.$clase[$i]['funcion']."();");
                if($this->class->GetStringWidth($valor)>$wCols[$i]){
                    $wCols[$i]=$this->class->GetStringWidth($valor);
                }
            }
        }
        //GENERAR TABLA
        //imprimir titulos
        $this->class->Cell($margenTabla);
        for($i=0;$i<count($clase);$i++){
            $this->class->SetFont('Arial','B',$fontSize);
            $this->class->Cell($wCols[$i]+$margenCelda,5,  utf8_decode($clase[$i]['titulo']),1,0,'C');
            
            if($i+1==  count($clase)){//hacer salto de linea cuando se haya impreso la ultima columna
                $this->class->Ln();
                $this->class->SetFont('Arial', '');
            }
        }
        foreach ($entidades as $entidad) {
            $this->class->SetFont('Arial','',$fontSize);
            $this->class->Cell($margenTabla);
            for($i=0;$i<count($clase);$i++){
                eval(" \$valor=\$entidad->".$clase[$i]['funcion']."();");
                $this->class->Cell($wCols[$i]+$margenCelda, 5,$valor,1,0,'C');
                if($i+1==  count($clase)){//hacer salto de linea cuando se haya impreso la ultima columna
                $this->class->Ln();
            }
            }
        }
        $this->class->SetFontSize(12);
        //return $wCols;
    }
    
    
    /**
     *Devuelve el ancho de la fila para escribir en la pagina, es igual al ancho de la pagia menos los margenes izquierdo y derecho
     * @return integer 
     */
    public function getWFila(){
        return $this->class->w-($this->class->lMargin+$this->class->rMargin);
    }
    public function fieldSet($valor){
        $valor=  utf8_decode($valor);
        $this->class->SetFont('Arial','B',12);
        $this->class->SetFillColor(210, 210, 210);
        $this->class->Cell($this->getWFila()-($this->class->cMargin*4), 6,$valor, 0, 1, 'L', true);
    }
    public function fieldSet2($margenLeft=0,$margenTop=0,$valor){
        $valor=  utf8_decode($valor);
        $this->class->SetFont('Arial','B',12);
        $this->class->Cell($margenLeft,$margenTop, "",0,1);
        $this->class->Cell($margenLeft,5, "",0);
        $this->class->Cell(10, 5, $valor,0,1);
        $this->class->SetLineWidth(.5);
        $this->class->Line($this->class->lMargin+$this->class->GetX(),$this->class->GetY(), $this->getWFila(), $this->class->GetY());
        $this->class->SetLineWidth(.2);
    }
}
?>
