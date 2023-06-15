SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `netware` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `netware`;

CREATE TABLE `familias` (
  `cod` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `familias` (`cod`, `nombre`) VALUES
('PC', 'PCs Sobremesa'),
('PORT', 'Ordenadores Portátiles'),
('MOTHER', 'Placas Base'),
('MON', 'Monitores');

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_corto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
   `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pvp` decimal(10,2) NOT NULL,
  `familia` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*cuidado al poner comillas a las pulgadas del monitor, luego al hacer split con js, no nos cogía el precio, no encontraba el final del string*/
INSERT INTO `productos` (`id`,`nombre_corto`, `nombre`, `descripcion`, `pvp`, `familia`) VALUES
(1, 'MSI MPG B550 GAMING', 'MSI MPG B550 GAMING PLUS', 'La serie MPG saca lo mejor de los jugadores al permitir una expresión completa en color con control avanzado de iluminación RGB y sincronización. Experimente en otro nivel de personalización con una tira de LED frontal que proporciona notificaciones convenientes en el juego y en tiempo real. Con la serie MPG, transforme su equipo en el centro de atención y las mejores tablas de clasificación con estilo.', '139.90', 'MOTHER'),
(2, 'Gigabyte B550 AORUS', 'Gigabyte B550 AORUS ELITE V2', 'La placa base Gigabyte B550 AORUS ELITE V2 es una excelente opción para aquellos que buscan una plataforma de alta calidad y rendimiento para su PC de escritorio. Una de las características más destacadas de la placa base es su compatibilidad con la última generación de procesadores AMD Ryzen de la serie 5000.', '141.99','MOTHER'),
(3, 'Gigabyte B560M DS3H V2','Gigabyte B560M DS3H V2', 'Placa base Intel® B560 ultra duradera con VRM digital directo de 6 + 2 fases, diseño PCIe 4.0 * completo, PCIe 4.0 M.2, LAN para juegos GIGABYTE 8118, audio HD de 8 canales con tapas de audio, USB TYPE-C®, RGB FUSION 2.0 , Q-Flash Plus.', '89.99', 'MOTHER'),
(4, 'Asus PRIME B450M-A II', 'Asus PRIME B450M-A II', 'Tarjeta Madre micro ATX AMD B450 (Ryzen AM4) con soporte M.2, HDMI / DVI-D / D-Sub, SATA 6 Gbps, 1 Gb Ethernet, USB 3.2 Gen 2 Tipo-A, BIOS FlashBack™ e iluminación Aura Sync RGB', '82.36', 'MOTHER'),
(5, 'Acer Predator Orion 3000','Acer Predator Orion 3000 PO3-640 Intel Core i5-12400F/16GB/1TB SSD/RTX 3060Ti', 'Dentro de los confines de la Orion 3000, pequeña pero claramente definida, se encuentra un monstruo al acecho: una PC potente y compacta ansiosa por poner a prueba su procesador Intel® Core™ i7 de 12.ª generación. Complételo con hasta una GeForce RTX™ 3060 y disfrute viendo cómo esos marcos suben más y más.', '1449', 'PC'),
(6, 'PcCom Silver Élite','PcCom Silver Élite AMD Ryzen 5 5500/16GB/500GB SSD/Radeon RX 6600', 'Prepárate para el futuro con nuestro PcCom Silver, gracias a la nueva gráfica AMD Radeon RX 6600 8GB GDDR6 y el nuevo procesador AMD Ryzen 5 5500 de 6 núcleos y 12 hilos estarás preparado para el gaming más puro, !No es el futuro, es el presente!. Una máquina indomable que te brindará una sensación de potencia descomunal a la hora de jugar. Creada y ensamblada con la mayor precisión y los mejores componentes del momento, el PcCom Silver posee unas condiciones inigualables para el juego, superando ampliamente los requisitos técnicos requeridos por los juegos que actualmente van apareciendo en el mercado.', '999.36', 'PC'),
(7, 'Acer Predator Orion 7000','Acer Predator Orion 7000 PO7-640 Intel Core i7-12700K/16GB/1TB SSD/RTX 3090', 'Presume de nuevo y potente PC Gaming e ilumina tu habitación con el ambiente multicolor de ARGB mientras los potentes ventiladores FrostBlade™ susurran en una interminable armonía de alta velocidad, que proporciona una refrigeración constante al hercúleo hardware que se esconde en su interior.', '3449.01', 'PC'),
(8, 'PcCom Platinum','PcCom Platinum AMD Ryzen 7 5800X3D/32GB/1TB SSD/RX 7900 XT', 'Prepárate para el futuro, gracias a procesadores AMD Ryzen y a su potente gráfica de nueva generación Radeon RX 7900XT estarás preparado para la invasión de la Realidad Virtual, !No es el futuro, es el presente!, superando ampliamente los requisitos técnicos requeridos por los juegos que actualmente van apareciendo en el mercado.', '2615.61', 'PC'),
(9, 'Samsung Galaxy Book3','Samsung Galaxy Book3 Pro Intel Evo Core i7-1360P/16GB/512GB SSD/16', 'Sumérgete en una resolución 3K (2880 x 1800) real y nítida que te permite ver todo con colores vivos y detalles definidos, incluso si tu oficina está al aire libre. Además, disfruta de una fluidez de 120 Hz mientras escribes, pulsas y dibujas.', '1989', 'PORT'),
(10, 'PcCom Revolt 3060', 'PcCom Revolt 3060 Intel Core i7-12700H/32GB/500GB SSD/RTX 3060/15.6', 'Haz tu vida más fácil con el nuevo portátil PcCom Revolt 3060, con procesador Intel® de 12ª generación, listo para finalizar con éxito los trabajos más arduos o ser el más jugón en tus tardes libres. Disfruta de la tecnología NVIDIA RTX 3060 con gráficos más realistas e inmersivos, así como de una pantalla de alta resolución. Además, mejora la experiencia de uso gracias al uso del control center habilitado para descarga.', '1289.91', 'PORT'),
(11, 'HP 15S-fq2159ns','HP 15S-fq2159ns Intel Core i3-1115G4/8GB/256GB SSD/15.6', 'Haz más cosas desde donde quieras. Todo el día. Permanece conectado a lo que más te importa gracias a una batería de larga duración y a un diseño ligero y fino con bisel con microborde. El ordenador portátil HP de 15,6 pulgadas, diseñado para mantener la productividad y estar entretenido en cualquier parte, ofrece un rendimiento fiable y una amplia pantalla que te permiten hacer streaming, navegar y completar tareas con rapidez.', '399', 'PORT'),
(12, 'Acer Aspire 3','Acer Aspire 3 A315-43-R4VC AMD Ryzen 5 5500U/8GB/512GB SSD/15.6', 'Ya estés en casa, en clase o en el trabajo, consigue todo el rendimiento que necesitas con el procesador AMD de Acer Aspire 3, que mantiene el orden y logra que tus aplicaciones funcionen de forma constante y sin problemas.', '499', 'PORT'),
(13, 'Acer EK240YCbi 23.8', 'Acer EK240YCbi 23.8 FullHD 75Hz FreeSync', 'Disfruta de una experiencia visual optimizada con un monitor de la serie EK0. Gracias a la pantalla LED Full HD de 1920 x 1080, un amplio ángulo de visión de 178º y un soporte ergonómico, podrás ver cómodamente todas tus imágenes y vídeos con un nivel de detalle asombroso.', '98.59', 'MON'),
(14, 'Newskill Icarus 24.5', 'Newskill Icarus IC24FI360 24.5 LED IPS FullHD 360Hz G-Sync Compatible' , 'El modelo Icarus IC24FI360, llega para revolucionar los juegos, como los habías vivido hasta ahora. Este monitor gaming de 24,5”, con panel IPS y resolución FHD de 1920 x 1080 píxeles es muchísimo más que un monitor cualquiera. Sus características generales ya lo hacen una opción genial para jugar, y sus 360Hz de tasa de refresco no tienen comparación, nada podrá batir la velocidad y precisión con la que jugarás, gracias a Icarus IC24FI360.', '399.99', 'MON'),
(15, 'Acer Nitro 23.8', 'Acer Nitro KG241YSbiip 23.8 LED FullHD 165Hz FreeSync Premium', 'Lleva tu experiencia de juego al siguiente nivel con imágenes fluidas y envolventes y colores realistas con una actualización de hasta 165 Hz. Explora nuevos mundos con una impresionante resolución Full HD con AMD FreeSync™ Premium.', '159.99', 'MON'),
(16, 'PcCom Elysium 23.8','PcCom Elysium GO2480CV 23.8 LED FullHD 165Hz Freesync Curva', 'Descubre el nuevo monitor Elysium GO2480CV creado por PCCOM. Creado para gamers profesionales, nuestro exclusivo modelo de 24 pulgadas Curvo 1800R te ofrecerá una experiencia totalmente inmersiva en el juego. Sumérgete en el juego con su tasa de refresco de hasta 165 Hz con 1 Ms de respuesta MPRT en resolución FHD.', '189', 'MON');


CREATE TABLE `usuarios` (
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(54) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `direccion` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `familias`
  ADD PRIMARY KEY (`cod`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prod_fam` (`familia`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

ALTER TABLE `productos`
  ADD CONSTRAINT `fk_prod_fam` FOREIGN KEY (`familia`) REFERENCES `familias` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE pedido (
  id INT(11) NOT NULL AUTO_INCREMENT,
  usuario varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  fecha DATE NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (usuario) REFERENCES usuarios(usuario) ON DELETE CASCADE
);

CREATE TABLE productos_pedido (
  pedido_id INT(11) NOT NULL,
  producto_id INT(11) NOT NULL,
  unidades INT(11) NOT NULL,
  FOREIGN KEY (pedido_id) REFERENCES pedido(id) ON DELETE CASCADE,
  FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE
);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
