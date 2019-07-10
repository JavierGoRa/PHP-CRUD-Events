
use db_selskapp;

drop database if exists db_selskapp;
create database if not exists db_selskapp;

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

drop table if exists t_client;
create table if not exists t_client(
	id int auto_increment not null,
    name varchar(100) not null,
    last_name varchar(100) not null,
    country varchar(100) not null,
    email varchar(500) not null unique,
    password varchar(767) not null,
    nickname varchar(767) not null unique,
    primary key(id)
);

drop table if exists t_photo;
create table if not exists t_photo(
	id int auto_increment not null,
    src varchar(8000) not null,
    primary key(id)
);

drop table if exists t_followers;
create table if not exists t_followers(
	id_client int not null,
    id_client_follow int not null,
    constraint FK_ClientClient1 foreign key (id_client)
    references t_client(id),
    constraint FK_ClientClient2 foreign key (id_client_follow)
    references t_client(id)
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
    id_photo int not null,
    id_company int not null,
    qr int not null,
	primary key(id),
    constraint FK_EventCompany foreign key (id_company)
    references t_company(id),
    constraint FK_EventCategory foreign key (id_category)
    references t_category(id),
    constraint FK_EventPhoto foreign key (id_photo)
    references t_photo(id)
);


drop table if exists t_chat;
create table if not exists t_chat(
	id int auto_increment not null,
    name varchar(8000) not null,
    description varchar(8000) not null,
    max_members int not null,
    id_photo int not null,
    primary key(id),
    constraint FK_ChatPhoto foreign key (id_photo)
    references t_photo(id)
);

drop table if exists t_chat_client;
create table if not exists t_chat_client(
	id_chat int not null,
    id_client int not null,
    constraint FK_ChatChat foreign key (id_chat)
    references t_chat(id),
    constraint FK_ClientClient foreign key (id_client)
    references t_client(id)
);

drop table if exists t_event_client;
create table if not exists t_chat_client(
	id_event int not null,
    id_client int not null,
    constraint FK_EventEvent foreign key (id_event)
    references t_events(id),
    constraint FK_ClientClient foreign key (id_client)
    references t_client(id)
);

drop table if exists t_message;
create table if not exists t_message(
	id int auto_increment not null,
    id_client int not null,
    id_chat int not null,
    message varchar(8000),
    time varchar(30),
    primary key(id),
    constraint FK_MessageClient foreign key (id_client)
    references t_client(id),
    constraint FK_MessageChat foreign key (id_chat)
    references t_chat(id)
);

drop table if exists t_comment;
create table if not exists t_comment(
	id int auto_increment not null,
    comment varchar(8000) not null,
    id_client int not null,
    primary key(id),
    constraint FK_CommentClient foreign key (id_client)
    references t_client(id)
);

drop table if exists t_publish;
create table if not exists t_publish(
	id int auto_increment not null,
    id_client int not null,
    id_photo int not null,
    id_comment int not null,
	id_event int not null,
    fav int,
    primary key(id),
    constraint FK_PublishClient foreign key (id_client)
    references t_client(id),
    constraint FK_PublishPhoto foreign key (id_photo)
    references t_photo(id),
    constraint FK_Publishcomment foreign key (id_comment)
    references t_comment(id),
    constraint FK_PublishEvent foreign key (id_event)
    references t_events(id)
);

insert into t_company values (null, 'Gato cafe y copas', 'Puerto Serrano', 'Cádiz', '20502409W','hola@hola.hola', 'saludos');
insert into t_company values (null, 'Latino cafe y copas', 'Puerto Serrano', 'Cádiz', '20502490W','adios@adios.adios', 'saludos');

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

insert into t_photo values (null, 'QzpceGFtcHBcdG1wXHBocEY2NTEudG1w');
insert into t_photo values (null, 'QzpceGFtcHBcdG1wXHBocEY2NTEudG1w');

insert into t_events values (null, 'Paella Motera', 'Puerto Serrano', '2019-04-12', '2019-04-12 10:00:00', '2019-04-12 23:00:00', 'Evento en honor a nuestro dia a dia', 'emailparacontactar@email.com', 1, 1, 'enlace1.com', 'enlace2.com', 1, 1, 1);
insert into t_events values (null, 'CayoCoco', 'Puerto Serrano', '2019-04-12', '2019-04-12 10:00:00', '2019-04-12 23:00:00', 'Evento en honor a nuestro dia a dia', 'emailparamierda@email.com', 1, 6, 'enlace1.com', 'enlace2.com', 1, 2, 2);