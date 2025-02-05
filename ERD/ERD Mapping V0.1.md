5th-Feb-2025

User
-----
id (PK)
name 
email
password
role
room_id(FK)
image_url

Product
-------
id (PK)
name
price
category_id (FK)
image_url

Category
--------
id (PK)
name

Order
-----
id (PK)
user_id (FK)
total_price
status
/notes/ -> extract into it's own table?
/room_id(FK)/
created_at

Order_Product
---------
id (PK)
order_id (FK)
product_id (FK)
quantity
del/notes/ -> Order

Room
----
id (PK)
name
floor
