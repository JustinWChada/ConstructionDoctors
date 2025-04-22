CREATE DATABASE cd_users;

CREATE TABLE
    users (
        user_id INT PRIMARY KEY AUTO_INCREMENT,
        user_password VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE,
        first_name VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        is_active BOOLEAN DEFAULT TRUE
    );