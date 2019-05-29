drop database if exists cafeteria;
create database cafeteria;
use cafeteria;

create table menu(
	id_platillo int not null primary key auto_increment, 
	nombre_platillo varchar(50), 
    elaboracion varchar(150),
	precio double,
	estado_menu int);
create table guisados(
	id_guisado int not null primary key auto_increment,
	nombre_guisado varchar(25),
	estado_guisado int);
create table pedidos(
	id_pedido int not null primary key auto_increment, 
	nombre_cliente varchar(50), 
    fid_platillo int, 
    fid_guisado int ,
	foreign key(fid_platillo) references menu(id_platillo), 
	foreign key(fid_guisado) references guisados(id_guisado));
    
    
insert into menu(nombre_platillo, elaboracion, precio, estado_menu) values('Torta', 'Elaborado con telera, lechuga, jitomate, cebolla, chiles encurtidos, aderezo y el guisado de su preferencia.', 25, 1);
insert into menu(nombre_platillo, elaboracion, precio, estado_menu) values('Huaraches', 'Elaborado de tortilla nixtamalizada, rellena de queso asadero y el guisado de su preferencia.', 25, 1);
insert into menu(nombre_platillo, elaboracion, precio, estado_menu) values('Sandwich', 'Elaborado con pan blancode caja, con vegetales frescos y el guisado de su preferencia.',20, 1);
insert into menu(nombre_platillo, elaboracion, precio, estado_menu) values('Quesadillas', 'Elaborado con tortilla de harina, rellena de queso asadero el guisado de su preferencia.', 15, 1);
insert into menu(nombre_platillo, elaboracion, precio, estado_menu) values('Burritos', 'Elaborado con tortilla de harina, relleno de frijoles, queso asadero y el guisado de su preferencia.', 15, 1);
insert into menu(nombre_platillo, elaboracion, precio, estado_menu) values('Molletes', 'Elaborado de telera, frijoles, queso asadero y el guisado de su preferencia.', 10, 1);
insert into menu(nombre_platillo, elaboracion, precio, estado_menu) values('Gringas', 'Elaborado de tortilla de harina de 22cm, rellena de queso asadero, vegetales y el guisado de su preferencia.', 25, 1);

insert into guisados(nombre_guisado, estado_guisado) values('Milanesa', 1);
insert into guisados(nombre_guisado, estado_guisado) values('Lomo', 1);
insert into guisados(nombre_guisado, estado_guisado) values('Pastor', 1);
insert into guisados(nombre_guisado, estado_guisado) values('Bistec', 1);
insert into guisados(nombre_guisado, estado_guisado) values('Chorizo', 1);
insert into guisados(nombre_guisado, estado_guisado) values('Salchicha', 1);

insert into pedidos(nombre_cliente, fid_platillo, fid_guisado) values('Gumercinda', 2, 1);
insert into pedidos(nombre_cliente, fid_platillo, fid_guisado) values('Filemon', 5, 2);
insert into pedidos(nombre_cliente, fid_platillo, fid_guisado) values('Anastacio', 4, 5);
insert into pedidos(nombre_cliente, fid_platillo, fid_guisado) values('Zacarias', 1, 3);