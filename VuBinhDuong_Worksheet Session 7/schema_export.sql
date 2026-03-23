CREATE DATABASE ecommerce_db;
USE ecommerce_db;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category_id INT,
    stock INT DEFAULT 0,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Dữ liệu mẫu
INSERT INTO categories (category_name) VALUES ('Electronics'), ('Books'), ('Home & Garden');
INSERT INTO products (name, price, category_id, stock) VALUES 
('AI Laptop', 1200.00, 1, 5), 
('PHP Guide', 35.50, 2, 50),
('SQL Pro', 45.00, 2, 8);