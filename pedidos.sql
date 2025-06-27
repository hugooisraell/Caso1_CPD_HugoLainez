-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2025 a las 08:35:15
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
-- Base de datos: `gestion_pedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` enum('pendiente','en proceso','enviado','entregado') NOT NULL DEFAULT 'pendiente',
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente`, `producto`, `cantidad`, `estado`, `fecha_pedido`) VALUES
(1, 'Luis Pérez', 'Arroz Súper Extra 25kg', 2, 'pendiente', '2025-06-19 23:33:36'),
(2, 'María Gómez', 'Aceite Primor 1L', 4, 'en proceso', '2025-06-19 23:33:36'),
(3, 'Jorge Cárdenas', 'Atún Real 170g', 6, 'enviado', '2025-06-19 23:33:36'),
(4, 'Gabriela Muñoz', 'Fideo Don Vittorio 500g', 3, 'pendiente', '2025-06-19 23:33:36'),
(5, 'Carlos Valle', 'Coca-Cola 2L', 5, 'entregado', '2025-06-19 23:33:36'),
(6, 'Patricia Lema', 'Pollo Entero Congelado', 1, 'pendiente', '2025-06-19 23:33:36'),
(7, 'José Quishpe', 'Detergente Deja 3kg', 1, 'enviado', '2025-06-19 23:33:36'),
(8, 'Diana Herrera', 'Galletas Pingüino', 10, 'entregado', '2025-06-19 23:33:36'),
(9, 'Andrés Paredes', 'Cerveza Pilsener 6-pack', 2, 'pendiente', '2025-06-19 23:33:36'),
(10, 'Verónica Suárez', 'Jabón Bolívar', 3, 'en proceso', '2025-06-19 23:33:36'),
(11, 'Daniel Morocho', 'Sal Parrillera 1kg', 2, 'pendiente', '2025-06-19 23:33:36'),
(12, 'Nancy Delgado', 'Pan de yuca', 12, 'enviado', '2025-06-19 23:33:36'),
(13, 'Miguel Córdova', 'Leche Toni 1L', 6, 'pendiente', '2025-06-19 23:33:36'),
(14, 'Lucía Álvarez', 'Azúcar Valdez 2kg', 4, 'pendiente', '2025-06-19 23:33:36'),
(15, 'Raúl Mera', 'Yogur Toni 1L', 3, 'en proceso', '2025-06-19 23:33:36'),
(16, 'Sandra Araujo', 'Empanadas de viento', 8, 'pendiente', '2025-06-19 23:33:36'),
(17, 'Felipe Chicaiza', 'Café Buendía 100g', 2, 'entregado', '2025-06-19 23:33:36'),
(18, 'Tania Medina', 'Mayonesa Maggi 400g', 1, 'en proceso', '2025-06-19 23:33:36'),
(19, 'Carlos Romero', 'Té Hornimans', 2, 'pendiente', '2025-06-19 23:33:36'),
(20, 'Jenny Chamba', 'Queso fresco 500g', 3, 'enviado', '2025-06-19 23:33:36'),
(21, 'Ronald Guamán', 'Mantequilla La Favorita 250g', 2, 'pendiente', '2025-06-19 23:33:36'),
(22, 'Valeria Montalvo', 'Helado Pingüino', 5, 'entregado', '2025-06-19 23:33:36'),
(23, 'Darío Salinas', 'Agua Cielo 1.5L', 6, 'pendiente', '2025-06-19 23:33:36'),
(24, 'Maritza Cueva', 'Toalla Scott', 3, 'enviado', '2025-06-19 23:33:36'),
(25, 'Edgar Tipán', 'Carne molida 500g', 2, 'en proceso', '2025-06-19 23:33:36'),
(26, 'Tatiana Espinosa', 'Huevos criollos 12u', 1, 'pendiente', '2025-06-19 23:33:36'),
(27, 'Franklin Yánez', 'Chifles Diana', 4, 'pendiente', '2025-06-19 23:33:36'),
(28, 'Alexandra Loor', 'Canguil natural 100g', 2, 'pendiente', '2025-06-19 23:33:36'),
(29, 'Kevin López', 'Salsa de tomate Alimentos Polar', 3, 'en proceso', '2025-06-19 23:33:36'),
(30, 'Jessica Vera', 'Pan de Ambato', 8, 'pendiente', '2025-06-19 23:33:36'),
(31, 'Óscar Viteri', 'Fréjol rojo 1kg', 3, 'entregado', '2025-06-19 23:33:36'),
(32, 'Nicolás Pazmiño', 'Vinagre La Favorita 500ml', 1, 'pendiente', '2025-06-19 23:33:36'),
(33, 'Paola Jiménez', 'Gelatina Gellibert', 5, 'pendiente', '2025-06-19 23:33:36'),
(34, 'Leonardo Giler', 'Cereal Corn Flakes 300g', 2, 'en proceso', '2025-06-19 23:33:36'),
(35, 'Miriam Guerrero', 'Harina de maíz Doña Pepa', 3, 'pendiente', '2025-06-19 23:33:36'),
(36, 'Esteban Quimbiamba', 'Pan integral', 4, 'en proceso', '2025-06-19 23:33:36'),
(37, 'Angela Tituana', 'Gaseosa Manzana', 3, 'enviado', '2025-06-19 23:33:36'),
(38, 'Manuel Navas', 'Sopa instantánea Maggi', 6, 'pendiente', '2025-06-19 23:33:36'),
(39, 'Karla Pérez', 'Naranjas 1kg', 2, 'pendiente', '2025-06-19 23:33:36'),
(40, 'Julio Quishpe', 'Papel higiénico Familia 12u', 1, 'entregado', '2025-06-19 23:33:36'),
(41, 'Delfina Andrade', 'Bananos 1kg', 1, 'pendiente', '2025-06-19 23:33:36'),
(42, 'Ricardo Erazo', 'Galletas Chokis', 3, 'en proceso', '2025-06-19 23:33:36'),
(43, 'Marisol Tapia', 'Yuca 2kg', 2, 'pendiente', '2025-06-19 23:33:36'),
(44, 'Eduardo Arias', 'Maicena Maizena', 1, 'pendiente', '2025-06-19 23:33:36'),
(45, 'Viviana Guamán', 'Avena Quaker 400g', 2, 'entregado', '2025-06-19 23:33:36'),
(46, 'César Medina', 'Nescafé Tradición 170g', 2, 'enviado', '2025-06-19 23:33:36'),
(47, 'Nathaly Andrade', 'Chocolates Pacari', 2, 'enviado', '2025-06-19 23:33:36'),
(48, 'Elena Rosero', 'Lechuga americana', 1, 'pendiente', '2025-06-19 23:33:36'),
(49, 'Álvaro Villacrés', 'Tomates 1kg', 2, 'en proceso', '2025-06-19 23:33:36'),
(50, 'Fabiola Cando', 'Cebolla paiteña 1kg', 3, 'pendiente', '2025-06-19 23:33:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
