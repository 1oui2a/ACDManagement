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

CREATE TABLE USERS (
    user_id INT(30) UNSIGNED NOT NULL AUTO_INCREMENT,
    -- UNSIGNED means that the number cannot be negative
    username VARCHAR(200) NOT NULL,
    password VARBINARY(255) NOT NULL,
    PRIMARY KEY (user_id),
    UNIQUE KEY (username) -- no two people can have same username
);

INSERT INTO
    USERS (username, password)
    VALUES
    ("admin", '24327924313024475753694a4d33543456306c4d5169364b384e314a75335342566e695a44373871787447684b4e65594a3355427657324561697171');