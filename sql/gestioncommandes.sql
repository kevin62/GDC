create database gestioncommandes default character set utf8 collate utf8_general_ci;
	
create table statut(
	id_statut int auto_increment,
	libelle varchar(50),
	en_cours int,
	terminee int,
	validee int,
	rejetee int,
	constraint pk_statut primary key(id_statut))engine=innodb;
	
create table commande(
	id_commande int auto_increment,
	libelle varchar(50),
	dateDebut varchar(8),
	dateFin varchar(8),
	id_statut int,
	nomPersonne varchar(50),
	constraint pk_commande primary key(id_commande),
	constraint fk_id_statut foreign key(id_statut) references statut(id_statut) on delete cascade)engine=innodb;

create table utilisateur(
	id_user integer(5) auto_increment,
	login varchar(30),
	pwd varchar(40),
	niveau integer(2),
	avatar varchar(100),
	constraint pk_utilisateur primary key(id_user))engine=innodb;
	
	