-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-01-2024 a las 15:55:21
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Sierra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campaign`
--

CREATE TABLE `campaign` (
  `id_campaign` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fund_target` float DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `campaign`
--

INSERT INTO `campaign` (`id_campaign`, `title`, `description`, `fund_target`, `image_url`) VALUES
(1, 'Honrar a un Héroe: La Travesía de Geronimo Basso', 'Únase a nosotros para honrar a Geronimo Basso, un valiente soldado uruguayo español cuyo servicio a nuestra nación ha sido marcado por la valentía y la dedicación. A través de esta campaña, pretendemos producir un documental que muestre su extraordinaria trayectoria y los sacrificios que realizó. La historia de Geronimo no es solo de compromiso militar, sino también de resiliencia personal y compromiso con su país. El documental explorará sus primeros años en Uruguay, las razones detrás de su decisión de servir en el ejército español y las experiencias impactantes que encontró. Nuestro objetivo es traer su inspiradora historia al primer plano, destacando los valores universales de coraje, lealtad y perseverancia. Su apoyo ayudará a financiar los costos de producción, incluyendo filmación, edición y distribución, asegurando que el legado de Geronimo Basso sea celebrado y recordado.', 50000, 'image_659570164cfd81.67886079.png'),
(2, 'Apoyo para Jorge Castilla - Un Legado Canario', 'Esta campaña es un llamado a la acción para apoyar a Jorge Castilla, un dedicado soldado canario que ha dado todo en el cumplimiento de su deber. Jorge sufrió una lesión que cambió su vida durante su servicio, y ahora, más que nunca, necesita nuestro apoyo colectivo para su tratamiento médico y rehabilitación. Esta campaña no se trata solo de satisfacer sus necesidades de atención médica inmediatas, sino también de asegurar su bienestar y recuperación a largo plazo. La historia de Jorge es de un compromiso inquebrantable con su nación y sus compañeros soldados, a menudo poniendo su seguridad por encima de la suya. Los fondos recaudados contribuirán directamente a la atención médica especializada, programas de rehabilitación y ajustes necesarios en el hogar para ayudar en su recuperación. Al apoyar a Jorge, no solo estamos reconociendo sus sacrificios, sino también reforzando un mensaje de solidaridad y gratitud hacia aquellos que sirven a nuestro país.\r\n', 75000, 'image_659570310ec823.52824418.png'),
(3, 'Manuel Contreras: Fondo Educativo de un Soldado Andaluz', 'Apoye el futuro de Manuel Contreras, un soldado andaluz cuya valentía en el servicio ha sido ejemplar. El objetivo de nuestra campaña es recaudar fondos para la educación y el desarrollo profesional de Manuel, ayudándolo en su transición a la vida civil después de años de servicio militar. El sueño de Manuel es cursar estudios superiores y desarrollar habilidades que le abran nuevas oportunidades profesionales, permitiéndole seguir contribuyendo a la sociedad de maneras significativas. Esta campaña es más que asistencia financiera; se trata de empoderar a un veterano para forjar un nuevo camino, lleno de esperanza y oportunidades. La historia de Manuel refleja la resiliencia y adaptabilidad de nuestros soldados, y al apoyar sus aspiraciones educativas, estamos invirtiendo en un futuro que honra su compromiso y sacrificios.', 60000, 'image_6595704f0947c0.17319135.png'),
(4, 'Diego Ramírez: Ayuda para una Familia de Soldado', 'Participe en la causa de Diego Ramírez, un dedicado soldado español, que ahora busca apoyo para su familia. Esta campaña tiene como meta reunir fondos para asistir a la familia de Diego en un momento de necesidad. Después de servir fielmente a su país, Diego enfrenta desafíos personales y económicos significativos que afectan a sus seres queridos. Nuestro propósito es brindarle a su familia el soporte financiero necesario para superar estos tiempos difíciles, asegurando su bienestar y estabilidad. Apoyar a Diego y su familia no es solo un acto de generosidad, sino también un reconocimiento a su servicio y sacrificio. Cada contribución ayudará a esta familia a mantenerse firme y afrontar el futuro con mayor seguridad y esperanza. La historia de Diego es un testimonio de dedicación y amor por su familia, y su bienestar es una prioridad para todos nosotros que valoramos su compromiso y entrega.', 50000, 'image_659572b37c0fc7.43079664.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donate`
--

CREATE TABLE `donate` (
  `id_donate` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_campaign` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `name`, `lastname`, `is_admin`) VALUES
(1, 'admin@sierra.com', '$2y$10$XXXcFM./NHPOpTc3cjcmIeABb22MeAaZBApAKB6YVwucAHNoCPwii', 'Admin', 'Admin', 1),
(2, 'geronimo@sierra.com', '$2y$10$IwItiLW1NQ8SgPWJQzn9TewmakZWO53xeDoYHKQnBZVgDPGnrH6nC', 'Geronimo', 'Basso Sosa', 0),
(3, 'jorge@sierra.com', '$2y$10$F.cM5gmdTDR3k0oJwJ.VYOdm9cfZ7q7wCtmwAx6/3vaNATPdZTC0.', 'Jorge', 'Castilla', 0),
(4, 'manuel@sierra.com', '$2y$10$4HPx7zN5lgF2eamIIJTxCeO0g7kQoM.sXlQLCp6Z6ONnh9tQV2dRe', 'Manuel', 'Contreras', 0),
(5, 'gero@gmail.com', '$2y$10$Z7p/k5czzjbyGB/OQRC1te6mX/zkrw5WJiZghAPi/F4YpgWhVBdRy', 'Geronimo', 'Basso Sosa', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id_campaign`);

--
-- Indices de la tabla `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id_donate`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_campaign` (`id_campaign`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id_campaign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `donate`
--
ALTER TABLE `donate`
  MODIFY `id_donate` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `donate`
--
ALTER TABLE `donate`
  ADD CONSTRAINT `donate_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `donate_ibfk_2` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id_campaign`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
