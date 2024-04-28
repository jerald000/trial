-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS mydb;

-- Use the created database
USE mydb;

-- Create the admin_users table
CREATE TABLE IF NOT EXISTS admin_users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  original_password VARCHAR(255) NOT NULL,
  is_super_admin TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into admin_users table
INSERT INTO admin_users (username, email, password, original_password, is_super_admin, created_at) 
VALUES ('admin', 'admin@gmail.com', '$2y$10$BczzAkiWLcNNW1Aqk6w3POm0P265Tg/9T4gbnS2Km7zP2ZnY32vwe', 'admin123', 1, CURRENT_TIMESTAMP);

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  original_password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into users table
INSERT INTO users (username, email, password, original_password) 
VALUES ('john_doe', 'user1234@gmail.com', '$2y$10$iX.XDwv5BLv4KRFXJM3c4.6ZHjbqzg5LmqhLlTAyI.tnDIaTtQZgO', 'user123');
