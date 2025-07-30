-- POWERGYM Database Creation Script
-- Database: gymdb
-- Created for POWERGYM application

-- Create the database
CREATE DATABASE IF NOT EXISTS gymdb;
USE gymdb;

-- Drop existing tables if they exist
DROP TABLE IF EXISTS client_schedule;
DROP TABLE IF EXISTS client_info;

-- Create client_info table (main users table)
CREATE TABLE client_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    activites TEXT,
    schedule TEXT,
    full_price DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create client_schedule table (for storing user schedules)
CREATE TABLE client_schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    activities VARCHAR(255) NOT NULL,
    day VARCHAR(50) NOT NULL,
    time VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (email) REFERENCES client_info(email) ON DELETE CASCADE
);

-- Insert sample admin users
INSERT INTO client_info (name, email, password, phone, activites, full_price) VALUES
('mohamed', 'admin1@powergym.com', 'admin123', '+1234567890', 'Yoga, Pilates, Cardio', 150.00),
('jebali', 'admin2@powergym.com', 'admin456', '+1234567891', 'Strength Training, Boxing', 200.00);

-- Insert sample regular users
INSERT INTO client_info (name, email, password, phone, activites, full_price) VALUES
('John Doe', 'john@example.com', 'password123', '+1234567892', 'Cardio, Yoga', 100.00),
('Jane Smith', 'jane@example.com', 'password456', '+1234567893', 'Pilates, Strength Training', 120.00),
('Mike Johnson', 'mike@example.com', 'password789', '+1234567894', 'Boxing, Cardio', 80.00);

-- Insert sample schedules
INSERT INTO client_schedule (email, activities, day, time) VALUES
('john@example.com', 'Cardio', 'Monday', '09:00 AM'),
('john@example.com', 'Yoga', 'Wednesday', '06:00 PM'),
('jane@example.com', 'Pilates', 'Tuesday', '10:00 AM'),
('jane@example.com', 'Strength Training', 'Thursday', '07:00 PM'),
('mike@example.com', 'Boxing', 'Friday', '05:00 PM'),
('mike@example.com', 'Cardio', 'Saturday', '08:00 AM');

-- Create indexes for better performance
CREATE INDEX idx_client_info_email ON client_info(email);
CREATE INDEX idx_client_info_name ON client_info(name);
CREATE INDEX idx_client_schedule_email ON client_schedule(email);

-- Show the created tables
SHOW TABLES;

-- Show table structures
DESCRIBE client_info;
DESCRIBE client_schedule;

-- Show sample data
SELECT * FROM client_info;
SELECT * FROM client_schedule; 