-- SQL to create the quotes table
CREATE TABLE quotes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quote_email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    quote_status TINYINT(1) NOT NULL DEFAULT '0'  -- 0 = pending, 1 = processed
);