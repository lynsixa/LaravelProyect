-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2025 a las 09:46:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emendsrtv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `Nombre` varchar(105) NOT NULL,
  `Descripcion` varchar(450) NOT NULL,
  `Foto1` varchar(350) NOT NULL,
  `Foto2` varchar(350) DEFAULT NULL,
  `Foto3` varchar(350) DEFAULT NULL,
  `Producto_idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `Nombre`, `Descripcion`, `Foto1`, `Foto2`, `Foto3`, `Producto_idProducto`) VALUES
(1, 'Don Perignon', 'Dom Pérignon es un prestigioso champán francés de la región de Champagne, conocido por su refinamiento y calidad excepcional. Elaborado únicamente en las mejores cosechas, cada botella de Dom Pérignon ofrece una experiencia única, combinando elegancia, frescura y complejidad. Su sabor delicado y su burbuja fina lo convierten en una opción ideal para celebraciones especiales. Con un aroma suave de frutas maduras, flores y notas de pan tostado', '../gesProductos/fotosProductos/champagne/domPerignon/1.1.png', '../gesProductos/fotosProductos/champagne/domPerignon/1.2.png', '../gesProductos/fotosProductos/champagne/domPerignon/1.3.png', 1),
(2, 'Buchainas', 'Whisky', 'foto_bebida1.jpg', 'foto_bebida2.jpg', 'foto_bebida3.jpg', 2),
(3, 'JP', 'Champán', 'foto_ensalada1.jpg', 'foto_ensalada2.jpg', 'foto_ensalada3.jpg', 5),
(4, 'csa', 'asa', 'uploads/1745386932_img1_WhatsApp Image 2025-04-20 at 8.37.12 PM.jpeg', NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigonis`
--

CREATE TABLE `codigonis` (
  `idCodigoNis` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Disponibilidad` tinyint(4) NOT NULL,
  `Menu_idMenu` int(11) NOT NULL,
  `Mesa_idMesa` int(11) NOT NULL,
  `Eventos_idEventos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codigonis`
--

INSERT INTO `codigonis` (`idCodigoNis`, `Descripcion`, `Disponibilidad`, `Menu_idMenu`, `Mesa_idMesa`, `Eventos_idEventos`) VALUES
(3, '123', 0, 1, 3, NULL),
(4, '123', 0, 1, 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `idEntrega` int(11) NOT NULL,
  `Descripcion` varchar(450) DEFAULT NULL,
  `Entregado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`idEntrega`, `Descripcion`, `Entregado`) VALUES
(1, 'Entrega de los productos en proceso.', 0),
(2, 'Entrega de los productos en proceso.', 0),
(3, 'Entrega de los productos en proceso.', 0),
(4, 'Entrega de los productos en proceso.', 0),
(5, 'Entrega de los productos en proceso.', 0),
(6, 'Entrega de los productos en proceso. Usuario: ', 0),
(7, 'Entrega de los productos en proceso. Usuario: 123123 1w', 0),
(8, 'Entrega de los productos en proceso.', 0),
(9, 'Entrega de los productos en proceso. Usuario: 123 vargas', 0),
(10, 'Entrega de los productos en proceso. Usuario: 123 vargas', 0),
(11, 'Entrega de los productos en proceso. Usuario: 123 vargas', 1),
(12, 'Entrega de los productos en proceso. Usuario: 123 vargas', 1),
(13, 'Entrega de los productos en proceso. Usuario: 123 vargas', 1),
(14, 'Entrega de los productos en proceso. Usuario: 123 vargas', 1),
(15, 'Entrega de los productos en proceso. Usuario: 123 vargas', 1),
(16, 'Entrega de los productos en proceso. Usuario: 123 vargas', 1),
(17, 'Entrega de los productos en proceso. Usuario: 123 vargas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idEventos` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Fecha_Evento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEventos`, `Titulo`, `Descripcion`, `Fecha_Evento`) VALUES
(5, '	Fiesta de prueba', 'Evento creado desde Postman', '2025-05-10 20:00:00'),
(6, '21', '32141234', '2025-04-29 01:31:00'),
(7, 'Fiesta de Año Nuevo', 'Fiesta para celebrar el Año Nuevo 2025', '2025-12-31 23:59:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `Descripcion` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idMenu`, `Descripcion`) VALUES
(1, 'Menú Común'),
(2, 'Menú de Evento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `idMesa` int(11) NOT NULL,
  `NumeroPiso` int(11) NOT NULL,
  `NumeroMesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`idMesa`, `NumeroPiso`, `NumeroMesa`) VALUES
(1, 32, 342),
(2, 32, 342),
(3, 32, 342),
(4, 32, 342);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `idOrden` int(11) NOT NULL,
  `TokenCliente` varchar(450) DEFAULT NULL,
  `Descripcion` varchar(450) NOT NULL,
  `PrecioFinal` float NOT NULL,
  `Fecha` datetime NOT NULL,
  `Producto_idProducto` int(11) DEFAULT NULL,
  `Solicitud_idSolicitud` int(11) DEFAULT NULL,
  `Usuario_idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`idOrden`, `TokenCliente`, `Descripcion`, `PrecioFinal`, `Fecha`, `Producto_idProducto`, `Solicitud_idSolicitud`, `Usuario_idUsuario`) VALUES
(1, 'e7cd824c224e73ae9a81a83529908314', 'Compra de producto 1', 3720000, '2025-03-30 12:04:30', 1, NULL, NULL),
(2, '8ad31ddc8e7d002e27383e557c7b5290', 'Don Perignon (Cantidad: 4) - Precio: $930000 | Total: $3720000\nDon Perignon (Cantidad: 3) - Precio: $930000 | Total: $2790000\nBuchainas (Cantidad: 2) - Precio: $10.5 | Total: $21\nBuchainas (Cantidad: 3) - Precio: $10.5 | Total: $31.5\n', 6510050, '2025-03-30 21:19:10', NULL, NULL, NULL),
(3, '4e50463c32c4ac64d498b5eb0ef96d8f', 'Don Perignon (Cantidad: 13) - Precio: $930000 | Total: $12090000\n', 12090000, '2025-03-30 21:21:19', NULL, NULL, NULL),
(4, '4eb8c0c823a143ae859ee81f537665b0', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000\n', 930000, '2025-03-30 21:22:30', NULL, NULL, NULL),
(5, '5f79a149bad9f28ebe3623c71c55bee3', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000\n', 930000, '2025-03-30 21:24:26', NULL, NULL, NULL),
(6, '4f18d4b70aa9d4efbcdda72f01e31dfa', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000\n', 930000, '0000-00-00 00:00:00', 1, 1, NULL),
(7, '3e05d04846d15baf6cbd3c35c03ff133', 'Buchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis:  | Mesa:  | Piso: \nDon Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', 930010, '0000-00-00 00:00:00', 2, 2, NULL),
(8, '3e05d04846d15baf6cbd3c35c03ff133', 'Buchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis:  | Mesa:  | Piso: \nDon Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', 930010, '0000-00-00 00:00:00', 1, 2, NULL),
(9, '3d0d54844c54ff72b755f687963f658a', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', 930000, '0000-00-00 00:00:00', 1, 3, 3),
(10, '0cb90822a48c2729e7a0c4b2eaa7a309', 'Buchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis:  | Mesa:  | Piso: \n', 10.5, '0000-00-00 00:00:00', 2, 4, 3),
(11, '7303171eb5c2dce8601455737328aaaa', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', 930000, '0000-00-00 00:00:00', 1, 5, 3),
(12, 'c7841928a4d51009af80279de7b98649', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', 930000, '0000-00-00 00:00:00', 1, 6, 3),
(13, 'f09b421bc1987f03b5cc32e109888f49', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', 930000, '0000-00-00 00:00:00', 1, 7, 3),
(14, '83fac3db34020d028b2600dc75e6d937', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', 930000, '0000-00-00 00:00:00', 1, 8, NULL),
(15, 'a0d81da3d0370bebf53e3185d0e3f959', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: No disponible | Mesa: N/A | Piso: N/A\n', 930000, '0000-00-00 00:00:00', 1, 9, 2),
(16, '7f8a786ead3385a981710107b2f74a47', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: No disponible | Mesa: N/A | Piso: N/A\n', 930000, '0000-00-00 00:00:00', 1, 10, 2),
(17, '733a3b31d2712474191437455ed3c0f2', 'Buchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis: 123 | Mesa: 342 | Piso: 32\n', 10.5, '0000-00-00 00:00:00', 2, 11, 2),
(18, '0b8f9dda1f39c39e52b008372b6059a5', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: 123 | Mesa: 342 | Piso: 32\n', 930000, '0000-00-00 00:00:00', 1, 12, 2),
(19, '15cb796e7aa087bf3b432768c8c03b05', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: 123 | Mesa: 342 | Piso: 32\n', 930000, '0000-00-00 00:00:00', 1, 13, 2),
(20, '2b44945809e3fd766e7d1da24a1788ab', 'Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: 123 | Mesa: 342 | Piso: 32\n', 930000, '0000-00-00 00:00:00', 1, 14, 2),
(21, 'a351a00deab671dedc25618ddb0a900d', 'Don Perignon (Cantidad: 59) - Precio: $930000 | Total: $54870000 | Código Nis: 123 | Mesa: 342 | Piso: 32\n', 54870000, '0000-00-00 00:00:00', 1, 15, 2),
(22, 'd0da58daa4eed18b1941edcd7b9942dd', 'Buchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis: 123 | Mesa: 342 | Piso: 32\nJP (Cantidad: 1) - Precio: $20 | Total: $20 | Código Nis: 123 | Mesa: 342 | Piso: 32\n', 30.5, '0000-00-00 00:00:00', 2, 16, 2),
(23, 'd0da58daa4eed18b1941edcd7b9942dd', 'Buchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis: 123 | Mesa: 342 | Piso: 32\nJP (Cantidad: 1) - Precio: $20 | Total: $20 | Código Nis: 123 | Mesa: 342 | Piso: 32\n', 30.5, '0000-00-00 00:00:00', 5, 16, 2),
(24, '72290f176be5f18e7224478c3c1db69f', 'Buchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis: 123 | Mesa: 342 | Piso: 32\n', 10.5, '0000-00-00 00:00:00', 2, 17, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Disponibilidad` tinyint(4) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `CodigoNis_idCodigoNis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `Precio`, `Disponibilidad`, `Cantidad`, `CodigoNis_idCodigoNis`) VALUES
(1, 930000, 1, 12, NULL),
(2, 10.5, 1, 48, NULL),
(3, 15.75, 0, 0, NULL),
(4, 7.25, 1, 100, NULL),
(5, 20, 1, 212, NULL),
(6, 12.5, 0, 0, NULL),
(7, 2999, 1, 1, NULL),
(8, 2999, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRoles` int(11) NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRoles`, `Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Gerente'),
(3, 'Mesero'),
(4, 'Usuario'),
(5, 'Bartender');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `Descripcion` varchar(405) NOT NULL,
  `Informe` varchar(450) DEFAULT NULL,
  `Despachado` tinyint(4) NOT NULL,
  `Entrega_idEntrega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `Descripcion`, `Informe`, `Despachado`, `Entrega_idEntrega`) VALUES
(1, 'Solicitud de productos: Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000\n', NULL, 0, 1),
(2, 'Solicitud de productos: Buchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis:  | Mesa:  | Piso: \nDon Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', NULL, 0, 2),
(3, 'Solicitud de productos: Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', NULL, 0, 3),
(4, 'Solicitud de productos: Buchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis:  | Mesa:  | Piso: \n', NULL, 0, 4),
(5, 'Solicitud de productos: Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', NULL, 1, 5),
(6, 'Solicitud de productos: Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n | Nombre usuario: ', NULL, 0, 6),
(7, 'Solicitud de productos: Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n | Nombre usuario: 123123 1w', NULL, 0, 7),
(8, 'Solicitud de productos: Don Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis:  | Mesa:  | Piso: \n', NULL, 0, 8),
(9, 'Solicitud de productos:\nDon Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: No disponible | Mesa: N/A | Piso: N/A\n\nUsuario: 123 vargas', '\nMotivo: no hay', -1, 9),
(10, 'Solicitud de productos:\nDon Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: No disponible | Mesa: N/A | Piso: N/A\n\nUsuario: 123 vargas', NULL, 1, 10),
(11, 'Solicitud de productos:\nBuchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis: 123 | Mesa: 342 | Piso: 32\n\nUsuario: 123 vargass', NULL, 1, 11),
(12, 'Solicitud de productos:\nDon Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: 123 | Mesa: 342 | Piso: 32\n\nUsuario: 123 vargas', NULL, 1, 12),
(13, 'Solicitud de productos:\nDon Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: 123 | Mesa: 342 | Piso: 32\n\nUsuario: 123 vargas', NULL, 1, 13),
(14, 'Solicitud de productos:\nDon Perignon (Cantidad: 1) - Precio: $930000 | Total: $930000 | Código Nis: 123 | Mesa: 342 | Piso: 32\n\nUsuario: 123 vargas', '\nMotivo: 123', -1, 14),
(15, 'Solicitud de productos:\nDon Perignon (Cantidad: 59) - Precio: $930000 | Total: $54870000 | Código Nis: 123 | Mesa: 342 | Piso: 32\n\nUsuario: 123 vargas', NULL, 1, 15),
(16, 'Solicitud de productos:\nBuchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis: 123 | Mesa: 342 | Piso: 32\nJP (Cantidad: 1) - Precio: $20 | Total: $20 | Código Nis: 123 | Mesa: 342 | Piso: 32\n\nUsuario: 123 vargas', NULL, 1, 16),
(17, 'Solicitud de productos:\nBuchainas (Cantidad: 1) - Precio: $10.5 | Total: $10.5 | Código Nis: 123 | Mesa: 342 | Piso: 32\n\nUsuario: 123 vargas', NULL, 0, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_documento`
--

CREATE TABLE `tipo_de_documento` (
  `idTipodedocumento` int(11) NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_de_documento`
--

INSERT INTO `tipo_de_documento` (`idTipodedocumento`, `Descripcion`) VALUES
(1, 'Cédula de ciudadanía'),
(2, 'Pasaporte'),
(3, 'Cédula de extranjería'),
(4, 'Permiso especial de permanencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Documento` varchar(35) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contraseña` varbinary(200) NOT NULL,
  `FechaDeNacimiento` date NOT NULL,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT 0,
  `Tipo de documento_idTipodedocumento` int(11) DEFAULT NULL,
  `Roles_idRoles` int(11) NOT NULL,
  `CodigoNis_idCodigoNis` int(11) DEFAULT NULL,
  `Tipo_de_documento_idTipodedocumento` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nombres`, `Apellidos`, `Documento`, `Correo`, `Contraseña`, `FechaDeNacimiento`, `token`, `token_password`, `password_request`, `Tipo de documento_idTipodedocumento`, `Roles_idRoles`, `CodigoNis_idCodigoNis`, `Tipo_de_documento_idTipodedocumento`, `created_at`, `updated_at`) VALUES
(3, '123123', '1w', '1234', '1234@gmail.com', 0x24327924313024384338454a6a772f623055492e2e5a523449314e59756175417a3148614d4b5a5245746763334b2e672e32787354474b72794f5857, '1998-03-28', '4759d2838087adae1e0e54f50aea77ea', 'BCbpaIzkS5TtL2AhuPvvRZQA1Z6IwM33t4GVIELafU5pPKH6lc81CqitoPfA', 1, 2, 4, NULL, NULL, '2025-04-23 22:04:03', '2025-04-23 23:15:19'),
(4, '123123', 'sad', '546645', 'mr.mod@gmail.com', 0x24327924313024785a5138654e3676463767316262545079704f43374f2e31724d30514876632e79454d6d5a3736504f75787a616673453037496c4f, '2002-08-01', '6c23eb75b58e57c2e90fc57ad32935bc', 'Z4UJS1oi19x0UMkD3sOi3VlSUK55xgjLM7iBiEebMltaSlQZyL5lwyD2UQWv', 1, 1, 4, NULL, NULL, '2025-04-23 22:04:03', '2025-04-24 04:18:41'),
(8, '1234', '1w', '1235677657656', 'trollgamesadassda@gmail.com', 0x243279243132244f6464534b73426934764a55465a69452f697070712e6e554b76776a5233504b6a6f356e5932556a4632676261785852646a2e4d4f, '2000-06-14', 'UGITp7CSkhUYJkH3FlcxKLEF2CcnsJ0v6JWNaXtf', 'b9HUJoXTV8waDTz7j4IYvU8lzjgk8nqFrVJRGO0Iq59eitYEdYllb6YOyOGa', 1, NULL, 4, NULL, 3, '2025-04-24 04:22:43', '2025-04-24 04:25:23'),
(10, 'Don Perignon', 'sadsad', '123543545', 'mr.mods399@gmail.com', 0x2432792431322466537259344e744e54614c5275684a394f2e7045474f62724d5671775032485844364150344d7358724858754d52544b7a63545079, '2002-02-13', 'PddRapzWvMlRL0OFdbsDVmDAsbmfoZ0c3A1vQhq6', NULL, 0, NULL, 4, NULL, 2, '2025-04-24 04:27:06', '2025-04-24 12:45:40'),
(11, 'Lyahn', 'vargas', '1030531161', 'trollgame@gmail.com', 0x24327924313224675639566a69754e73727371692f345a377442764765746b4a547a56657136452f39533151625070796a74563658687763376a312e, '2002-04-23', '7IEu2umY4WZporK4yHnMzp21CodnyIck6GlASKUV', '2cfQ17EkAZb2aHQ4slj24ZSKiDyh3ZrfAT6ae4N2PckPiYHRvjGvKZnIjTQA', 1, NULL, 4, NULL, 1, '2025-04-24 08:44:49', '2025-04-24 08:52:47'),
(13, 'dcfgdfgdf', 'gdfgdffg', '123499234534', 'sexotilinos1243asdfsf@gmail.com', 0x24327924313224453466582f5742536c47546e66554430495138756765713063454d717a6a6c3437394e3474554e6966657a7a6e454d3277656a796d, '2003-07-23', 'fNoujHBT3IGkB12lWvNSOEDvmeI1WYi8cD3ehSwM', 'Dt1BI9DO65LRyM3Wra3YdlI5pG4kbGAZZeSvs6mN8tAMS3skOSXc3IjmAJYb', 1, NULL, 4, NULL, 1, '2025-04-24 08:51:27', '2025-04-24 08:52:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `fk_Categoria_Producto1` (`Producto_idProducto`);

--
-- Indices de la tabla `codigonis`
--
ALTER TABLE `codigonis`
  ADD PRIMARY KEY (`idCodigoNis`),
  ADD KEY `fk_CodigoNis_Menu1` (`Menu_idMenu`),
  ADD KEY `fk_CodigoNis_Mesa1` (`Mesa_idMesa`),
  ADD KEY `fk_CodigoNis_Eventos1` (`Eventos_idEventos`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`idEntrega`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEventos`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`idMesa`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`idOrden`),
  ADD KEY `fk_Orden_Producto1` (`Producto_idProducto`),
  ADD KEY `fk_Orden_Solicitud1` (`Solicitud_idSolicitud`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_Producto_CodigoNis1` (`CodigoNis_idCodigoNis`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `fk_Solicitud_Entrega1` (`Entrega_idEntrega`);

--
-- Indices de la tabla `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  ADD PRIMARY KEY (`idTipodedocumento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Tipo de documento` (`Tipo de documento_idTipodedocumento`),
  ADD KEY `fk_Usuario_Roles1` (`Roles_idRoles`),
  ADD KEY `fk_Usuario_CodigoNis1` (`CodigoNis_idCodigoNis`),
  ADD KEY `fk_tipo_de_documento_id` (`Tipo_de_documento_idTipodedocumento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `codigonis`
--
ALTER TABLE `codigonis`
  MODIFY `idCodigoNis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `idEntrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `idMesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_tipo_de_documento_id` FOREIGN KEY (`Tipo_de_documento_idTipodedocumento`) REFERENCES `tipo_de_documento` (`idTipodedocumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
