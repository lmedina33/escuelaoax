CREATE TABLE alumno (matricula VARCHAR(20), nombre VARCHAR(80), ap_paterno VARCHAR(50), ap_materno VARCHAR(50), estatus VARCHAR(6), id_grupo INT, INDEX id_grupo_idx (id_grupo), PRIMARY KEY(matricula)) ENGINE = INNODB;
CREATE TABLE alumno_profesor_materia (id_alumno_profesor_materia INT AUTO_INCREMENT, examen_semestral FLOAT(18, 2), observaciones VARCHAR(255), profesor_materiaid_profesor_materia INT, alumnomatricula VARCHAR(20), INDEX alumnomatricula_idx (alumnomatricula), INDEX profesor_materiaid_profesor_materia_idx (profesor_materiaid_profesor_materia), PRIMARY KEY(id_alumno_profesor_materia)) ENGINE = INNODB;
CREATE TABLE calificacion (id_unidad INT AUTO_INCREMENT, numero_unidad INT, clasificacion FLOAT(18, 2), tipo VARCHAR(1), alumno_profesor_materiaid_alumno_profesor_materia INT, INDEX alumno_profesor_materiaid_alumno_profesor_materia_idx (alumno_profesor_materiaid_alumno_profesor_materia), PRIMARY KEY(id_unidad)) ENGINE = INNODB;
CREATE TABLE cuenta (id_cuenta INT AUTO_INCREMENT, usuario VARCHAR(40), contrasenia VARCHAR(50), rolid_rol INT, INDEX rolid_rol_idx (rolid_rol), PRIMARY KEY(id_cuenta)) ENGINE = INNODB;
CREATE TABLE grupo (id_grupo INT AUTO_INCREMENT, semestre INT, num_grupo INT, PRIMARY KEY(id_grupo)) ENGINE = INNODB;
CREATE TABLE materia (clave VARCHAR(3), nombre VARCHAR(70), semestre INT, PRIMARY KEY(clave)) ENGINE = INNODB;
CREATE TABLE profesor (id_profesor INT AUTO_INCREMENT, nombre VARCHAR(50), ap_paterno VARCHAR(50), ap_materno VARCHAR(50), cuentaid_cuenta INT, INDEX cuentaid_cuenta_idx (cuentaid_cuenta), PRIMARY KEY(id_profesor)) ENGINE = INNODB;
CREATE TABLE profesor_materia (id_profesor_materia INT AUTO_INCREMENT, periodo VARCHAR(8), profesorid_profesor INT NOT NULL, materiaclave VARCHAR(3), grupoid_grupo INT, INDEX grupoid_grupo_idx (grupoid_grupo), INDEX profesorid_profesor_idx (profesorid_profesor), INDEX materiaclave_idx (materiaclave), PRIMARY KEY(id_profesor_materia)) ENGINE = INNODB;
CREATE TABLE reg_faltas (id INT AUTO_INCREMENT, fecha DATE, num_unidad INT, alumno_profesor_materiaid_alumno_profesor_materia INT, INDEX alumno_profesor_materiaid_alumno_profesor_materia_idx (alumno_profesor_materiaid_alumno_profesor_materia), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE reg_tareas_no_realizadas (id INT AUTO_INCREMENT, fecha DATE, descripcion VARCHAR(255), num_unidad INT, alumno_profesor_materiaid_alumno_profesor_materia INT, INDEX alumno_profesor_materiaid_alumno_profesor_materia_idx (alumno_profesor_materiaid_alumno_profesor_materia), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rol (id_rol INT AUTO_INCREMENT, nombre VARCHAR(25), PRIMARY KEY(id_rol)) ENGINE = INNODB;
CREATE TABLE variables_globales (id_variables_globales INT AUTO_INCREMENT, eval_fecha_inicio DATE, eval_fecha_fin DATE, estatus TINYINT, unidad_actual INT, semestre_actual VARCHAR(1), PRIMARY KEY(id_variables_globales)) ENGINE = INNODB;
ALTER TABLE alumno ADD CONSTRAINT alumno_id_grupo_grupo_id_grupo FOREIGN KEY (id_grupo) REFERENCES grupo(id_grupo);
ALTER TABLE alumno_profesor_materia ADD CONSTRAINT appi FOREIGN KEY (profesor_materiaid_profesor_materia) REFERENCES profesor_materia(id_profesor_materia);
ALTER TABLE alumno_profesor_materia ADD CONSTRAINT alumno_profesor_materia_alumnomatricula_alumno_matricula FOREIGN KEY (alumnomatricula) REFERENCES alumno(matricula);
ALTER TABLE calificacion ADD CONSTRAINT caai FOREIGN KEY (alumno_profesor_materiaid_alumno_profesor_materia) REFERENCES alumno_profesor_materia(id_alumno_profesor_materia);
ALTER TABLE cuenta ADD CONSTRAINT cuenta_rolid_rol_rol_id_rol FOREIGN KEY (rolid_rol) REFERENCES rol(id_rol);
ALTER TABLE profesor ADD CONSTRAINT profesor_cuentaid_cuenta_cuenta_id_cuenta FOREIGN KEY (cuentaid_cuenta) REFERENCES cuenta(id_cuenta);
ALTER TABLE profesor_materia ADD CONSTRAINT profesor_materia_profesorid_profesor_profesor_id_profesor FOREIGN KEY (profesorid_profesor) REFERENCES profesor(id_profesor);
ALTER TABLE profesor_materia ADD CONSTRAINT profesor_materia_materiaclave_materia_clave FOREIGN KEY (materiaclave) REFERENCES materia(clave);
ALTER TABLE profesor_materia ADD CONSTRAINT profesor_materia_grupoid_grupo_grupo_id_grupo FOREIGN KEY (grupoid_grupo) REFERENCES grupo(id_grupo);
ALTER TABLE reg_faltas ADD CONSTRAINT raai FOREIGN KEY (alumno_profesor_materiaid_alumno_profesor_materia) REFERENCES alumno_profesor_materia(id_alumno_profesor_materia);
ALTER TABLE reg_tareas_no_realizadas ADD CONSTRAINT raai_1 FOREIGN KEY (alumno_profesor_materiaid_alumno_profesor_materia) REFERENCES alumno_profesor_materia(id_alumno_profesor_materia);
