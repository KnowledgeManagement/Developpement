/* CREATION DE LA STRUCTURE */

CREATE TABLE m5f_categorie
(
	idCat INTEGER NOT NULL IDENTITY(1,1) PRIMARY KEY,
	nomCat VARCHAR(70) NOT NULL
);

CREATE TABLE m5f_document 
(
	idDoc INTEGER NOT NULL IDENTITY(1,1) PRIMARY KEY,
	intituleDoc VARCHAR(255) NOT NULL,
	date DATE NOT NULL,
	description TEXT NOT NULL,
	validee BIT NOT NULL,
	exemple TEXT NOT NULL,
	idSousCat INTEGER NOT NULL
);

CREATE TABLE m5f_message
(
  idMessage INTEGER NOT NULL IDENTITY(1,1) PRIMARY KEY,
  intitule VARCHAR(70) NOT NULL,
  contenu TEXT NOT NULL,
  date DATETIME NOT NULL,
  etat VARCHAR(32) NOT NULL,
  commentaires TEXT NOT NULL,
  idUser INTEGER NOT NULL,
  idSousCat INTEGER NOT NULL
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
  idTmp INTEGER NOT NULL IDENTITY(1,1) PRIMARY KEY,
  intituleTmp VARCHAR(255) NOT NULL,
  descriptionTmp TEXT NOT NULL,
  dateTmp DATE NOT NULL,
  valideeTmp BIT NOT NULL,
  exempleTmp TEXT NOT NULL,
  idSousCat INTEGER NOT NULL
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

ALTER TABLE m5f_message 
ADD FOREIGN KEY (idSousCat) REFERENCES m5f_sous_categorie (idSousCat);

ALTER TABLE m5f_message
ADD FOREIGN KEY (idUser) REFERENCES m5f_user (idUser);

ALTER TABLE m5f_contact 
ADD FOREIGN KEY (idUser) REFERENCES m5f_user (idUser);

ALTER TABLE m5f_tmp
ADD FOREIGN KEY (idSousCat) REFERENCES m5f_sous_categorie (idSousCat);

ALTER TABLE m5f_sous_categorie 
ADD FOREIGN KEY (idCat) REFERENCES m5f_categorie (idCat);


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

	INSERT INTO m5f_sous_categorie VALUES ('CommandeDOS',2);
	INSERT INTO m5f_sous_categorie VALUES ('PowerShell',2);
	INSERT INTO m5f_sous_categorie VALUES ('Administration',2);
	INSERT INTO m5f_sous_categorie VALUES ('Serveur',2);
	
	INSERT INTO m5f_sous_categorie VALUES ('JAVA',3);
	INSERT INTO m5f_sous_categorie VALUES ('C#',3);
	INSERT INTO m5f_sous_categorie VALUES ('PHP',3);
	INSERT INTO m5f_sous_categorie VALUES ('MySQL',3);
