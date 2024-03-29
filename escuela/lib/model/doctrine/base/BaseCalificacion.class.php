<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Calificacion', 'doctrine');

/**
 * BaseCalificacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property float $calif1
 * @property float $calif2
 * @property float $calif3
 * @property float $eo1
 * @property float $eo2
 * @property float $eo3
 * @property integer $id_alumno_profesor_materia
 * @property AlumnoProfesorMateria $AlumnoProfesorMateria
 * 
 * @method integer               getId()                         Returns the current record's "id" value
 * @method float                 getCalif1()                     Returns the current record's "calif1" value
 * @method float                 getCalif2()                     Returns the current record's "calif2" value
 * @method float                 getCalif3()                     Returns the current record's "calif3" value
 * @method float                 getEo1()                        Returns the current record's "eo1" value
 * @method float                 getEo2()                        Returns the current record's "eo2" value
 * @method float                 getEo3()                        Returns the current record's "eo3" value
 * @method integer               getIdAlumnoProfesorMateria()    Returns the current record's "id_alumno_profesor_materia" value
 * @method AlumnoProfesorMateria getAlumnoProfesorMateria()      Returns the current record's "AlumnoProfesorMateria" value
 * @method Calificacion          setId()                         Sets the current record's "id" value
 * @method Calificacion          setCalif1()                     Sets the current record's "calif1" value
 * @method Calificacion          setCalif2()                     Sets the current record's "calif2" value
 * @method Calificacion          setCalif3()                     Sets the current record's "calif3" value
 * @method Calificacion          setEo1()                        Sets the current record's "eo1" value
 * @method Calificacion          setEo2()                        Sets the current record's "eo2" value
 * @method Calificacion          setEo3()                        Sets the current record's "eo3" value
 * @method Calificacion          setIdAlumnoProfesorMateria()    Sets the current record's "id_alumno_profesor_materia" value
 * @method Calificacion          setAlumnoProfesorMateria()      Sets the current record's "AlumnoProfesorMateria" value
 * 
 * @package    escuela
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCalificacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('calificacion');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('calif1', 'float', 2, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('calif2', 'float', 2, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('calif3', 'float', 2, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('eo1', 'float', 2, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('eo2', 'float', 2, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('eo3', 'float', 2, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('id_alumno_profesor_materia', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AlumnoProfesorMateria', array(
             'local' => 'id_alumno_profesor_materia',
             'foreign' => 'id_alumno_profesor_materia'));
    }
}