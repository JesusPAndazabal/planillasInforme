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

-- Actualizar clave de usuario
DELIMITER $$
CREATE PROCEDURE spu_usuarios_actualizarclave
(
	IN _idusuario 	  INT,
	IN _claveacceso   VARCHAR(100)
)
BEGIN 
	UPDATE usuarios SET claveacceso = _claveacceso WHERE idusuario = _idusuario;
END $$

-- obtener a un usuario
DELIMITER $$
CREATE PROCEDURE spu_usuarios_obtener(IN _idusuario INT)
BEGIN 
	SELECT * FROM usuarios
		WHERE idusuario = _idusuario;
END $$

-- Actualizar usuario
DELIMITER $$
CREATE PROCEDURE spu_modificar_usuarios
(
	IN  _idusuario		INT,
	IN  _nomuser		VARCHAR(30),
	IN  _correo		VARCHAR(70),	
	IN  _nivelacceso	CHAR(1),
	IN  _telefono 		CHAR(11)
)
BEGIN 
	IF _telefono = '' THEN SET _telefono = NULL; END IF;
	
	UPDATE usuarios SET 
		nomuser	      = _nomuser,
		correo	      = _correo,
		nivelacceso   = _nivelacceso,
		telefono      = _telefono
	WHERE idusuario = _idusuario;	
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

DELIMITER $$
CREATE PROCEDURE spu_filtroConsultasUsuarios
(
	IN _numeroDoc CHAR(11),
	IN _anio 	CHAR(4),
	IN _mes		VARCHAR(40)
)
BEGIN 

	-- Si _mes es una cadena vacía, lo convertimos en NULL
	    IF _mes = '' THEN
		SET _mes = NULL;
	    END IF;
	    
	       -- Si _anio es una cadena vacía, lo convertimos en NULL
	    IF _anio = '' THEN
		SET _anio = NULL;
	    END IF;
	    
	SELECT * 
	FROM vs_planillaDetalle
	WHERE (numeroDoc = _numeroDoc OR _numeroDoc IS NULL)
	  AND (anio = _anio OR _anio IS NULL)
	  AND (mes = _mes OR _mes IS NULL);
END $$


	