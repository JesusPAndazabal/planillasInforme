INSERT INTO usuarios (nivelacceso , nomuser , correo , claveacceso)VALUES
			('A' ,'jesus', 'jesusmauricio@gmail.com', '123456');
			
INSERT INTO entidades (descripcion , direccion , ruc , numEjecutora , region , provincia )
	VALUES ('Ugel Huaytara' , 'direccion de la entidad' , '54789632596' , '1' , 'chincha alta' , 'chincha alta');
			
UPDATE usuarios
	SET claveacceso = '$2y$10$J7gowuuVf0ofrzV.eP.hEO9vexj7ccfi.I.wqf7i7u1HTpSroGqrC'
	WHERE idusuario = 1;

SELECT * FROM usuarios
SELECT * FROM personas
SELECT * FROM cargos
SELECT * FROM planillas
SELECT * FROM comisiones
SELECT * FROM entidades
SELECT * FROM planillasDetalles
SELECT * FROM archivos_subidos