CREATE DATABASE bookings;
USE bookings;

 CREATE TABLE booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    email VARCHAR(100),
    date DATE,
    time TIME
);