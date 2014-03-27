<?php


class LocalidadTable extends Doctrine_Table
{
    public function findByKeyword($q, $limit = 10){ 
            $query = $this->createQuery('c')
                ->where("c.nombre like '%".$q."%' or c.nombre like '".$q."%' or c.nombre like '%".$q."'")
                ->limit(10)
                    ->execute();
            $localidades=array();
            foreach ($query as $dato)
            {
                //se usa casting para representar al objeto como texto
                $localidades[] = array('value'=>(string)$dato,'id'=>$dato->getClaveLocalidad());
            }
            return $localidades;
    }
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Localidad');
    }
}