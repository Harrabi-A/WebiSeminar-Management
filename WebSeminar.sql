CREATE DATABASE IF NOT EXISTS WebSeminar;

USE WebSeminar;

CREATE TABLE USER(
	email varchar(32),
	password varchar(32),
	name varchar(16),
	surname varchar(16),
	primary key (email)
);

CREATE TABLE SEMINAR(
	id int auto_increment,
	date date,
	manager varchar(32) NOT NULL,
	Place varchar(32),
	primary key (id),
	foreign key (manager) references USER(email)
);

CREATE TABLE WEBINAR(
	id int auto_increment,
	date date,
	manager varchar(32) NOT NULL,
	link varchar(128),
	primary key (id),
	foreign key (manager) references USER(email)
);

CREATE TABLE PARTICIPATIONSEMINAR(
	email varchar(32),
	id int,
	primary key (email,id),
	foreign key (email) references USER(email),
	foreign key (id) references SEMINAR(id)
);

CREATE TABLE PARTICIPATIONWEBINAR(
	email varchar(32),
	id int,
	primary key (email,id),
	foreign key (email) references USER(email),
	foreign key (id) references WEBINAR(id)
);
