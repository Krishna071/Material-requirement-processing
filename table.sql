SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE DemandTable (
  Sid int not null auto_increment PRIMARY KEY,
  Demanddate date,
  Product_id int NOT NULL,
  ProductName varchar(50) NOT NULL,
  ProductReq int NOT NULL,
  Email varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO DemandTable VALUES
(1,'2022-01-01',101,'Shirt',10,'jack@123.com'),
(2,'2022-01-05',102,'Jeans',15,'peter@123.com'),
(3,'2022-01-18',101,'Shirt',5,'jack@123.com'),
(4,'2022-01-10',103,'T-Shirt',8,'luna@gmail.com'),
(5,'2022-01-21',102,'Jeans',12,'peter@123.com'),
(6,'2022-02-01',103,'T-Shirt',15,'luna@gmail.com');

CREATE TABLE Materialrequirements (
  Product_id INT NOT NULL PRIMARY KEY,
  ProductName varchar(20),
  Yarns INT NOT NULL,
  DYES int NOT NULL,
  Fabrics INT NOT NULL,
  Decoratives int NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO Materialrequirements VALUES
(101,"Shirt",10,15,20,20),
(102,"Jeans",20,5,10,10),
(103,"T-Shirt",10,15,25,30);

CREATE TABLE PriceTable(
    Material varchar(20) PRIMARY KEY,
    price INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO PriceTable VALUES
("Yarns",10),
("Dyes",5),
("Fabrics",15),
("Decoratives",20);

CREATE TABLE availableData(
    Material varchar(20) PRIMARY KEY,
    rem INT,
    FOREIGN KEY (Material) REFERENCES PriceTable( Material)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO availableData VALUES
("Yarns",100),
("Dyes",50),
("Fabrics",150),
("Decoratives",200);

CREATE TABLE AdminDATA(
  mail varchar(30) PRIMARY KEY,
  Pass_word varchar(20)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO AdminDATA VALUES
("abc@123.com","qwertyuiop");

CREATE TABLE UserDATA(
    mail varchar(30) PRIMARY KEY,
    Pass_word varchar(20)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO UserDATA VALUES
("jack@123.com","jack"),
("peter@123.com","peter");
