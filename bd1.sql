drop database if exists cafeteria;
create database cafeteria;
use cafeteria;

create table menu(id_platillo int not null primary key auto_increment, 
nombre_platillo varchar(50), ingredientes varchar(50), precio double);
create table pedidos(id_pedido int not null primary key auto_increment, 
nombre_cliente varchar(50), fid_platillo int not null, 
foreign key(fid_platillo) references menu(id_platillo));


insert into menu(nombre_platillo, ingredientes, precio) values('quesadillas', 'tortilla, queso, etc', '15');
insert into menu(nombre_platillo, ingredientes, precio) values('burrito', 'tortilla, queso, etc', '25');
insert into pedidos(nombre_cliente, fid_platillo) values('Juanito', 1);
insert into pedidos(nombre_cliente, fid_platillo) values('Pancrasio', 2);

select nombre_cliente, nombre_platillo, precio from menu inner join pedidos on id_platillo = fid_platillo;
