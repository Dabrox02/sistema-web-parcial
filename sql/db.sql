CREATE TABLE usuarios(
	id_user INT NOT NULL,
	username VARCHAR(15) NOT NULL,
  pass VARCHAR(100) NOT NULL,
	created_at DATE NOT NULL
);

ALTER TABLE usuarios
ADD PRIMARY KEY (id_user);

CREATE TABLE contacto(
	id_contacto INT NOT NULL AUTO_INCREMENT,
	nombre_contacto VARCHAR(15) NOT NULL,
  correo_contacto VARCHAR(100) NOT NULL,
	id_user INT NOT NULL
);

ALTER TABLE contacto
ADD PRIMARY KEY (id_contacto);

ALTER TABLE contacto
ADD CONSTRAINT fk_contacto_usuarios
FOREIGN KEY (id_user)
REFERENCES usuarios(id_user)
ON DELETE CASCADE;

DELIMITER //
CREATE TRIGGER check_id_user_before_insert
BEFORE INSERT
ON sistema_web.usuarios
FOR EACH ROW
BEGIN
	DECLARE max_id INT;
    DECLARE id_search INT;
	DECLARE cont INT;
	SET cont = 0;
    SET max_id = (SELECT MAX(id_user) FROM sistema_web.usuarios);
    WHILE cont < max_id DO
        SET cont = cont + 1;
        SELECT COUNT(*) INTO id_search FROM sistema_web.usuarios WHERE sistema_web.usuarios.id_user = cont;
  		IF id_search = 0 THEN
        	SET NEW.id_user = cont;
            SET cont = max_id + 1;
        ELSE
        	SET NEW.id_user = max_id + 1;
        END IF;
    END WHILE;
    
    IF cont = 0 THEN
    	SET NEW.id_user = 1;
    END IF;
END// 
DELIMITER ;