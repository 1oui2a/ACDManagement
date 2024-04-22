-- DROP DATABASE IF EXISTS VEHICLE_DB;
-- CREATE DATABASE VEHICLE_DB;

-- Set storage engine to InnoDB
SET default_storage_engine=InnoDB;
-- Delete database if it currently exists
DROP DATABASE IF EXISTS databaseACD;
-- Create database with utf8mb4 character set and utf8mb4_unicode_ci collation
CREATE DATABASE databaseACD CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- Use the newly created database
USE databaseACD;

 CREATE TABLE booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    email VARCHAR(100),
    date DATE,
    time TIME
);