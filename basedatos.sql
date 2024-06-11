use railway;
CREATE TABLE NIVEL_USUARIO (
    id_nivel INTEGER PRIMARY KEY auto_increment,
    tipo_nivel VARCHAR(100) NOT NULL
);
CREATE TABLE USUARIOS (
    id_usuario INTEGER PRIMARY KEY auto_increment,
    usuario varchar (30) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    dni int  NOT NULL,
    clave VARCHAR(30) NOT NULL,
    actividad boolean NOT NULL,
    nivel int,
    fecha DATE NOT NULL,
    imagen VARCHAR(100) NOT NULL,
    FOREIGN KEY (nivel) REFERENCES NIVEL_USUARIO(id_nivel)
);
CREATE TABLE MARCA_TRANSPORTE(
	id_marca integer primary key auto_increment,
    tipo_marca varchar(50) not null
);
CREATE TABLE TRANSPORTE( 
	id_transporte integer primary key auto_increment,
    marca int,
    modelo varchar(100) NOT NULL,
    año_transporte int not null,
    patente varchar(100) not null,
    disposicion bool not null,
	FOREIGN KEY (marca) REFERENCES MARCA_TRANSPORTE(id_marca)
);
CREATE TABLE DESTINO (
	id_destino int primary key auto_increment,
	localidad varchar(100) 
);
CREATE TABLE VIAJES(
	id_viaje int primary key auto_increment,
	chofer int,
    camion int,
    fecha_viaje date,
    fecha_creacion date,
    destino int,
    encargado int,
    FOREIGN KEY (chofer) REFERENCES USUARIOS(id_usuario),
    FOREIGN KEY (camion) REFERENCES TRANSPORTE(id_transporte),
    FOREIGN KEY (destino) REFERENCES DESTINO(id_destino),
    FOREIGN KEY (encargado) REFERENCES USUARIOS(id_usuario)
);
