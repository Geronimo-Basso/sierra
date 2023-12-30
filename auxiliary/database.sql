SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Creating the modified user table
CREATE TABLE `user` (
`id_user` INT NOT NULL AUTO_INCREMENT,
`email` VARCHAR(255) COLLATE utf8_spanish_ci NOT NULL,
`password` VARCHAR(255) COLLATE utf8_spanish_ci NOT NULL,
`name` VARCHAR(255) COLLATE utf8_spanish_ci,
`lastname` VARCHAR(255) COLLATE utf8_spanish_ci,
`is_admin` BOOLEAN DEFAULT FALSE,
PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `campaign` (
`id_campaign` INT NOT NULL AUTO_INCREMENT,
`title` VARCHAR(255) COLLATE utf8_spanish_ci,
`description` TEXT COLLATE utf8_spanish_ci,
`fund_target` FLOAT,
`image` BLOB,
PRIMARY KEY (`id_campaign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `donate` (
`id_donate` INT NOT NULL AUTO_INCREMENT,
`id_user` INT NOT NULL,
`id_campaign` INT NOT NULL,
`amount` FLOAT,
`datetime` TIMESTAMP,
PRIMARY KEY (`id_donate`),
FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`),
FOREIGN KEY (`id_campaign`) REFERENCES `campaign`(`id_campaign`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

COMMIT;