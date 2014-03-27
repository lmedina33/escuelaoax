<?php


class MunicipiosTable extends Doctrine_Table
{
    public function findByKeyword($q, $limit = 10){ 
            $query = $this->createQuery('c')
                ->where("c.nombre like '%".$q."%' or c.nombre like '".$q."%' or c.nombre like '%".$q."'")
                ->limit(10)
                    ->execute();
            $personal=array();
            foreach ($query as $dato)
            {
                //se usa casting para representar al objeto como texto
                $personal[] = array('value'=>(string)$dato,'id'=>$dato->getClaveMunicipio());
            }
            return $personal;
    }
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Municipios');
    }
}