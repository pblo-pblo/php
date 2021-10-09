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

INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('poronga1','descripcionPoronga1',10,100);
INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('poronga2','descripcionPoronga2',10,200);
INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('poronga3','descripcionPoronga3',10,300);
INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('poronga4','descripcionPoronga4',10,400);
INSERT INTO Souvenirs (nombre,descripcion,stock,precio) VALUES ('poronga5','descripcionPoronga5',10,500);