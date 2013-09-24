<?php
class AutoGenReportes{
    private function identar($n){
      $n*=2;
      $identacion="";
      for($i=0;$i<$n;$i++){
          $identacion.=" ";
      }
      return $identacion;
    }
    private function quitarGuiones($key){
        $newKey="";
        for($i=0;$i<strlen($key);$i++){
            $char=substr($key, $i,1);
            if($char!='_'){
                $newKey.=$char;
            }
            else{
                $i++;
                $char=substr($key, $i,1);
                $newKey.=  strtoupper($char);
            }
        }
        $newKey= strtoupper(substr($newKey, 0,1)).  substr($newKey, 1,  strlen($newKey));
        return $newKey;
    }
    private function buscarRelacion($clase,$campo){
        echo "BUSCANDO ".$campo;
        for($i=0;$i<  count($clase['relaciones']);$i++){
            if($clase['relaciones'][$i]['campo']==$campo){
                return $i;
            }
        }
        return -1;
    }
    /**
     *Crea una etiqueta para una funcion dada
     * @param String $funcion
     * @return String $label
     */
    private function crearLabel($funcion){
        $label="";
        for($i=0;$i<strlen($funcion);$i++){
            $char=  substr($funcion, $i,1);
            if(ctype_upper($char) && $i!=0){
                $label.=" ".$char;
            }
            else{
                $label.=$char;
            }
        }
        return $label;
    }
    /**
     *Busca en el archivo schema.yml la clase indicada, para devolver un array 
     * con el nombre de las funciones que tiene, el nombre de la clase, y el
     * nombre de variable que se tiene que usar para contruir la clase PDF
     * @param String $nombreClase
     * @return array $clase
     */
    public function buscarClase($nombreClase){
        $camposClase= false;
        $relacionesClase=false;
        $tempCampo="";
        $temeCampoRela="";
        $varEntidad= strtolower(substr($nombreClase, 0,1)).substr($nombreClase, 1,  strlen($nombreClase));
        $clase= array('clase'=>$nombreClase,'var'=>$varEntidad);
        $clase['columnas']= array();
        $clase['relaciones']=array();
        
        $schema= fopen(getcwd().'/../config/doctrine/schema.yml','rb');
        
        while(!feof($schema)){
            $linea=  fgets($schema);
            $posPuntos= strpos($linea, ":");
            $key= substr($linea, 0,$posPuntos);
            if($key==$nombreClase){
                //echo $key."<br>";
                $camposClase=true;
            }
            //imprimir campo
            else if($camposClase && substr_count($key, " ")==4){
                $newKey="";
                for($i=0;$i<strlen($key);$i++){
                    $char=substr($key, $i,1);
                    if($char!='_'){
                            $newKey.=$char;
                    }
                    else{
                        $i++;
                        $char=substr($key, $i,1);
                        $newKey.=  strtoupper($char);
                    }
                }
                $newKey= str_replace(" ", "", $newKey);
                $newKey= strtoupper(substr($newKey, 0,1)).  substr($newKey, 1,  strlen($newKey));
                //echo $newKey."<br>";
                $tempCampo=$newKey;
            }
            //obtener el tipo del campo
            else if($camposClase && substr_count($key, " ")==6 && $key=='      type'){
                $valor=  substr($linea, $posPuntos+1, strlen($linea));
                $posParentesis= strpos($valor, "(");
                $valor=  substr($valor,0,$posParentesis);
                $valor=  str_replace(" ", "", $valor);
                //echo $valor."<br>";
                $campo=array('campo'=>$tempCampo,'tipo'=>$valor);
                array_push($clase['columnas'], $campo);
            }
            //se a encontrado la key relaciones
            else if($camposClase && $key=='  relations'){
                $camposClase=false;
                $relacionesClase=true;
            }
            //obtener el campo de la relacion
            else if($relacionesClase && substr_count($key, " ")==4){
                //echo $key."<br>";
                $key=  str_replace(" ", "", $key);
                $temeCampoRela=$key;
            }
            //obtener el tipo de la relacion
            else if($relacionesClase && substr_count($key, " ")==6 && $key=='      type'){
                $valor=  substr($linea, $posPuntos+1, strlen($linea));
                //echo $valor."<br>";
                $valor=  str_replace(array(" ","\n"),"", $valor);
                $campoRelacion= array('campo'=>$temeCampoRela,'tipo'=>$valor);
                array_push($clase['relaciones'], $campoRelacion);
            }
            else if ($relacionesClase && substr_count($key, " ")==2){
                break;
            }
        }
        fclose($schema);
        //print_r($clase);
        return $clase;
    }
    
    public function buscarClase2($nombreClase){
        $camposClase= false;
        $relacionesClase=false;
        $tempCampo="";
        $temeCampoRela="";
        $varEntidad= strtolower(substr($nombreClase, 0,1)).substr($nombreClase, 1,  strlen($nombreClase));
        $clase= array('clase'=>$nombreClase,'var'=>$varEntidad);
        $clase['columnas']= array();
        $clase['relaciones']=array();
        
        $schema= fopen(getcwd().'/../config/doctrine/schema.yml','rb');
        
        while(!feof($schema)){
            $linea=  fgets($schema);
            $posPuntos= strpos($linea, ":");
            $key= substr($linea, 0,$posPuntos);
            if($key==$nombreClase){
                //echo $key."<br>";
                $camposClase=true;
            }
            //imprimir campo
            else if($camposClase && substr_count($key, " ")==4){
                $newKey=$key;
                /*for($i=0;$i<strlen($key);$i++){
                    $char=substr($key, $i,1);
                    if($char!='_'){
                            $newKey.=$char;
                    }
                    else{
                        $i++;
                        $char=substr($key, $i,1);
                        $newKey.=  strtoupper($char);
                    }
                }*/
                $newKey= str_replace(" ", "", $newKey);
                //$newKey= strtoupper(substr($newKey, 0,1)).  substr($newKey, 1,  strlen($newKey));
                //echo $newKey."<br>";
                $tempCampo=$newKey;
            }
            //obtener el tipo del campo
            else if($camposClase && substr_count($key, " ")==6 && $key=='      type'){
                $valor=  substr($linea, $posPuntos+1, strlen($linea));
                $posParentesis= strpos($valor, "(");
                $valor=  substr($valor,0,$posParentesis);
                $valor=  str_replace(" ", "", $valor);
                //echo $valor."<br>";
                $campo=array('campo'=>$tempCampo,'tipo'=>$valor);
                array_push($clase['columnas'], $campo);
            }
            //se a encontrado la key relaciones
            else if($camposClase && $key=='  relations'){
                $camposClase=false;
                $relacionesClase=true;
            }
            //obtener el campo de la relacion
            else if($relacionesClase && substr_count($key, " ")==4){
                //echo $key."<br>";
                $key=  str_replace(" ", "", $key);
                $temeCampoRela=$key;
            }
            //obtener el tipo de la relacion
            else if($relacionesClase && substr_count($key, " ")==6 && $key=='      type'){
                $valor=  substr($linea, $posPuntos+1, strlen($linea));
                //echo $valor."<br>";
                $valor=  str_replace(array(" ","\n"),"", $valor);
                $campoRelacion= array('campo'=>$temeCampoRela,'tipo'=>$valor);
                array_push($clase['relaciones'], $campoRelacion);
            }
            else if ($relacionesClase && substr_count($key, " ")==2){
                break;
            }
        }
        fclose($schema);
        //print_r($clase);
        return $clase;
    }
    public function crearEstructura($clase,$modulo,$vista){
        $fieldset=false;
        $cfieldset=false;
        $legend="";
        $table=false;
        $tr=false;
        $ctr=false;
        $estructura=array();
        $seccion=array();
        $camposLinea=array();
        
        print_r($clase['columnas']);
        echo getcwd().'/../app/frontend/modules/'.$modulo.'/templates/'.$vista;
        $estructura= array();
        $fvista= fopen(getcwd().'/../apps/frontend/modules/'.$modulo.'/templates/'.$vista.'.php','rb');
        echo "<br><br>";
        for($i=0;$i<count($clase['columnas']);$i++){
            echo "['".$clase['columnas'][$i]['campo']."']";
            }
        echo "<br><br>";
        $cont=1;
        while(!feof($fvista)){
            $linea=  fgets($fvista);
            //echo $linea;
            if(strpos($linea, '<fieldset>')!==false){
                $fieldset=true;
            }
            if(strpos($linea, '<legend>')!==false){
                $legend=  substr($linea,strpos($linea, '<legend>')+8,strpos($linea, '</legend>'));
            }
            if(strpos($linea, '<table>')!=false){
                $table=true;
            }
            if(strpos($linea, '<tr>')!=false){
                $tr=true;
            }
            if(strpos($linea, '</tr>')!=false){
                $ctr=true;
            }
            if(strpos($linea, '</fieldset>')!=false){
                $cfieldset=true;
            }
            //if($fieldset){
                //echo "linea=".$cont." ".$linea."<br>";
                //if($cfieldset==false){
                    if($table){
                        if($tr){
                            if($ctr==false){
                                for($i=0;$i<count($clase['columnas']);$i++){
                                    $pos=strpos($linea, "['".$clase['columnas'][$i]['campo']."']");
                                    if($pos!=false){
                                        echo "linea=".$cont." pos=".$pos." ".$linea."<br>";
                                        $campos=array('campo'=>$this->quitarGuiones($clase['columnas'][$i]['campo']),'tipo'=>$clase['columnas'][$i]['tipo']);
                                        array_push($camposLinea,$campos);
                                    }
                                }
                            }
                            else{
                                $tr=false;
                                $ctr=false;
                                if(count($camposLinea)>0)
                                    array_push($seccion, $camposLinea);
                                $camposLinea= array();
                            }
                        }
                    }
                //}
                /*else{
                    $fieldset=false;
                    $cfieldset=false;
                    $seccion['fieldset']=$legend;
                    array_push($estructura, $seccion);
                }*/
                
            //}
                $cont++;
        }
        fclose($fvista);
        echo "<br><br><br>";
        print_r($seccion);
        return $estructura;
        
    }
    public function GenerarTodos(){
        
    }
    public function GenerarReporte($nombreClase,$estructura){
        $clase=$this->buscarClase($nombreClase);
        
        $file= fopen(getcwd()."/../lib/fpdf/pdf/".$clase['clase']."PDF.php",'w');
        fwrite($file, "<?php\n");
        fwrite($file, "class ".$clase['clase']."PDF extends FPDF{\n");
        fwrite($file, $this->identar(1).'var $formatoGeneric;'."\n");
        fwrite($file, $this->identar(1).'var $titulo;'."\n");
        fwrite($file, $this->identar(1).'var $codigo;'."\n");
        fwrite($file, $this->identar(1).'var $'.$clase['var'].';'."\n");
        fwrite($file, $this->identar(1)."public function __construct(){\n");
        fwrite($file, $this->identar(2)."parent::FPDF();\n");
        fwrite($file, $this->identar(2).'$this->formatoGeneric=new FormatoGeneric($this);'."\n");
        fwrite($file, $this->identar(1)."}\n");
        fwrite($file, $this->identar(1)."/**\n");
        fwrite($file, $this->identar(1)."*Establece el codigo del documento\n");
        fwrite($file, $this->identar(1).'* @param string$codigo'."\n");
        fwrite($file, $this->identar(1)."*/\n");
        fwrite($file, $this->identar(1).'public function setCodigoDoc($codigo){'."\n");
        fwrite($file, $this->identar(2).'$this->codigo=$codigo;'."\n");
        fwrite($file, $this->identar(1)."}\n");
        fwrite($file, $this->identar(1)."/**\n");
        fwrite($file, $this->identar(1)."*Establece el titulo que se imprimira en al cabecera de la pagina\n");
        fwrite($file, $this->identar(1).'* @param string$titulo'."\n");
        fwrite($file, $this->identar(1)."*/\n");
        fwrite($file, $this->identar(1).'public function setTituloDoc($titulo){'."\n");
        fwrite($file, $this->identar(2).'$this->titulo=$titulo;'."\n");
        fwrite($file, $this->identar(1)."}\n");
        fwrite($file, $this->identar(1).'function set'.$clase['clase'].'($'.$clase['var'].'){'."\n");
        fwrite($file, $this->identar(2).'$this->'.$clase['var'].'=$'.$clase['var'].';'."\n");
        fwrite($file, $this->identar(1)."}\n");
        fwrite($file, $this->identar(1)."function Header(){\n");
        fwrite($file, $this->identar(2).'$this->formatoGeneric->getCabecera();'."\n");
        fwrite($file, $this->identar(1)."}\n");
        fwrite($file, $this->identar(1)."public function ini(){\n");
        fwrite($file, $this->identar(2).'$this->AddPage();'."\n");
        //imprimir campos
        fwrite($file,$this->identar(2)."//CAMPOS\n");
        if($estructura==null){
            for($i=0;$i<count($clase['columnas']);$i++){
                if((string)($clase['columnas'][$i]['tipo'])=='boolean'){
                    fwrite($file, $this->
                        identar(2).'$this'."->formatoGeneric->checked(".'$this->GetX(),$this->GetY()+2,'."'".$this->crearLabel($clase['columnas'][$i]['campo'])."',".
                        '$this->'.$clase['var']."->get".$clase['columnas'][$i]['campo']."());"."\n");
                }
                else{
                    fwrite($file, $this->
                        identar(2).'$this'."->formatoGeneric->campo('".$this->crearLabel($clase['columnas'][$i]['campo'])."',".
                        '$this->'.$clase['var']."->get".$clase['columnas'][$i]['campo']."());"."\n");
                }

                fwrite($file, $this->identar(2).'$this->Ln();'."\n");
            }
        }
        else{//SI SE ENVIA UNA ESTRUCTURA
           for($i=0;$i<count($estructura);$i++){
               for($j=0;$j<count($estructura[$i]);$j++){
                    if((string)($estructura[$i][$j]['tipo'])=='boolean'){
                        fwrite($file, $this->
                            identar(2).'$this'."->formatoGeneric->checked(".'$this->GetX(),$this->GetY()+2,'."'".$this->crearLabel($estructura[$i][$j]['campo'])."',".
                            '$this->'.$clase['var']."->get".$estructura[$i][$j]['campo']."());"."\n");
                    }
                    else{
                        fwrite($file, $this->
                            identar(2).'$this'."->formatoGeneric->campo('".$this->crearLabel($estructura[$i][$j]['campo'])."',".
                            '$this->'.$clase['var']."->get".$estructura[$i][$j]['campo']."());"."\n");
                    }
               }

                fwrite($file, $this->identar(2).'$this->Ln();'."\n");
            } 
        }
        //imprimir relaciones
        fwrite($file,$this->identar(2)."//RELACIONES\n");
        for($i=0;$i<count($clase['relaciones']);$i++){
            if((string)($clase['relaciones'][$i]['tipo'])=='one'){
                fwrite($file, $this->
                    identar(2).'$this'."->formatoGeneric->campo('".$this->crearLabel($clase['relaciones'][$i]['campo'])."',".
                    '$this->'.$clase['var']."->get".$clase['relaciones'][$i]['campo']."());"."\n");
                fwrite($file,$this->identar(2).'$this->Ln();'."\n");
            }
            else{
                $claseRelacionada= $this->buscarClase($clase['relaciones'][$i]['campo']);
                $defArray='$clase'."= array('columnas'=>array(";
                for($j=0;$j<count($claseRelacionada['columnas']);$j++){
                    $defArray.=$j."=>array('campo'=>'".$claseRelacionada['columnas'][$j]['campo']."')";
                    if($j+1!=count($claseRelacionada['columnas'])){
                        $defArray.=",";
                    }
                }
                $defArray.="));\n";
                fwrite($file,$this->identar(2).'$this->formatoGeneric->'."fieldSet('".$claseRelacionada['clase']."');\n");
                fwrite($file,$this->identar(2).$defArray);
                fwrite($file, $this->
                    identar(2).'$this'."->formatoGeneric->tabla(".'$clase'.",".'$this->'.$clase['var'].'->get'.$clase['relaciones'][$i]['campo']."());"."\n");
                fwrite($file,$this->identar(2).'$this->Ln();'."\n");
            }
        }
        fwrite($file, $this->identar(1)."}\n");
        fwrite($file, "}\n");
        fwrite($file, "?>\n");
        fclose($file);
    }
}
?>
