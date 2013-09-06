<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AlumnoProfesorMateria', 'doctrine');

/**
 * BaseAlumnoProfesorMateria
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_alumno_profesor_materia
 * @property integer $alumnoid_alumno
 * @property integer $profesor_materiaid_profesor_materia
 * @property ProfesorMateria $ProfesorMateria
 * @property Alumno $Alumno
 * @property Doctrine_Collection $Calificacion
 * 
 * @method integer               getIdAlumnoProfesorMateria()             Returns the current record's "id_alumno_profesor_materia" value
 * @method integer               getAlumnoidAlumno()                      Returns the current record's "alumnoid_alumno" value
 * @method integer               getProfesorMateriaidProfesorMateria()    Returns the current record's "profesor_materiaid_profesor_materia" value
 * @method ProfesorMateria       getProfesorMateria()                     Returns the current record's "ProfesorMateria" value
 * @method Alumno                getAlumno()                              Returns the current record's "Alumno" value
 * @method Doctrine_Collection   getCalificacion()                        Returns the current record's "Calificacion" collection
 * @method AlumnoProfesorMateria setIdAlumnoProfesorMateria()             Sets the current record's "id_alumno_profesor_materia" value
 * @method AlumnoProfesorMateria setAlumnoidAlumno()                      Sets the current record's "alumnoid_alumno" value
 * @method AlumnoProfesorMateria setProfesorMateriaidProfesorMateria()    Sets the current record's "profesor_materiaid_profesor_materia" value
 * @method AlumnoProfesorMateria setProfesorMateria()                     Sets the current record's "ProfesorMateria" value
 * @method AlumnoProfesorMateria setAlumno()                              Sets the current record's "Alumno" value
 * @method AlumnoProfesorMateria setCalificacion()                        Sets the current record's "Calificacion" collection
 * 
 * @package    escuela
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAlumnoProfesorMateria extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('alumno_profesor_materia');
        $this->hasColumn('id_alumno_profesor_materia', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('alumnoid_alumno', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('profesor_materiaid_profesor_materia', 'integer', 4, array(
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
        $this->hasOne('ProfesorMateria', array(
             'local' => 'profesor_materiaid_profesor_materia',
             'foreign' => 'id_profesor_materia'));

        $this->hasOne('Alumno', array(
             'local' => 'alumnoid_alumno',
             'foreign' => 'id_alumno'));

        $this->hasMany('Calificacion', array(
             'local' => 'id_alumno_profesor_materia',
             'foreign' => 'alumno_profesor_materiaid_alumno_profesor_materia'));
    }
}