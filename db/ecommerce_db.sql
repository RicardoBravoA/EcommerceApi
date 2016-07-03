-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 04-07-2016 a las 01:30:56
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
  `description` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`brand_id`, `description`, `image`) VALUES
  (1, 'Adidas', 'http://5.kicksonfire.net/wp-content/uploads/2016/02/adidas-logo.jpg?6ce6a3'),
  (2, 'Nike', 'http://conceptdrop.com/wp-content/uploads/2013/10/nike-swoosh.jpg'),
  (3, 'Samsung', 'http://www.logospike.com/wp-content/uploads/2014/11/Samsung_logo-9.jpg'),
  (4, 'Brand 4', 'http://rlaengineers.com/wp-content/uploads/2015/01/hp-logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`category_id`, `description`, `image`) VALUES
  (1, 'Casual', 'http://1.bp.blogspot.com/-4oJsZJxPDLs/UWml6HmxIVI/AAAAAAAAFZ4/IfZUnScD3dU/s1600/Zapatillas+Running+Adidas+Climacool+Clima+Cool+Revolution+Men+Hombre+David+Beckham+5.jpg'),
  (2, 'Deportiva', 'http://venta.brick7.com.pe/media/pe/139201_139300/139268_419749ec503dd9fc.jpg'),
  (3, 'Chimpunes', 'http://cde.3.depor.pe/ima/0/0/1/0/5/105904.jpg'),
  (4, 'Vestir', 'http://zapatosdamaycaballero.com/wp-content/uploads/2016/01/Zapatos-de-hombre-con-agujetas-1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `description` varchar(30) COLLATE utf32_spanish_ci NOT NULL,
  `image` varchar(100) COLLATE utf32_spanish_ci NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `description`, `image`, `state`) VALUES
  (1, '2x1', '123456', 1),
  (2, 'Coupon 2', 'image', 1);

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
  `image` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `outstanding` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`product_id`, `description`, `price`, `brand_id`, `category_id`, `latitude`, `longitude`, `image`, `outstanding`) VALUES
  (1, 'Product 1', '1.00', 1, 1, '', '', 'https://alicarnold.files.wordpress.com/2009/11/new-product.jpg', 1),
  (2, 'Product 2', '2.00', 1, 2, '', '', 'http://mcdbros.ie/wp-content/uploads/2012/12/new-product.png', 1),
  (3, 'Product 3', '3.00', 2, 1, '', '', 'http://2.bp.blogspot.com/-xC6bhbtfkU4/Vg3lGWA1doI/AAAAAAAAABY/AwePpj6TuTc/s1600/produk%2Bapa%2Byang%2Bakan%2Bdibeli%2Boleh%2Ballah%2B-%2Bhaspray.png', 1),
  (4, 'Product 4', '4.00', 2, 2, '', '', 'http://www.techcounsellor.com/img/work/approach/p.png', 1),
  (5, 'Product 5', '5.00', 1, 1, '', '', 'http://dabketna.com/wp-content/uploads/2014/10/New_product.jpg', 0),
  (6, 'Product 6', '6.00', 2, 2, '', '', 'https://index.tnwcdn.com/images/8983580c647b9bc0fdde5352f2980975f33552ea.png', 0),
  (7, 'Product 7', '5.00', 1, 1, '', '', 'http://www.sr-research.com/images/New-sticker.png', 1),
  (8, 'Product 8', '8.00', 2, 2, '', '', 'http://www.hcgdropblogs.com/product_images/uploaded_images/mbg.png', 1),
  (9, 'Product 9', '9.00', 1, 1, '1', '1', 'http://www.honeybeardeodorant.com/wp-content/uploads/2015/05/New-Product.jpg', 1),
  (10, 'Product 10', '10.50', 3, 1, '1', '1', 'https://www.arxan.com/wp-content/uploads/assets1/images/demo.png', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `name`, `lastname`, `surename`, `email`, `password`) VALUES
  (1, 'Ricardo', 'Bravo', 'AcuÃ±a', 'ricardobravo@outlook.com', 'e10adc3949ba59abbe56e057f20f883e'),
  (2, 'Test', 'Test', 'Test', 'email@email.com', 'e10adc3949ba59abbe56e057f20f883e');

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;