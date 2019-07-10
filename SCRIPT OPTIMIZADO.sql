
use db_selskapp;
/*drop database db_selskapp;*/
/*create database db_selskapp;*/
drop table if exists t_company;
create table if not exists t_company(
	id int auto_increment not null,
    name varchar(100) not null,
    region varchar(100) not null,
    location varchar(100) not null,
    cif varchar(9) not null UNIQUE,
    email varchar(500) not null UNIQUE,
    password varchar(1000) not null,
    primary key(id)
);

drop table if exists t_category;
create table if not exists t_category(
	id int auto_increment not null,
    name varchar(100) not null,
    primary key(id)
);

drop table if exists t_events;
create table if not exists t_events(
	id int auto_increment not null,
    name varchar(200) not null,
    locations varchar(100) not null,
    date date not null,
    date_start datetime not null,
    date_end datetime not null,
    details text not null,
    email_contact varchar(100) not null unique,
    count_clicks int not null,
    id_category int not null,
    link_info text not null,
    link_tickets text not null,
    photo varchar(8000) not null,
    id_company int not null,
    qr int,
	primary key(id),
    constraint FK_EventCompany foreign key (id_company)
    references t_company(id),
    constraint FK_EventCategory foreign key (id_category)
    references t_category(id)
);

drop trigger set_qr_value;
DELIMITER $$
CREATE TRIGGER set_qr_value 
    after INSERT ON t_events
    FOR EACH ROW 
BEGIN
    update t_events set qr = new.id;
END$$
DELIMITER ;

insert into t_company values (null, 'Gato cafe y copas', 'Puerto Serrano', 'Cádiz', '20502409W','hola@hola.hola', password('mierda'));
insert into t_company values (null, 'Latino cafe y copas', 'Puerto Serrano', 'Cádiz', '20502490W','adios@adios.adios', password('mierda'));

insert into t_category  values (null, 'Concerts');
insert into t_category  values (null, 'Exhibition');
insert into t_category  values (null, 'Theatre');
insert into t_category  values (null, 'Sport');
insert into t_category  values (null, 'Music');
insert into t_category  values (null, 'Reading');
insert into t_category  values (null, 'Art');
insert into t_category  values (null, 'Nature');
insert into t_category  values (null, 'Healthy');
insert into t_category  values (null, 'Nature');

insert into t_events values (null, 'Paella Motera', 'Puerto Serrano', '2019-04-12', '2019-04-12 10:00:00', '2019-04-12 23:00:00', 'este evento es una mierda illo', 'emailparacontactar@email.com', 1, 1, 'enlace1.com', 'enlace2.com', 'QzpceGFtcHBcdG1wXHBocEY2NTEudG1w', 1, 1);
insert into t_events values (null, 'CayoCoco', 'Puerto Serrano', '2019-04-12', '2019-04-12 10:00:00', '2019-04-12 23:00:00', 'este evento es la ostia illo illo illo', 'emailparamierda@email.com', 1, 6, 'enlace1.com', 'enlace2.com', 'QzpceGFtcHBcdG1wXHBocEY2NTEudG1w', 2, 2)