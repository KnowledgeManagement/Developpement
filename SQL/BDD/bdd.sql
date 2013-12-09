
create table m5f_user(
	idUser int primary key auto_increment,
	login varchar(50),
	mdp varchar(50),
	nom varchar(70),
	prenom varchar(70),
	mail varchar(255),
	fonction ENUM('Accesseur', 'Administrateur', 'Contributeur')
);

create table m5f_contact(
	idFormContact int primary key auto_increment,
	objet varchar(70),
	contenu varchar(255),
	date date,
	lu boolean,
	idUser int,
	constraint
	foreign key (idUser) references m5f_user(idUser)
);

create table m5f_categorie(
	idCat int primary key auto_increment,
	nomCat varchar(70)
);

create table m5f_sous_categorie(
	idSousCat int primary key auto_increment,
	nomSousCat varchar(60),
	idCat int,
	constraint
	foreign key (idCat) references m5f_categorie(idCat)
);

create table m5f_message(
	idMessage int primary key auto_increment,
	intitule varchar(70),
	contenu varchar(255),
	date date,
	etat ENUM('Lu', 'Non lu', 'Accepté', 'Refusé'),
	commentaires TEXT,
	idUser int,
	idSousCat int,
	constraint
	foreign key (idUser) references m5f_user(idUser),
	foreign key (idSousCat) references m5f_sous_categorie(idSousCat)
);

create table m5f_tmp(
	idTmp int primary key auto_increment,
	intituleTmp varchar(70),
	descriptionTmp TEXT,
	dateTmp date,
	valideeTmp boolean,
	exempleTmp TEXT,
	idSousCat int,
	constraint
	foreign key (idSousCat) references m5f_sous_categorie(idSousCat)
);

create table m5f_document(
	idDoc int primary key auto_increment,
	intituleDoc varchar(70),
	date date,
	description TEXT,
	validee boolean,
	exemple TEXT,
	idSousCat int,
	foreign key (idSousCat) references m5f_sous_categorie(idSousCat)
	
);
