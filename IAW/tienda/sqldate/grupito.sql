-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2026 a las 14:57:08
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
-- Base de datos: `grupito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetallePedido` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `precioOferta` decimal(10,2) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `introDescripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `imagen`, `precio`, `precioOferta`, `online`, `introDescripcion`) VALUES
(1, 'carrtera', 'Infraestructura vial pavimentada que conecta destinos, permitiendo el transporte rápido y seguro de vehículos. Facilita el comercio, el turismo y la movilidad diaria. Construida con materiales duraderos como asfalto u hormigón, incluye señalización,', './assets/carretera.jpg', 999999.00, 90000.00, 1, 'un carrtera y todos los coches que esta en el imagen.'),
(2, 'fruta', 'Fruta brillante, desconocida y tentadora. Su cáscara reluciente esconde un interior misterioso: ¿dulce néctar o jugo amargo? Su verdadero sabor y efecto... nadie lo sabe. ¿Te atreves a probarla?', './assets/comida.webp', 20.00, 15.00, 0, 'Fruta misteriosa, sea venenosa o no'),
(3, 'El aroma de los dulces', 'La piña en almíbar, dulce y jugosa, conserva su aroma tropical como un rayo de sol enlatado, listo para endulzar cualquier momento.', './assets/dulces.jpg', 1000.00, 2000.00, 1, 'Aroma de los dulces fresco enlatado.'),
(4, 'Un ciudad', 'Una ciudad en Europa Oriental. Con calles empedradas, cúpulas doradas y un ambiente vibrante. Historia palpable en cada rincón, desde su antigua fortaleza hasta su plaza principal.', './assets/pais.jpg', 99999999.99, 99999999.99, 1, 'un ciudad situado en Europa Oriental'),
(5, 'Perro', 'Mi perrito favorito es un pequeño haz de alegría. Su pelaje brilla bajo el sol y sus ojos oscuros reflejan una lealtad infinita. Cada mañana, su entusiasta cola en movimiento es el mejor despertador. Su amor incondicional llena mi hogar de calidez.', './assets/perro.webp', 999999.00, 0.01, 1, 'Mi perrito favorito'),
(6, 'Ruby', 'Ruby, dinámico y elegante. Sintaxis expresiva que prioriza la felicidad del desarrollador. Perfecto para web, scripting y automatización. Con Rails, impulsa aplicaciones robustas. Comunitario y flexible. ¡Pura joya de código!', './assets/ruby.webp', 19.00, 19.00, 0, 'Ruby'),
(7, 'Un lobo', 'Un lobo gris, majestuoso, protector. Es el compañero fiel de mi perrito juguetón. Juntos corren libres, un vínculo salvaje y puro entre la naturaleza.', './assets/unLobo.jpg', 1000.00, 2000.00, 1, 'El amigo de mi perrito'),
(8, 'Piscina', 'Piscina para fiestas, con luces, música y área de descanso.Diversión garantizada.', './assets/unPiscina.webp', 500000.00, 400000.00, 0, 'Un piscina que puede hace fiesta.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'steve6731943@gmail.com', '$2y$10$gOr3JuRGqBaWPP1EzQ4CxOOw.DXlVfqoD1OD6UYAC0I3xtxj1V1Vq', 'Stve', '6731', 'Avenida de un lugar', '321654987');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetallePedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`,`idUsuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
