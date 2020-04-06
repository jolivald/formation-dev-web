CREATE DATABASE IF NOT EXISTS `hydrate`
  CHARACTER SET `utf8`
  COLLATE `utf8_general_ci`;

CREATE TABLE IF NOT EXISTS `hydrate`.`vehicle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `wheel_condition` BOOLEAN NOT NULL,
  `fuel_level` INT NOT NULL,
  `engine_power` ENUM('LOW', 'MID', 'HIGH') NOT NULL DEFAULT 'LOW',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `hydrate`.`vehicle` (`id`, `wheel_condition`, `fuel_level`, `engine_power`)
  VALUES (NULL, '1', '100', 'LOW');
