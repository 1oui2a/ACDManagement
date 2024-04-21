-- Set storage engine to InnoDB
SET default_storage_engine=InnoDB;
-- Delete database if it currently exists
DROP DATABASE IF EXISTS databaseACD;
-- Create database with utf8mb4 character set and utf8mb4_unicode_ci collation
CREATE DATABASE databaseACD CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- Use the newly created database
USE databaseACD;

/*CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`)
VALUES
	(1,'admin','$2y$10$n8NIJ5zsmtIxASEZSzWyi.7Pu50x5Z8F1uGcTiNA4rEXbS78EOuha'),
	(2,'email123@email.com','$2y$10$9OOFy5W.Vz0VapyS5U.ZqujRiXnklh48Nhc3qGfdSKxLbXRH3i87m');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;