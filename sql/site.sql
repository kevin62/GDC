drop database if exists site;

create database Site default character set utf8 collate utf8_general_ci;
use Site;


create table Citation(
	NumCitation integer(05) auto_increment,
	Cita varchar(90),
	constraint pk_Citation primary key(NumCitation))engine=innodb;
	
	insert into Citation(cita) values ('la mort nous sourit à tous tout ce qu on peut faire c\'est sourire a notre tour');
	insert into Citation(cita) values ('Prenez la vie  à avec humour, de toute manière vous n\'en sortirez pas vivant');
	insert into Citation(cita) values ('L\'enfer est à pavé de bonnes intentions..');
	insert into Citation(cita) Values ('Comme la lame à tranche la chair, le pouvoir balafre l\esprit.');
	insert into Citation(cita) Values ('Comme je deviens à sourd, je n\'entendrai pas sonner ma dernière heure.');
	insert into Citation(cita) Values ('Tout ce que ne nous à tue pas, nous rend plus ..Bizarres');
	insert into Citation(cita) Values ("La peur du vide te à donne le <font color=#C60000> rêve </font> de te donner la chance ");
	insert into Citation(cita) Values ('Il aimait la mort, à elle aimait la vie, elle  est morte pour lui, et lui, il vit pour elle ..');
	insert into Citation(cita) Values ('I want you à <font color=#C60000> die..</font>');
	insert into Citation(cita) Values ('We might as well  à write it on our heads. Come and<font color=#C60000> kill us </font>please' );
	
	
create table Groupe(
	NumGrp integer(05) auto_increment,
	NomG varchar(25),
	NomI varchar(25) NOT NULL default 'Defaut',
	constraint pk_Groupe primary key(NumGrp))engine=innodb;
	
	insert into Groupe(NomG,NomI) values('System Of A Down','System Of A Down');
	insert into Groupe(NomG,NomI) values ('Black Bomb A','Black Bomb A');
	insert into Groupe(NomG,NomI) values ('Dope','Dope');
	insert into Groupe(NomG,NomI) values ('Slipknot','Slipknot');	
	
create table Album(
	NumAlb integer(05) auto_increment,
	NomAlb varchar(30),
	DateAlb varchar(4),
	NumGrp integer(3),
	constraint pk_Album primary key(NumAlb),
	constraint fk_NumGrpAlbum foreign key(NumGrp) references Groupe(NumGrp) on delete cascade)engine=innodb;
	
insert into Album(NomAlb,DateAlb,NumGrp) values ('Toxycity','2001','01');
insert into Album(NomAlb,DateAlb,NumGrp) values ('Steal This Album','2002','01');
insert into Album(NomAlb,DateAlb,NumGrp) values ('From chaos','2009','02');
insert into Album(NomAlb,DateAlb,NumGrp) values ('One sound Bite To React','2006','02');
insert into Album(NomAlb,DateAlb,NumGrp) values ('Life','2001','3');
insert into Album(NomAlb,DateAlb,NumGrp) values ('Iowa','0000','4');


create table Piste (
	NumPiste integer(05) auto_increment,
	Titre varchar(35),
	Duree varchar(8) NOT NULL default '0',
	NumAlb integer(3),
	Presente varchar(6),
	constraint pk_Piste primary key(NumPiste),
constraint fk_NumAlbPiste foreign key(NumAlb) references Album(NumAlb) on delete cascade)engine=innodb;
	
	
	insert into Piste(Titre,Duree,NumAlb,Presente) values ('Chop Suey','3.30','1','true');
	insert into Piste(Titre,Duree,NumAlb,Presente) values ('Roulette','3.21','2','false');
	insert into Piste(Titre,Duree,NumAlb,Presente) values ('Toxicity','3.39','1','false');
	insert into Piste(Titre,NumAlb,Presente) values ('Nightcrawler','3','false');
	insert into Piste(Titre,NumAlb,Presente) values ('One Sound Bite To React','4','false');
	insert into Piste(Titre,NumAlb,Presente) values ('Beds are burning','4','true');
	insert into Piste(Titre,NumAlb,Presente) values ('Slipping away','5','false');
	insert into Piste(Titre,NumAlb,Presente) values ('Duality','6','false');
	


create table Photo(
	NumPhoto integer(05) auto_increment,
	NomPhoto varchar(39),
	constraint pk_NumPhoto primary Key(Numphoto))engine=innodb;

insert into Photo(NomPhoto) values('PremiereDope');
insert into Photo(NomPhoto) values ('Slipknot1');
insert into Photo(NomPhoto) values ('blackbombA');
insert into Photo(NomPhoto) values ('soad');
insert into Photo(NomPhoto) values ('ssoad');
insert into Photo(NomPhoto) values ('slipknott');


create table LoGiin(
	NumLog integer(5) auto_increment,
	LoginSite varchar(30),
	passW varchar(40),
	niveau integer(2) NOT NULL default '2',
	Avatar varchar(30),
	constraint pk_LoGiin primary key(NumLog))engine=innodb;
	
	
	insert into LoGiin(LoginSite,passW,niveau,Avatar) values ('root','root','4','root');
	insert into LoGiin(LoginSite,passW,niveau,Avatar)  values ('Dieu','Amen','3','dieu');
	
create table Com(
	NumCom integer(5) auto_increment,
	comm blob (10000),
	DateCom varchar(25),
	posteur varchar(20),
	NumGrp integer(3),
	constraint pk_Com primary key(NumCom),
	constraint fk_NumGrpCom foreign key(NumGrp) references Groupe(NumGrp) on delete cascade)engine=innodb;
	

