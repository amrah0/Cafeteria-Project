# Cafeteria-Project
ITI | Cafeteria Project


#### Database Schema:
+ Create a new database user for the project:
```sql
CREATE USER 'php'@'localhost' IDENTIFIED BY 'php'; -- Replace with a strong password

GRANT ALL PRIVILEGES ON *.* TO 'php'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES; -- Apply the changes
```
+ Create a new database:
```sql
DROP DATABASE IF EXISTS php_cafeteria_project;
CREATE DATABASE php_cafeteria_project
```
+ Use the newly created database:
```sql
USE php_cafeteria_project
```
+ Copy the following code, and paste it in MySQL.
```sql
DROP TABLE IF EXISTS Room;
CREATE TABLE Room (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    floor TINYINT UNSIGNED
);

DROP TABLE IF EXISTS Category;
CREATE TABLE Category (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

DROP TABLE IF EXISTS Product;
CREATE TABLE Product (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    price DECIMAL(10, 2),
    category_id INT UNSIGNED,
    image_url VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES Category(id)
);

DROP TABLE IF EXISTS User;
CREATE TABLE User (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255), -- Remember to hash passwords!
    role ENUM('admin', 'user'),
    room_id INT UNSIGNED,
    image_url VARCHAR(255),
    FOREIGN KEY (room_id) REFERENCES Room(id)
);

DROP TABLE IF EXISTS `Order`;
CREATE TABLE `Order` (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    total_price DECIMAL(10, 2),
    status ENUM('processing', 'out for delivery', 'done', 'cancelled'),
    room_id INT UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notes TEXT,
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (room_id) REFERENCES Room(id)
);

DROP TABLE IF EXISTS Order_Product;
CREATE TABLE Order_Product (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT UNSIGNED,
    product_id INT UNSIGNED,
    quantity SMALLINT UNSIGNED,
    FOREIGN KEY (order_id) REFERENCES `Order`(id),
    FOREIGN KEY (product_id) REFERENCES Product(id)
);
```