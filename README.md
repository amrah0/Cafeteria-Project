# Cafeteria-Project
ITI | Cafeteria Project


#### Database Schema:
+ Create a new database user for the project:
```sql
CREATE USER 'php'@'localhost' IDENTIFIED BY 'a_strong_password'; -- Replace with a strong password

GRANT ALL PRIVILEGES ON *.* TO 'php'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES; -- Apply the changes
```
+ Create a new database:
```sql
CREATE DATABASE php_cafeteria_project
```
+ Use the newly created database:
```sql
USE php_cafeteria_project
```
+ Copy the following code, and paste it in MySQL.
```sql
-- User Table
CREATE TABLE User (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),  -- Remember to hash passwords!
    role ENUM('admin', 'user'), -- Add more roles as needed
    room_id INT UNSIGNED,
    image_url VARCHAR(255), -- Or TEXT if URLs are very long
    FOREIGN KEY (room_id) REFERENCES Room(id)
);

-- Product Table
CREATE TABLE Product (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255), -- Or TEXT if names can be very long
    price DECIMAL(10, 2), -- Or FLOAT if absolute precision isn't critical
    category_id INT UNSIGNED,
    image_url VARCHAR(255), -- Or TEXT if URLs are very long
    FOREIGN KEY (category_id) REFERENCES Category(id)
);

-- Category Table
CREATE TABLE Category (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

-- Order Table
CREATE TABLE `Order` (  -- Use backticks around "Order" as it might be a reserved word
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    total_price DECIMAL(10, 2), -- Or FLOAT
    status ENUM('processing', 'out for delivery', 'done', 'cancelled'), -- Add more statuses
    room_id INT UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Automatically set creation time
    notes TEXT, -- Or create a separate Notes table (see below)
    FOREIGN KEY (user_id) REFERENCES User(id),
    FOREIGN KEY (room_id) REFERENCES Room(id)
);

-- Order_Product Table (Join table)
CREATE TABLE Order_Product (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT UNSIGNED,
    product_id INT UNSIGNED,
    quantity SMALLINT UNSIGNED, -- Or SMALLINT UNSIGNED
    FOREIGN KEY (order_id) REFERENCES `Order`(id),
    FOREIGN KEY (product_id) REFERENCES Product(id)
);

-- Room Table
CREATE TABLE Room (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    floor TINYINT UNSIGNED -- Or TINYINT UNSIGNED
);
```