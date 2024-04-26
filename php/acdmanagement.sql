-- DROP DATABASE IF EXISTS VEHICLE_DB;
-- CREATE DATABASE VEHICLE_DB;

-- Set storage engine to InnoDB
SET default_storage_engine=InnoDB;
-- Delete database if it currently exists
DROP DATABASE IF EXISTS acdmanagement;
-- Create database with utf8mb4 character set and utf8mb4_unicode_ci collation
CREATE DATABASE acdmanagement CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- Use the newly created database
USE acdmanagement;


CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    service VARCHAR(50) NOT NULL
);