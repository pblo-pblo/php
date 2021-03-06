CREATE DATABASE Escrito;
Use Escrito;

CREATE TABLE Souvenirs (
  id INT AUTO_INCREMENT ,
  nombre VARCHAR(20) NOT NULL , 
  descripcion VARCHAR(20) NOT NULL , 
  stock INT NOT NULL , 
  precio INT NOT NULL , 
  fechaAlta DATETIME DEFAULT CURRENT_TIMESTAMP,
  primary key (id)
);

CREATE TABLE Compras (
  id INT AUTO_INCREMENT ,
  fechaCompra DATETIME DEFAULT CURRENT_TIMESTAMP,
  idSouvenir INT,
  cantidad INT,
  PRIMARY KEY (id),
  FOREIGN KEY (idSouvenir) REFERENCES Souvenirs(id)
);

CREATE TABLE Usuarios (
  id INT AUTO_INCREMENT ,
  ci VARCHAR(8),
  nombre VARCHAR(20),
  password VARCHAR(100),
  PRIMARY KEY (id)
);

INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('SOuvenir1','descripcion1',10,100);
INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('SOuvenir2','descripcion2',10,200);
INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('SOuvenir3','descripcion3',10,300);
INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('SOuvenir4','descripcion4',10,400);
INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('SOuvenir5','descripcion5',10,500);

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `CompraSouvenir`(idSouvenir int ,cantidad int,disponibles int)
BEGIN
START TRANSACTION;
INSERT INTO Compras (idSouvenir,cantidad) VALUES (idSouvenir,cantidad);
UPDATE Souvenirs set stock = disponibles where id=idSouvenir;
COMMIT;
END$$
DELIMITER ;