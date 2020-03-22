CREATE DATABASE IF NOT EXISTS `test`
  CHARACTER SET `utf8mb4`
  COLLATE `utf8mb4_unicode_ci`;

CREATE TABLE IF NOT EXISTS `test`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `lastName` VARCHAR(255) NOT NULL ,
  `firstName` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;
