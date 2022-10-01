-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-10-2022 a las 02:04:38
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19559447_db_tienda_ciclista`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_clientes`
--

CREATE TABLE `info_clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info_clientes`
--

INSERT INTO `info_clientes` (`id`, `nombre`, `telefono`, `direccion`, `usuario`, `password`, `foto`) VALUES
(3, 'Madelyn', '3016432743', 'call12', 'montezgomezdayanna@gmail.com', 'ac87c1ffd2d73c7708fb81e0cbca25186a33832b', 'imgs/clientes/dayanna1_20220902_1846_20220917_1421_20220920_1747.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_productos`
--

CREATE TABLE `info_productos` (
  `cod` int(11) NOT NULL,
  `referencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `descripcioncorta` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valorcomercial` double(22,0) NOT NULL,
  `foto` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `foto2` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `foto3` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `foto4` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `foto5` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `info_productos`
--

INSERT INTO `info_productos` (`cod`, `referencia`, `nombre`, `descripcion`, `descripcioncorta`, `cantidad`, `valorcomercial`, `foto`, `foto2`, `foto3`, `foto4`, `foto5`, `fecha`, `hora`) VALUES
(6, '0001', 'Prince', 'PURA EMOCIÓN\r\nLos diseñadores e ingenieros de Pinarello, han trasladado la increíble experiencia que genera el modelo DOGMA F12 a la nueva PRINCE.\r\nEl resultado es una bicicleta con características técnicas y estándares de rendimiento que superan a muchas de las bicicletas de carretera de alta gama del mercado actual.\r\nEl modelo PRINCE hereda el sistema de integración total de cables de la DOGMA F12, llamado TiCR, que permite una ventaja aerodinámica importante.', 'Descripcion corta', 50, 20000000, 'imgs/productos/prince_20220902_1725_20220927_0901_20220927_1612.jpg', 'imgs/productos/Prince2_20220927_1612.jpg', 'imgs/productos/Prince3_20220927_1613.jpg', 'imgs/productos/Prince4_20220927_1613.jpg', 'imgs/productos/Prince5_20220927_1613.jpg', '2022-09-17', '20:25:11'),
(7, '002', 'Gravel', 'Si quieres ganar una carrera de Gravel, esta es tu bicicleta. Esta es la DOGMA todoterreno.\r\nLa polivalente GREVIL F está preparada para todo. Se adapta a cualquier tipo de combinación de ruedas o neumáticos, adaptándose a todas tus necesidades, dándote la libertad de superar todos los límites y de competir contigo mismo. Incluso fuera de la carretera, la aerodinámica cuenta. Cada vatio ahorrado te acerca a la victoria, por lo que el diseño del GREVIL F se centra principalmente en la aerodinámica y la rigidez. Si quieres triunfar en todos los terrenos, esta es tu bicicleta. Esta es el DOGMA todoterreno.', 'Descripcion corta', 90, 5000000, 'imgs/productos/gravel_20220902_1658_20220927_0902_20220927_1615.jpg', 'imgs/productos/IMG-20200415-WA0106 (1)_20220929_1059.jpg', '', '', '', '2022-09-17', '20:26:10'),
(8, '003', 'Nytro Dust 3', 'EL MODELO PERFECTO PARA QUIENES BUSCAN UNA NUEVA AVENTURA TODOTERRENO\r\nNYTRO DUST 3, una bicicleta de e-MTB duradera y segura con el auténtico estilo Pinarello. Un modelo que te hará vivir grandes experiencias en todo tipo de senderos. Con su motor Shimano EP8, esta bicicleta te llevará más allá de cualquier obstáculo, haciendo que tus días fuera de la carretera sean inolvidables.\r\nLa bicicleta está equipada con la batería Shimano 630w/h que garantiza una reserva de marcha durante todo el día, ruedas de 29″ y 150 mm de recorrido delantero y trasero.\r\n', 'Descripcion corta', 25, 40000000, 'imgs/productos/Nytro dust3_20220902_1701_20220927_0903_20220927_1539_20220927_1616.jpg', '', '', '', '', '2022-09-17', '20:27:13'),
(9, '004', 'NYTRO urbanist', 'LA OPCIÓN IDEAL PARA MOVERTE POR TU CIUDAD\r\nLa geometría y la calidad del cuadro, hacen de la NYTRO URBANIST un modelo para uso urbano con un carácter deportivo que la diferencia.\r\nGracias a su bajo peso puedes cargarla fácilmente en tu vehículo y llevarla a la oficina. Además, el cuadro ha sido diseñado para cualquier tipo de conducción lo que hace de ella una bicicleta heterogénea.', 'Descripcion corta', 85, 17000000, 'imgs/productos/nytro urbanist_20220902_1704_20220927_0903_20220927_1616.jpg', '', '', '', '', '2022-09-17', '20:28:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_usuarios`
--

CREATE TABLE `info_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` bigint(15) NOT NULL,
  `direccion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `info_usuarios`
--

INSERT INTO `info_usuarios` (`id`, `nombre`, `telefono`, `direccion`, `usuario`, `password`, `foto`) VALUES
(1, 'Dayanna', 3016432743, 'la floresta', 'montezgomezdayanna@gmail.com', '054c0fc418839174801e32efda5e0e949f1f79bd', 'imgs/usuarios/dayanna1_20220902_1846_20220920_1751.jpeg'),
(2, 'santiago', 3125005599, 'cll 18', 'everardoorozcocarmona@gmail.com', '2053d551f2308e88a59faaee97b0c5d07d52a597', 'imgs/usuarios/Imagen de WhatsApp 2022-09-17 a las 20_20220920_1753.jpg'),
(3, 'Robert Lopez', 3192565125, 'Mar De Plata', 'robertlopezoviedo03@gmail.com', 'f3c384d143264ac01b447d38cf19543ce0774b10', 'imgs/usuarios/robert_20220902_1846_20220920_1751.jpeg'),
(4, 'Juan Camilo', 3108418794, 'cll 18', 'jorozcocarmona87@gmail.com', '1741cbea9e85753063f89b2acae4b4575ca7b615', 'imgs/usuarios/Juan_20220902_1551_20220920_1752.jpg'),
(7, 'Ingrid', 3045354047, 'calle 21 cra 5', 'ingridcarolinamontanoguerrero@gmail.com', '45041b6f01ae9b1a13e8670fa2d05a9198e26acb', 'imgs/usuarios/WhatsApp Image 2022-09-02 at 6_20220902_1841_20220920_1752.jpeg'),
(8, 'Breiner', 3012946952, 'Santa Ines', 'breiner@gmail.com', '555cb0b0418f28cf4703e4aa5e7a153b1e410366', 'imgs/usuarios/Anotación 2022-09-02 184322_20220902_1843_20220920_1752.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `info_clientes`
--
ALTER TABLE `info_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `info_productos`
--
ALTER TABLE `info_productos`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `info_usuarios`
--
ALTER TABLE `info_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `info_clientes`
--
ALTER TABLE `info_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `info_productos`
--
ALTER TABLE `info_productos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `info_usuarios`
--
ALTER TABLE `info_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
