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
	tipo			CHAR(3) NULL,
	nombre			VARCHAR(100) NULL

)ENGINE=INNODB;

CREATE TABLE planillasDetalles
(
	idplanillaDetalle	INT AUTO_INCREMENT PRIMARY KEY,
	idusuario		INT NULL,
	idpersona		INT NULL,
	idcargo			INT NULL,
	identidad		INT NULL,
	idcomision		INT NULL,
	idplanilla		INT NULL,
	numRegistro		INT NULL, -- orden columna A
	cussp			VARCHAR(100) NOT NULL, -- columna E
	numCuenta		INT NOT NULL, -- columna F
	fechaIngreso		DATETIME NOT NULL, -- Columna H
	asignacionFamiliar	DECIMAL(10,2) NULL, -- null columna J
	sueldoBasico		DECIMAL(10,2) NULL, -- columna K
	reintegros		DECIMAL(10,2) NULL, -- null columna L
	montoAguinaldo		DECIMAL(10,2) NULL, -- NULL M 
	montoInasistencia	DECIMAL(10,2) NULL, -- null N
	montoRem		DECIMAL(10,2) NULL,-- COLUMNA O
	obliOnp			DECIMAL(10,2) NULL,  -- COLUMNA Q
	afpOblig		DECIMAL(10,2) NULL,  -- COLUMNA S
	comisionFlujo		DECIMAL(10,2) NULL, -- COLUMNA T
	montoprimaSeguro	DECIMAL(10,2) NULL, -- COLUMNA U   
	essaludVida		DECIMAL(10,2) NULL, -- null V
	totalDescuento		DECIMAL(10,2) NULL, -- COLUMNA W
	netoPagar		DECIMAL(10,2) NULL,-- COLUMNA X
	ssalud			DECIMAL(10,2) NULL, -- COLUMNA Y 
	montototalAporte	DECIMAL(10,2) NULL, -- COLUMNA Z
	
	CONSTRAINT fk_idusuario FOREIGN KEY (idusuario) REFERENCES usuarios (idusuario),
	CONSTRAINT fk_idpersona FOREIGN KEY (idpersona) REFERENCES personas (idpersona),
	CONSTRAINT fk_idcargo FOREIGN KEY (idcargo) REFERENCES cargos (idcargo),
	CONSTRAINT fk_identidad FOREIGN KEY (identidad) REFERENCES entidades (identidad),
	CONSTRAINT fk_comision FOREIGN KEY (idcomision) REFERENCES comisiones (idcomision),
	CONSTRAINT fk_planilla FOREIGN KEY (idplanilla) REFERENCES planillas (idplanilla)

)ENGINE=INNODB;

