-- Base de datos: `emendsrtv`
CREATE DATABASE IF NOT EXISTS emendsrtv CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE emendsrtv;

-- Tabla: tipo_de_documento
CREATE TABLE tipo_de_documento (
  idTipodedocumento INT(11) NOT NULL AUTO_INCREMENT,
  Descripcion VARCHAR(45) NOT NULL,
  PRIMARY KEY (idTipodedocumento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: roles
CREATE TABLE roles (
  idRoles INT(11) NOT NULL AUTO_INCREMENT,
  Descripcion VARCHAR(45) NOT NULL,
  PRIMARY KEY (idRoles)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Tabla: usuario
CREATE TABLE usuario (
  idUsuario INT(11) NOT NULL AUTO_INCREMENT,
  Nombres VARCHAR(45) NOT NULL,
  Apellidos VARCHAR(45) NOT NULL,
  Documento VARCHAR(35) NOT NULL,
  Correo VARCHAR(100) NOT NULL,
  Contraseña VARBINARY(200) NOT NULL,
  FechaDeNacimiento DATE NOT NULL,
  token VARCHAR(40) NOT NULL,
  token_password VARCHAR(100) DEFAULT NULL,
  password_request INT(11) DEFAULT 0,
  Tipo_de_documento_idTipodedocumento INT(11) DEFAULT NULL,
  Roles_idRoles INT(11) NOT NULL,
  CodigoNis_idCodigoNis INT(11) DEFAULT NULL,
  
  -- 🔵 Agregamos aquí los campos de timestamps:
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  
  PRIMARY KEY (idUsuario),
  FOREIGN KEY (Tipo_de_documento_idTipodedocumento) REFERENCES tipo_de_documento(idTipodedocumento),
  FOREIGN KEY (Roles_idRoles) REFERENCES roles(idRoles)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: menu
CREATE TABLE menu (
  idMenu INT(11) NOT NULL AUTO_INCREMENT,
  Descripcion VARCHAR(400) NOT NULL,
  PRIMARY KEY (idMenu)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: mesa
CREATE TABLE mesa (
  idMesa INT(11) NOT NULL AUTO_INCREMENT,
  NumeroPiso INT(11) NOT NULL,
  NumeroMesa INT(11) NOT NULL,
  PRIMARY KEY (idMesa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: eventos
CREATE TABLE eventos (
  idEventos INT(11) NOT NULL AUTO_INCREMENT,
  Titulo VARCHAR(255) NOT NULL,
  Descripcion VARCHAR(50) NOT NULL,
  Fecha_Evento DATETIME NOT NULL,
  PRIMARY KEY (idEventos)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: codigonis
CREATE TABLE codigonis (
  idCodigoNis INT(11) NOT NULL AUTO_INCREMENT,
  Descripcion VARCHAR(100) NOT NULL,
  Disponibilidad TINYINT(4) NOT NULL,
  Menu_idMenu INT(11) NOT NULL,
  Mesa_idMesa INT(11) NOT NULL,
  Eventos_idEventos INT(11) DEFAULT NULL,
  PRIMARY KEY (idCodigoNis),
  FOREIGN KEY (Menu_idMenu) REFERENCES menu(idMenu),
  FOREIGN KEY (Mesa_idMesa) REFERENCES mesa(idMesa),
  FOREIGN KEY (Eventos_idEventos) REFERENCES eventos(idEventos)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: entrega
CREATE TABLE entrega (
  idEntrega INT(11) NOT NULL AUTO_INCREMENT,
  Descripcion VARCHAR(450) DEFAULT NULL,
  Entregado TINYINT(4) NOT NULL,
  PRIMARY KEY (idEntrega)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: solicitud
CREATE TABLE solicitud (
  idSolicitud INT(11) NOT NULL AUTO_INCREMENT,
  Descripcion VARCHAR(405) NOT NULL,
  Informe VARCHAR(450) DEFAULT NULL,
  Despachado TINYINT(4) NOT NULL,
  Entrega_idEntrega INT(11) DEFAULT NULL,
  PRIMARY KEY (idSolicitud),
  FOREIGN KEY (Entrega_idEntrega) REFERENCES entrega(idEntrega)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: producto
CREATE TABLE producto (
  idProducto INT(11) NOT NULL AUTO_INCREMENT,
  Precio DECIMAL(10,3) NOT NULL,
  Disponibilidad TINYINT(4) NOT NULL,
  Cantidad INT(11) NOT NULL,
  CodigoNis_idCodigoNis INT(11) DEFAULT NULL,
  Categoria_idCategoria INT(11) DEFAULT NULL,
  PRIMARY KEY (idProducto),
  FOREIGN KEY (CodigoNis_idCodigoNis) REFERENCES codigonis(idCodigoNis)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: categoria
CREATE TABLE categoria (
  idCategoria INT(11) NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(105) NOT NULL,
  Descripcion VARCHAR(450) NOT NULL,
  Foto1 VARCHAR(350) NOT NULL,
  Foto2 VARCHAR(350) DEFAULT NULL,
  Foto3 VARCHAR(350) DEFAULT NULL,
  Producto_idProducto INT(11) NOT NULL,
  PRIMARY KEY (idCategoria),
  FOREIGN KEY (Producto_idProducto) REFERENCES producto(idProducto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla: orden
CREATE TABLE orden (
  idOrden INT(11) NOT NULL AUTO_INCREMENT,
  TokenCliente VARCHAR(450) DEFAULT NULL,
  Descripcion VARCHAR(450) NOT NULL,
  PrecioFinal FLOAT NOT NULL,
  Fecha DATETIME NOT NULL,
  Producto_idProducto INT(11) DEFAULT NULL,
  Solicitud_idSolicitud INT(11) DEFAULT NULL,
  cantidad INT(11) NOT NULL DEFAULT 1,
  Usuario_idUsuario INT(11) DEFAULT NULL,
  PRIMARY KEY (idOrden),
  FOREIGN KEY (Producto_idProducto) REFERENCES producto(idProducto),
  FOREIGN KEY (Solicitud_idSolicitud) REFERENCES solicitud(idSolicitud),
  FOREIGN KEY (Usuario_idUsuario) REFERENCES usuario(idUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
