CREATE TABLE M5F_categorie
(
	idCat INTEGER NOT NULL PRIMARY KEY,
	nomCat CHAR(32) NOT NULL,
)


CREATE TABLE M5F_document 
(
	idDoc INTEGER NOT NULL IDENTITY PRIMARY KEY,
	intituleDoC VARCHAR NOT NULL,
	date DATE NOT NULL,
	description TEXT NOT NULL,
	validee TINYINT NOT NULL,
	exemple TEXT NOT NULL,
	idSousCat INTEGER NOT NULL,
)

CREATE TABLE M5F_message
(
  idMessage INTEGER NOT NULL IDENTITY PRIMARY KEY,
  intitule VARCHAR NOT NULL,
  contenu VARCHAR NOT NULL,
  date DATE NOT NULL,
  etat VARCHAR NOT NULL,
  commentaires VARCHAR NOT NULL,
  idUser INTEGER NOT NULL,
  idSousCat INTEGER NOT NULL,
)

CREATE TABLE M5F_contact
(
  idFormContact INTEGER NOT NULL IDENTITY PRIMARY KEY,
  objet VARCHAR NOT NULL,
  contenu VARCHAR NOT NULL,
  date VARCHAR NOT NULL,
  idUser INTEGER NOT NULL,
)

CREATE TABLE M5F_tmp
(
  idTmp INTEGER NOT NULL IDENTITY PRIMARY KEY,
  intituleTmp VARCHAR NOT NULL,
  descriptionTmp VARCHAR NOT NULL,
  dateTmp DATE NOT NULL,
  desTmp TEXT NOT NULL,
  valideeTmp TINYINT NOT NULL,
  exempleTmp VARCHAR NOT NULL,
  idSousCat INTEGER NOT NULL,
)


CREATE TABLE M5F_sous_categorie
(
  idSousCat INTEGER NOT NULL IDENTITY PRIMARY KEY,
  nomSousCat VARCHAR NOT NULL,
  idCat INTEGER NOT NULL REFERENCES M5F_categorie (idCat),
)


CREATE TABLE M5F_user (
  idUser INTEGER NOT NULL IDENTITY PRIMARY KEY,
  login VARCHAR(20) NOT NULL,
  mdp VARCHAR(20) NOT NULL,
  nom VARCHAR(20) NOT NULL,
  prenom VARCHAR(30) NOT NULL,
  mail VARCHAR(50) NOT NULL,
  fonction VARCHAR(40) NOT NULL,
)

ALTER TABLE M5F_document 
ADD FOREIGN KEY (idSousCat) REFERENCES M5F_sous_categorie (idSousCat);

ALTER TABLE M5F_user 
ADD FOREIGN KEY (idUser) REFERENCES M5F_user (idUser);

ALTER TABLE M5F_message 
ADD FOREIGN KEY (idSousCat) REFERENCES M5F_sous_categorie (idSousCat);

ALTER TABLE M5F_contact 
ADD FOREIGN KEY (idUser) REFERENCES M5F_user (idUser);

ALTER TABLE M5F_tmp 
ADD FOREIGN KEY (idSousCat) REFERENCES M5F_sous_categorie (idSousCat);

ALTER TABLE M5F_sous_categorie 
ADD FOREIGN KEY (idCat) REFERENCES M5F_categorie (idCat);