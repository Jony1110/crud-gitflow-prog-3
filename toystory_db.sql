-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 17:16:46
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
-- Base de datos: `toystory_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `frase` varchar(255) DEFAULT NULL,
  `nivel` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `color`, `tipo`, `frase`, `nivel`, `foto`) VALUES
(1, 'Woody', 'Marron', 'Vaquero/Lider', '¡Hay una serpiente en mi bota!', 10, 'https://lumiere-a.akamaihd.net/v1/images/open-uri20150422-20810-10n7ovy_9b42e613.jpeg?region=0,0,450,450'),
(2, 'Buzz Lightyear', 'Verdy y Blanco', 'Guardian Espacial', '¡Al infinito y más allá!', 9, 'https://media.revistagq.com/photos/62a8546d6b74c0e2031238a6/4:3/w_1024,h_768,c_limit/buzz.jpg'),
(3, 'Forky', 'Blanco y Rojo', 'Juguete improvisado', '¿Qué es un juguete?', 8, 'https://sm.ign.com/ign_es/cover/f/forky-asks/forky-asks-a-question_4j99.jpg'),
(4, 'Bo Beep', 'Azul y Blanco', 'Pastora / Estratega', 'Siempre hay alguien a quien cuidar.', 9, 'https://hips.hearstapps.com/hmg-prod/images/toy-story-4-little-bo-peep-1560342323.jpg?crop=0.422xw:1.00xh;0.445xw,0&resize=640:*'),
(5, 'Duke Caboom', 'Rojo y Blanco', 'Stuntman / Motoquero', '¡Sí, puedo hacerlo!', 7, 'https://i0.wp.com/pixarpost.com/wp-content/uploads/2020/10/a760d-duke2bcaboom2bsolo2btoy2bstory2b42bposter2bcopy.jpg?fit=1130%2C668&ssl=1'),
(6, 'Gabby Gabby', 'Amarillo y Rojo', 'Antagonista / Muñeca', 'Solo quiero que me amen.', 6, 'https://i.pinimg.com/736x/f5/f6/4d/f5f64d3014adfd5ae827d54ec8974e63.jpg'),
(7, 'Ducky & Bunny', 'Azul y Amarillo', 'Comediantes / Peluches', 'Plan de ataque con láser.', 6, 'https://i.ytimg.com/vi/w7bTgyJ2yLs/maxresdefault.jpg'),
(8, 'Los Aliens', 'Verde', 'Ayudantes / Juguetes', '¡El gancho nos salvará!', 5, 'https://i.pinimg.com/474x/60/95/4b/60954b5494e9ad8342100fa2feb97626.jpg'),
(9, 'Benson', 'Marrón Oscuro', 'Secuaz / Títere', '...', 4, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPbYPIntYAzZAtTiXGN0HwLYeE6D2F85S8LQ&s'),
(10, 'Bonnie', 'Azul y Rosa', 'Dueña de los juguetes', 'Mi Forky no se pierde.', 10, 'https://i.ytimg.com/vi/he6tuHUb8Tw/maxresdefault.jpg'),
(11, 'Amadis', 'Amarillo', 'Profesor', 'MI meta es hacerle la vida difcil a mis estudiantes, para que sean mejores programadores', 3500, 'https://yt3.googleusercontent.com/ytc/AIdro_kLBd1JrVolnGULuRhib-QtHUV2qa9ZJnskuP81SCyqyac=s900-c-k-c0x00ffffff-no-rj');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
