DROP TABLE IF EXISTS PizzaPalace;
CREATE TABLE PizzaPalace(
    order_id INT AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    address varchar(250) NOT NULL,
    pizzasize varchar(255) NOT NULL,
    toppings  varchar(255),
    specialinstructions varchar(255),
    PRIMARY KEY (order_id)
);