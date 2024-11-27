-- Procedimiento para crear a la persona 

DELIMITER $$
CREATE PROCEDURE spu_registrar_persona
(
	IN _tipoDoc		CHAR(1), -- D  = DNI , C = CARNET DE EXTRANJERIA , P = Pasaporte
	IN _numeroDoc		VARCHAR(11),
	IN _nombresApellidos	VARCHAR(200)
)
BEGIN 
	INSERT INTO personas (tipoDoc , numeroDoc , nombresApellidos)
		VALUES (_tipoDoc , _numeroDoc, _nombresApellidos);
END $$

DELIMITER $$
CREATE PROCEDURE spu_registrar_usuario
(
	IN _nomuser 		VARCHAR(30),
	IN _correo		VARCHAR(200),
	IN _telefono		CHAR(11),
	IN _nivelacceso		CHAR(1)
)
BEGIN 
	INSERT INTO usuarios (nomuser , correo , telefono , nivelacceso ,claveacceso)
		VALUES ( _nomuser , _correo , _telefono , _nivelacceso , '$2y$10$J7gowuuVf0ofrzV.eP.hEO9vexj7ccfi.I.wqf7i7u1HTpSroGqrC');
END $$

DELIMITER $$
CREATE PROCEDURE spu_usuarios_login(IN _nomuser VARCHAR(30))
BEGIN
	SELECT *
	FROM usuarios WHERE nomuser = _nomuser AND estado = '1';
END $$

-- PLANILLAS
DELIMITER $$
CREATE PROCEDURE spu_registrar_planilla
(
	IN _anio		YEAR,
	IN _mes 		INT

)
BEGIN
	INSERT INTO planillas (anio , mes )
		VALUES (_anio , _mes);
END $$

DELIMITER $$
CREATE PROCEDURE spu_registrar_entidad
(
	IN _descripcion		VARCHAR(100),
	IN _direccion		VARCHAR(200),
	IN _ruc			CHAR(11),
	IN _numEjecutora	INT,
	IN _region		VARCHAR(100),
	IN _provincia		VARCHAR(100)
)
BEGIN 
	INSERT INTO entidades (descripcion , direccion , ruc , numEjecutora , region , provincia)
		VALUES (_descripcion , _direccion , _ruc , _numEjecutora , _region , _provincia);
END $$

DELIMITER $$
CREATE PROCEDURE spu_registrar_cargo
(
	IN _decripcion		VARCHAR(100),
	IN _remuneracion	INT
)
BEGIN 
	INSERT INTO cargos (descripcion , remuneracion)
		VALUES (_descripcion  , _remuneracion);
END $$

DELIMITER $$
CREATE PROCEDURE spu_registrar_comision
(
	IN _tipo			CHAR(1),
	IN _nombre			VARCHAR(100)
)
BEGIN 
	INSERT INTO comisiones (tipo , nombre)
		VALUES (_tipo , _nombre);

END $$


	