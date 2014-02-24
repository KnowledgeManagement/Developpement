/* CREATION DE LA STRUCTURE */

CREATE TABLE m5f_categorie
(
	idCat INTEGER NOT NULL IDENTITY(1,1) PRIMARY KEY,
	nomCat VARCHAR(70) NOT NULL
);

CREATE TABLE m5f_document 
(
	idReference VARCHAR(32) NOT NULL PRIMARY KEY,
	intituleDoc VARCHAR(255) NOT NULL,
	date DATE NOT NULL,
	description TEXT NOT NULL,
	validee BIT NOT NULL,
	exemple TEXT NOT NULL,
	idSousCat INTEGER NOT NULL,
	lienTelechargement VARCHAR(255) NOT NULL
);

CREATE TABLE m5f_contact
(
  idFormContact INTEGER NOT NULL IDENTITY(1,1) PRIMARY KEY,
  objet VARCHAR(255) NOT NULL,
  contenu TEXT NOT NULL,
  lu BIT NOT NULL,
  date DATETIME NOT NULL,
  idUser INTEGER NOT NULL
);

CREATE TABLE m5f_tmp
(
  idReferenceTmp VARCHAR(32) NOT NULL PRIMARY KEY,
  intituleTmp VARCHAR(255) NOT NULL,
  descriptionTmp TEXT NOT NULL,
  dateTmp DATE NOT NULL,
  etatTmp VARCHAR(32) NOT NULL,
  exempleTmp TEXT NOT NULL,
  commentaireTmp TEXT,
  lienTelechargementTmp VARCHAR(255) NOT NULL,
  idSousCat INTEGER NOT NULL,
  idUser INTEGER NOT NULL,
);

CREATE TABLE m5f_sous_categorie
(
  idSousCat INTEGER NOT NULL IDENTITY(1,1) PRIMARY KEY,
  nomSousCat VARCHAR(70) NOT NULL,
  idCat INTEGER NOT NULL
);

CREATE TABLE m5f_user (
  idUser INTEGER NOT NULL IDENTITY(1,1) PRIMARY KEY,
  login VARCHAR(70) NOT NULL,
  mdp VARCHAR(255) NOT NULL,
  nom VARCHAR(70) NOT NULL,
  prenom VARCHAR(70) NOT NULL,
  mail VARCHAR(255) NOT NULL,
  fonction VARCHAR(255) NOT NULL
);


/* AFFECTATION DES CLES ETRANGERE */

ALTER TABLE m5f_document 
ADD FOREIGN KEY (idSousCat) REFERENCES m5f_sous_categorie (idSousCat);

ALTER TABLE m5f_contact 
ADD FOREIGN KEY (idUser) REFERENCES m5f_user (idUser);

ALTER TABLE m5f_tmp
ADD FOREIGN KEY (idUser) REFERENCES m5f_user (idUser);

ALTER TABLE m5f_tmp
ADD FOREIGN KEY (idSousCat) REFERENCES m5f_sous_categorie (idSousCat);

ALTER TABLE m5f_sous_categorie
ADD FOREIGN KEY (idCat) REFERENCES m5f_categorie (idCat);

ALTER TABLE m5f_contact
ADD FOREIGN KEY (idUser) REFERENCES m5f_user (idUser);

/* AFFECTION DES DONNEES DANS LA BDD */

/* UTILISATEURS */
	INSERT INTO m5f_user VALUES ('Administrateur','372eeffaba2b5b61fb02513ecb84f1ff','Administrateur','Administrateur','Administrateur@m5f.fr','Administrateur');
	INSERT INTO m5f_user VALUES ('Contributeur','81776c3f1261e1127d603b9f85c9bebe','Contributeur','Contributeur','Contributeur@m5f.fr','Contributeur');
	INSERT INTO m5f_user VALUES ('Accesseur','470a8dee531118e609b7478e7e554fa1','Accesseur','Accesseur','Accesseur@m5f.fr','Accesseur');

/* CATEGORIE */
	INSERT INTO m5f_categorie VALUES ('Réseaux');	/* id = 1 */
	INSERT INTO m5f_categorie VALUES ('Système'); /* id = 2 */
	INSERT INTO m5f_categorie VALUES ('Développement');	/* id = 3 */

	/* SOUS-CATEGORIE */
	INSERT INTO m5f_sous_categorie VALUES ('AdressageIP',1);
	INSERT INTO m5f_sous_categorie VALUES ('VLAN',1);
	INSERT INTO m5f_sous_categorie VALUES ('Modèle OSI',1);
	INSERT INTO m5f_sous_categorie VALUES ('Protocole',1);
	INSERT INTO m5f_sous_categorie VALUES ('TCP/IP',1);
	INSERT INTO m5f_sous_categorie VALUES ('UDP',1);
	INSERT INTO m5f_sous_categorie VALUES ('Paquet',1);

	INSERT INTO m5f_sous_categorie VALUES ('CommandeDOS',2);
	INSERT INTO m5f_sous_categorie VALUES ('PowerShell',2);
	INSERT INTO m5f_sous_categorie VALUES ('Administration',2);
	INSERT INTO m5f_sous_categorie VALUES ('Serveur',2);
	INSERT INTO m5f_sous_categorie VALUES ('Linux',2);
	INSERT INTO m5f_sous_categorie VALUES ('Active directory',2);
	
	INSERT INTO m5f_sous_categorie VALUES ('JAVA',3);
	INSERT INTO m5f_sous_categorie VALUES ('C#',3);
	INSERT INTO m5f_sous_categorie VALUES ('C++',3);
	INSERT INTO m5f_sous_categorie VALUES ('C',3);
	INSERT INTO m5f_sous_categorie VALUES ('Delphi',3);
	INSERT INTO m5f_sous_categorie VALUES ('COBOL',3);
	INSERT INTO m5f_sous_categorie VALUES ('Javascript',3);
	INSERT INTO m5f_sous_categorie VALUES ('Perl',3);
	INSERT INTO m5f_sous_categorie VALUES ('VB',3);
	INSERT INTO m5f_sous_categorie VALUES ('Fortran',3);
	INSERT INTO m5f_sous_categorie VALUES ('PHP',3);
	INSERT INTO m5f_sous_categorie VALUES ('MySQL',3);
	INSERT INTO m5f_sous_categorie VALUES ('maxDB',3);
	INSERT INTO m5f_sous_categorie VALUES ('PostgreSQL',3);


/* DOCUMENT */
	INSERT INTO m5f_document VALUES(1,'UDP','02-24-2014','A quoi sert un UDP?', 'TRUE', 'Le paquet UDP est encapsulé dans un paquet IP. Il comporte un en-tête suivi des données proprement dites à transporter[...].', 6,'UDP.zip');
	INSERT INTO m5f_document VALUES(2,'Paquet','01-13-2014', 'Qu''est ce qu''un paquet?', 'TRUE','Afin de transmettre un message d''une machine à une autre sur un réseau, celui-ci est découpé en plusieurs paquets transmis séparément[...].', 7, 'Paquet.zip');
	INSERT INTO m5f_document VALUES(3,'VLAN', '02-14-2014', 'Qu''est ce qu''un VLAN', 'TRUE', 'Un réseau local virtuel, communément appelé VLAN, est un réseau informatique logique indépendant. De nombreux VLAN peuvent coexister sur un même commutateur réseau[...].', 2, 'VLAN.zip');
	INSERT INTO m5f_document VALUES(4,'Modèle OSI', '04-06-2013', 'Le modèle OSI', 'TRUE', ' C''est un modèle de communications entre ordinateurs proposé par l''ISO qui décrit les fonctionnalités nécessaires à la communication et l''organisation de ces fonctions[...].', 3, 'OSI.zip');

	INSERT INTO m5f_document VALUES(1,'DHCP');
	INSERT INTO m5f_document VALUES(2,'DNS');
	INSERT INTO m5f_document VALUES(3,'Server web');
	INSERT INTO m5f_document VALUES(4,'IDS');

	INSERT INTO m5f_document VALUES();
	INSERT INTO m5f_document VALUES();
	INSERT INTO m5f_document VALUES();
	INSERT INTO m5f_document VALUES();
