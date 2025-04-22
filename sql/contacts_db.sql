-- SQL Table Schema

CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    contact_email VARCHAR(255) NOT NULL,
    contact_country_code VARCHAR(10),
    contact_phone_number VARCHAR(20),
    contact_subject VARCHAR(255),
    contact_message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    contact_status TINYINT(1) NOT NULL DEFAULT '0'
);