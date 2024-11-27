CREATE VIEW vs_personas AS 
SELECT *
FROM personas;

CREATE VIEW vs_comisiones AS 
SELECT * 
FROM comisiones;

CREATE VIEW vs_planillas AS
	SELECT idplanilla , anio , 
		 CASE 
			WHEN mes = '1' THEN 'Enero'
			WHEN mes = '2' THEN 'Febrero'
			WHEN mes = '3' THEN 'Marzo'
			WHEN mes = '4' THEN 'Abril'
			WHEN mes = '5' THEN 'Mayo'
			WHEN mes = '6' THEN 'Junio'
			WHEN mes = '7' THEN 'Julio'
			WHEN mes = '8' THEN 'Agosto'
			WHEN mes = '9' THEN 'Setiembre'
			WHEN mes = '10' THEN 'Octubre'
			WHEN mes = '11' THEN 'Noviembre'
			WHEN mes = '12' THEN 'Diciembre'
		 END 'mes'
FROM planillas;

CREATE VIEW vs_cargos AS 
SELECT * 
FROM cargos;

CREATE VIEW vs_entidades AS
SELECT * 
FROM entidades;



CREATE VIEW vs_planillaDetalle AS 
SELECT DET.idplanillaDetalle , USU.nomuser , ENT.descripcion AS 'descripcionEnt' , DET.numRegistro , PLAN.idplanilla,
       CASE 
			WHEN mes = '1' THEN 'Enero'
			WHEN mes = '2' THEN 'Febrero'
			WHEN mes = '3' THEN 'Marzo'
			WHEN mes = '4' THEN 'Abril'
			WHEN mes = '5' THEN 'Mayo'
			WHEN mes = '6' THEN 'Junio'
			WHEN mes = '7' THEN 'Julio'
			WHEN mes = '8' THEN 'Agosto'
			WHEN mes = '9' THEN 'Setiembre'
			WHEN mes = '10' THEN 'Octubre'
			WHEN mes = '11' THEN 'Noviembre'
			WHEN mes = '12' THEN 'Diciembre'
	END 'mes' 
       
       , PLAN.anio , 
       PER.numeroDoc , DET.cussp , DET.numCuenta, PER.nombresApellidos, DET.fechaIngreso,  
       CARG.descripcion , DET.asignacionFamiliar , DET.sueldoBasico , DET.reintegros , DET.montoAguinaldo , 
       DET.montoInasistencia , DET.montoRem, COM.tipo , DET.obliOnp , COM.nombre, DET.afpOblig, 
       DET.comisionFlujo , DET.montoprimaSeguro , DET.essaludVida, DET.totalDescuento , DET.netoPagar , 
       DET.ssalud , DET.montototalAporte
FROM planillasDetalles DET
LEFT JOIN usuarios USU ON USU.idusuario = DET.idusuario
LEFT JOIN personas PER ON PER.idpersona = DET.idpersona
LEFT JOIN cargos CARG ON CARG.idcargo = DET.idcargo 
LEFT JOIN entidades ENT ON ENT.identidad = DET.identidad
LEFT JOIN comisiones COM ON COM.idcomision = DET.idcomision 
LEFT JOIN planillas PLAN ON PLAN.idplanilla = DET.idplanilla;


DELIMITER $$
CREATE PROCEDURE spu_obtener_planilla(IN _idplanilla INT)
BEGIN 
	SELECT * 
	FROM vs_planillaDetalle WHERE idplanilla = _idplanilla;
END $$

DELIMITER $$
CREATE PROCEDURE spu_listar_planillas()
BEGIN 
	SELECT * FROM vs_planillas;
END $$


-- Obtener un registro por el id de el detalle de la planilla 
DELIMITER $$
CREATE PROCEDURE spu_obtener_detalle(IN _idplanillaDetalle INT)
BEGIN 
	SELECT * FROM vs_planillaDetalle
		WHERE idplanillaDetalle = _idplanillaDetalle;
END $$


DELIMITER $$
CREATE PROCEDURE spu_buscar_planilla
(
    IN _numeroDoc VARCHAR(11),
    IN _nombresApellidos VARCHAR(200)
)
BEGIN
    SELECT * 
    FROM vs_planillaDetalle
    WHERE ( (_numeroDoc IS NULL OR _numeroDoc = '' OR numeroDoc = _numeroDoc) )
      AND ( (_nombresApellidos IS NULL OR _nombresApellidos = '' OR nombresApellidos LIKE CONCAT('%', _nombresApellidos, '%')) );
END $$

-- USUARIOS


DELIMITER $$
CREATE PROCEDURE spu_buscarUsuariosRol
(
	IN _nivelacceso CHAR(1),
	IN _search 	VARCHAR(50)
)
BEGIN
	SELECT * FROM usuarios
		WHERE nivelacceso = _nivelacceso AND nomuser LIKE CONCAT('%', _search ,'%');
END $$

-- Procedimiento para la busqueda por nombres de usuarios
DELIMITER $$
CREATE PROCEDURE spu_buscarUsuarios
(
	IN _search 	VARCHAR(50)
)
BEGIN
	SELECT * FROM usuarios
		WHERE nomuser LIKE CONCAT('%', _search ,'%');
END $$


DELIMITER $$
CREATE PROCEDURE spu_buscardniPersona(IN _numeroDoc VARCHAR(11))
BEGIN 
	SELECT * 
	FROM personas WHERE numeroDoc =  _numeroDoc;
END $$

SELECT * FROM personas
CALL spu_buscardniPersona (44292928)





