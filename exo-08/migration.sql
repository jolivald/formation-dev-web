CREATE DATABASE IF NOT EXISTS `crud`
  CHARACTER SET `utf8`
  COLLATE `utf8_general_ci`;

CREATE TABLE IF NOT EXISTS `crud`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(255) NOT NULL,
  `mot_de_passe` VARCHAR(255) NOT NULL,
  `description` LONGTEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;
