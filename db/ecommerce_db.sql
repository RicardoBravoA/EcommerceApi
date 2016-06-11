-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 11-06-2016 a las 04:53:09
-- Versión del servidor: 5.5.42
-- Versión de PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`brand_id`, `description`) VALUES
  (1, 'Brand 1'),
  (2, 'Brand 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`category_id`, `description`) VALUES
  (1, 'Category 1'),
  (2, 'Category 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `description` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `image` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `description`, `image`, `state`) VALUES
  (1, '2x1', '123456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `latitude` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `longitude` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `outstanding` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`product_id`, `description`, `price`, `brand_id`, `category_id`, `latitude`, `longitude`, `image`, `outstanding`) VALUES
  (1, 'Product 1', '1.00', 1, 1, '', '', '', 1),
  (2, 'Product 2', '2.00', 1, 2, '', '', '', 1),
  (3, 'Product 3', '3.00', 2, 1, '', '', '', 1),
  (4, 'Product 4', '4.00', 2, 2, '', '', '', 1),
  (5, 'Product 5', '5.00', 1, 1, '', '', '', 0),
  (6, 'Product 6', '6.00', 2, 2, '', '', '', 0),
  (7, 'Product 7', '5.00', 1, 1, '', '', '', 1),
  (8, 'Product 8', '8.00', 2, 2, '', '', '', 1),
  (9, 'Product 9', '9.00', 1, 1, '1', '1', 'image', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf32_spanish_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `surename` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_spanish_ci NOT NULL,
  `password` varchar(32) COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `name`, `lastname`, `surename`, `email`, `password`) VALUES
  (1, 'Ricardo', 'Bravo', 'AcuÃ±a', 'ricardobravo@outlook.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brand`
--
ALTER TABLE `brand`
ADD PRIMARY KEY (`brand_id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `coupon`
--
ALTER TABLE `coupon`
ADD PRIMARY KEY (`coupon_id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brand`
--
ALTER TABLE `brand`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `coupon`
--
ALTER TABLE `coupon`
MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;