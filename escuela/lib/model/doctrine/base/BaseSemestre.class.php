<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Semestre', 'doctrine');

/**
 * BaseSemestre
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_semestre
 * @property string $periodo
 * @property Doctrine_Collection $ProfesorMateria
 * 
 * @method integer             getIdSemestre()      Returns the current record's "id_semestre" value
 * @method string              getPeriodo()         Returns the current record's "periodo" value
 * @method Doctrine_Collection getProfesorMateria() Returns the current record's "ProfesorMateria" collection
 * @method Semestre            setIdSemestre()      Sets the current record's "id_semestre" value
 * @method Semestre            setPeriodo()         Sets the current record's "periodo" value
 * @method Semestre            setProfesorMateria() Sets the current record's "ProfesorMateria" collection
 * 
 * @package    escuela
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSemestre extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('semestre');
        $this->hasColumn('id_semestre', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('periodo', 'string', 1, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('ProfesorMateria', array(
             'local' => 'id_semestre',
             'foreign' => 'semestreid_semestre'));
    }
}