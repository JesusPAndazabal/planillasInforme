CREATE DATABASE planillaSub;
 
USE planillaSub;

CREATE TABLE personas
(
	idpersona 		INT AUTO_INCREMENT PRIMARY KEY,
	tipoDoc			CHAR(1) NOT NULL, -- D  = DNI , C = CARNET DE EXTRANJERIA , P = Pasaporte
	numeroDoc		VARCHAR(11) NOT NULL,
	nombresApellidos	VARCHAR(200) NOT NULL
	
)ENGINE=INNODB;

CREATE TABLE usuarios
(
	idusuario		INT AUTO_INCREMENT PRIMARY KEY,
	nomuser 		VARCHAR(30) NOT NULL,
	nivelacceso		CHAR(1) NOT NULL,
	claveacceso		VARCHAR(200)NOT NULL,
	estado			CHAR(1) NOT NULL DEFAULT '1'
)ENGINE=INNODB;

CREATE TABLE planillas
(
	idplanilla		INT AUTO_INCREMENT PRIMARY KEY,
	anio			YEAR NOT NULL,
	mes 			INT NOT NULL		
)ENGINE=INNODB;

CREATE TABLE entidades
(
	identidad		INT AUTO_INCREMENT PRIMARY KEY,
	descripcion		VARCHAR(100) NOT NULL,
	direccion		VARCHAR(200) NOT NULL,
	ruc			CHAR(11) NOT NULL,
	numEjecutora		INT NOT NULL,
	region			VARCHAR(100) NOT NULL,
	provincia		VARCHAR(100) NOT NULL
)ENGINE=INNODB;

CREATE TABLE cargos
(
	idcargo			INT AUTO_INCREMENT PRIMARY KEY,
	descripcion		VARCHAR(100) NOT NULL
)ENGINE=INNODB;

CREATE TABLE comisiones
(
	idcomision		INT AUTO_INCREMENT PRIMARY KEY,
	tipo			CHAR(3) NOT NULL,
	nombre			VARCHAR(100) NULL

)ENGINE=INNODB;

CREATE TABLE planillasDetalles
(
	idplanillaDetalle	INT AUTO_INCREMENT PRIMARY KEY,
	idusuario		INT NOT NULL,
	idpersona		INT NOT NULL,
	idcargo			INT NOT NULL,
	identidad		INT NOT NULL,
	idcomision		INT NOT NULL,
	idplanilla		INT NOT NULL,
	numRegistro		INT NOT NULL, -- orden columna A
	cussp			VARCHAR(100) NOT NULL, -- columna E
	numCuenta		INT NOT NULL, -- columna F
	fechaIngreso		DATETIME NOT NULL, -- Columna H
	sueldoBasico		INT NOT NULL, -- columna K
	asignacionFamiliar	INT NULL, -- null columna J
	reintegros		INT NULL, -- null columna L
	montoInasistencia	INT NULL, -- null N 
	onpAfp			VARCHAR(100) NULL, -- null P 
	obliOnp			INT NULL,  -- COLUMNA Q 
	afpOblig		INT NULL,  -- COLUMNA S
	comisionFlujo		INT NULL, -- COLUMNA T 
	ssalud			INT NULL, -- COLUMNA Y 
	montoRem		INT NULL,-- COLUMNA O
	netoPagar		INT NULL,-- COLUMNA X
	montoAguinaldo		INT NULL, -- NULL M 
	montoprimaSeguro	INT NULL, -- COLUMNA U 
	montototalAporte	INT NULL, -- COLUMNA Z
	totalDescuento		INT NULL, -- COLUMNA W
	
	CONSTRAINT fk_idusuario FOREIGN KEY (idusuario) REFERENCES usuarios (idusuario),
	CONSTRAINT fk_idpersona FOREIGN KEY (idpersona) REFERENCES personas (idpersona),
	CONSTRAINT fk_idcargo FOREIGN KEY (idcargo) REFERENCES cargos (idcargo),
	CONSTRAINT fk_identidad FOREIGN KEY (identidad) REFERENCES entidades (identidad),
	CONSTRAINT fk_comision FOREIGN KEY (idcomision) REFERENCES comisiones (idcomision),
	CONSTRAINT fk_planilla FOREIGN KEY (idplanilla) REFERENCES planillas (idplanilla)

)ENGINE=INNODB;