<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Calificacion', 'doctrine');

/**
 * BaseCalificacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_unidad
 * @property integer $numero_unidad
 * @property float $clasificacion
 * @property string $tipo
 * @property integer $alumno_profesor_materiaid_alumno_profesor_materia
 * @property AlumnoProfesorMateria $AlumnoProfesorMateria
 * 
 * @method integer               getIdUnidad()                                          Returns the current record's "id_unidad" value
 * @method integer               getNumeroUnidad()                                      Returns the current record's "numero_unidad" value
 * @method float                 getClasificacion()                                     Returns the current record's "clasificacion" value
 * @method string                getTipo()                                              Returns the current record's "tipo" value
 * @method integer               getAlumnoProfesorMateriaidAlumnoProfesorMateria()      Returns the current record's "alumno_profesor_materiaid_alumno_profesor_materia" value
 * @method AlumnoProfesorMateria getAlumnoProfesorMateria()                             Returns the current record's "AlumnoProfesorMateria" value
 * @method Calificacion          setIdUnidad()                                          Sets the current record's "id_unidad" value
 * @method Calificacion          setNumeroUnidad()                                      Sets the current record's "numero_unidad" value
 * @method Calificacion          setClasificacion()                                     Sets the current record's "clasificacion" value
 * @method Calificacion          setTipo()                                              Sets the current record's "tipo" value
 * @method Calificacion          setAlumnoProfesorMateriaidAlumnoProfesorMateria()      Sets the current record's "alumno_profesor_materiaid_alumno_profesor_materia" value
 * @method Calificacion          setAlumnoProfesorMateria()                             Sets the current record's "AlumnoProfesorMateria" value
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
        $this->hasColumn('id_unidad', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('numero_unidad', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('clasificacion', 'float', 18, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 18,
             ));
        $this->hasColumn('tipo', 'string', 1, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('alumno_profesor_materiaid_alumno_profesor_materia', 'integer', 4, array(
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
             'local' => 'alumno_profesor_materiaid_alumno_profesor_materia',
             'foreign' => 'id_alumno_profesor_materia'));
    }
}