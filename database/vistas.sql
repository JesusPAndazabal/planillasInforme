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

SELECT * FROM usuarios
SELECT * FROM planillasDetalles

SELECT DET.idplanillaDetalle , USU.nomuser, PER.nombresApellidos, CARG.descripcion , ENT.descripcion , COM.tipo , COM.nombre,
PLAN.anio , PLAN.mes , DET.numRegistro , DET.cussp , DET.numCuenta , DET.fechaIngreso , DET.sueldoBasico , DET.asignacionFamiliar,
DET.reintegros , DET.montoInasistencia , DET.onpAfp , DET.obliOnp , DET.afpOblig , DET.comisionFlujo , DET.ssalud , DET.montoRem,
DET.netoPagar , DET.montoAguinaldo , DET.montoprimaSeguro , DET.montototalAporte , DET.totalDescuento
FROM planillasDetalles DET
INNER JOIN usuarios USU ON USU.idusuario = DET.idusuario
INNER JOIN personas PER ON PER.idpersona = DET.idpersona
INNER JOIN cargos CARG ON CARG.idcargo = DET.idcargo 
INNER JOIN entidades ENT ON ENT.identidad = DET.identidad
INNER JOIN comisiones COM ON COM.idcomision = DET.idcomision 
INNER JOIN planillas PLAN ON PLAN.idplanilla = PLAN.idplanilla

