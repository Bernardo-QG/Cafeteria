drop database if exists cafeteria;
create database cafeteria;
use cafeteria;

create table menu(
	id_platillo int not null primary key auto_increment, 
	nombre_platillo varchar(50), 
    elaboracion varchar(150), 
    precio double);
create table guisados(
	id_guisado int not null primary key auto_increment,
	nombre_guisado varchar(25));
create table pedidos(
	id_pedido int not null primary key auto_increment, 
	nombre_cliente varchar(50), 
    fid_platillo int not null, 
    fid_guisado int not null, 
    nota varchar(50), 
	foreign key(fid_platillo) references menu(id_platillo), 
	foreign key(fid_guisado) references guisados(id_guisado));
    
    
insert into menu(nombre_platillo, elaboracion, precio) values('Torta', 'Elaborado con telera, lechuga, jitomate, cebolla, jalapeños encurtidos, aderezo y el guisado de su preferencia.', 25);
insert into menu(nombre_platillo, elaboracion, precio) values('Huaraches', 'Elaborado de tortilla nixtamalizada, rellena de queso asadero y el guisado de su preferencia.', 25);
insert into menu(nombre_platillo, elaboracion, precio) values('Sándwich', 'Elaborado con pan blancode caja, con vegetales frescos y el guisado de su preferencia.',20);
insert into menu(nombre_platillo, elaboracion, precio) values('Quesadillas', 'Elaborado con tortilla de harina, rellena de queso asadero el guisado de su preferencia.', 15);
insert into menu(nombre_platillo, elaboracion, precio) values('Burritos', 'Elaborado con tortilla de harina, relleno de frijoles, queso asadero y el guisado de su preferencia.', 15);
insert into menu(nombre_platillo, elaboracion, precio) values('Molletes', 'Elaborado de telera, frijoles, queso asadero y el guisado de su preferencia.', 10);
insert into menu(nombre_platillo, elaboracion, precio) values('Gringas', 'Elaborado de tortilla de harina de 22cm, rellena de queso asadero, vegetales y el guisado de su preferencia.', 25);

insert into guisados(nombre_guisado) values('Milanesa');
insert into guisados(nombre_guisado) values('Lomo');
insert into guisados(nombre_guisado) values('Pastor');
insert into guisados(nombre_guisado) values('Bistec');
insert into guisados(nombre_guisado) values('Chorizo');
insert into guisados(nombre_guisado) values('Salchicha');

insert into pedidos(nombre_cliente, fid_platillo, fid_guisado) values('Gumercinda', 2, 1);
insert into pedidos(nombre_cliente, fid_platillo, fid_guisado) values('Filemon', 5, 2);
insert into pedidos(nombre_cliente, fid_platillo, fid_guisado) values('Anastacio', 4, 5);
insert into pedidos(nombre_cliente, fid_platillo, fid_guisado) values('Zacarias', 1, 3);

select nombre_cliente, nombre_platillo, nombre_guisado, precio from menu 
inner join pedidos on id_platillo = fid_platillo 
inner join guisados on id_guisado = fid_guisado;


