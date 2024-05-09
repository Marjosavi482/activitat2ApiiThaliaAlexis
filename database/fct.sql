
CREATE DATABASE IF NOT EXISTS `fct` DEFAULT CHARACTER SET  utf8 COLLATE utf8_spanish2_ci;
USE `fct`;

-- Creació de les taules EMPRESA, VALORACIO i USUARI amb les seves dades corresponents

-- Taula EMPRESA amb les dades de les empreses
CREATE TABLE `EMPRESA`(
    `emp_id` int(3) NOT NULL AUTO_INCREMENT,
    `emp_nom` varchar(50) NOT NULL,
    `emp_ubicacio` varchar(50) NOT NULL,
    `emp_sector` varchar(50) NOT NULL,
    `emp_descripcio` varchar(150) NOT NULL,
    PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO EMPRESA (emp_id, emp_nom, emp_ubicacio, emp_sector, emp_descripcio) VALUES
(1, 'Indra', 'Madrid', 'Tecnología', 'Empresa líder en consultoría y tecnología en España.'),
(2, 'Tecnocom', 'Barcelona', 'Tecnología', 'Especializada en servicios y soluciones tecnológicas.'),
(3, 'Everis', 'Madrid', 'Tecnología', 'Empresa internacional de consultoría que ofrece soluciones de negocio, estrategia, desarrollo y mantenimiento de aplicaciones tecnológicas.'),
(4, 'GFT España', 'Madrid', 'Tecnología', 'Empresa dedicada a la consultoría tecnológica y el desarrollo de soluciones para el sector financiero.'),
(5, 'Accenture España', 'Madrid', 'Tecnología', 'Multinacional de servicios profesionales que ofrece servicios de consultoría, estrategia, digital, tecnología y operaciones.'),
(6, 'T-Systems Iberia', 'Barcelona', 'Tecnología', 'Proveedor de servicios de tecnología de la información y la comunicación (TIC).');


-- Taula VALORACIO amb les dades de les valoracions
CREATE TABLE `VALORACIO` (
    `val_id` int(3) NOT NULL AUTO_INCREMENT,
    `emp_id` int(3) NOT NULL,
    `usu_mail` varchar(255) NOT NULL,
    `val_puntuacio` int(10) NOT NULL,
    `val_comentari` text,
    `val_data` date NOT NULL,
    PRIMARY KEY (`val_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `VALORACIO` (`emp_id`, `usu_mail`, `val_puntuacio`, `val_comentari`, `val_data`) VALUES
(1, 'juan@example.com', 4, 'Buena empresa, excelente servicio al cliente.', '2024-05-01'),
(1, 'ana@example.com', 5, 'Muy satisfecho con el producto y el soporte técnico.', '2024-05-02'),
(2, 'carlos@example.com', 3, 'Servicio decente pero podría mejorar en algunos aspectos.', '2024-05-03'),
(3, 'laura@example.com', 5, 'Excelente experiencia, personal muy competente.', '2024-05-04'),
(3, 'maria@example.com', 4, 'Buen producto, pero el proceso de compra fue un poco confuso.', '2024-05-05');


-- Taula USUARI amb les dades dels usuaris
CREATE TABLE `USUARI` (
  `usu_mail` varchar(255) NOT NULL,
  `usu_contra` varchar(255) NOT NULL,
  `usu_nivell` varchar(10) NOT NULL,
    PRIMARY KEY (`usu_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `USUARI` (`usu_mail`, `usu_contra`) VALUES
('david.marin@itb.cat', 'qwe123', 'admin'),
('thalia.soler.7e7@itb.cat', '123qwe', 'admin'),
('jordi.cidoncha@itb.cat', 'qwerty','user');
