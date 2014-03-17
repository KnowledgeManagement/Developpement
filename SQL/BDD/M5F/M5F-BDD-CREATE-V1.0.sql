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
	INSERT INTO m5f_sous_categorie VALUES ('AdressageIP',1); /* id = 1 */
	INSERT INTO m5f_sous_categorie VALUES ('VLAN',1); /* id = 2 */
	INSERT INTO m5f_sous_categorie VALUES ('Modèle OSI',1); /* id = 3 */
	INSERT INTO m5f_sous_categorie VALUES ('Protocole',1); /* id = 4 */
	INSERT INTO m5f_sous_categorie VALUES ('TCP/IP',1); /* id = 5 */
	INSERT INTO m5f_sous_categorie VALUES ('UDP',1); /* id = 6 */
	INSERT INTO m5f_sous_categorie VALUES ('Paquet',1); /* id = 7 */

	INSERT INTO m5f_sous_categorie VALUES ('CommandeDOS',2); /* id = 8 */
	INSERT INTO m5f_sous_categorie VALUES ('PowerShell',2); /* id = 9 */
	INSERT INTO m5f_sous_categorie VALUES ('Administration',2); /* id = 10 */
	INSERT INTO m5f_sous_categorie VALUES ('Serveur',2); /* id = 11 */
	INSERT INTO m5f_sous_categorie VALUES ('Linux',2); /* id = 12 */
	INSERT INTO m5f_sous_categorie VALUES ('Active directory',2); /* id = 13 */
	INSERT INTO m5f_sous_categorie VALUES ('DHCP',2); /* id = 14 */
	
	INSERT INTO m5f_sous_categorie VALUES ('JAVA',3); /* id = 15 */
	INSERT INTO m5f_sous_categorie VALUES ('C#',3); /* id = 16 */
	INSERT INTO m5f_sous_categorie VALUES ('C++',3); /* id = 17 */
	INSERT INTO m5f_sous_categorie VALUES ('C',3); /* id = 18 */
	INSERT INTO m5f_sous_categorie VALUES ('Delphi',3); /* id = 19 */
	INSERT INTO m5f_sous_categorie VALUES ('COBOL',3); /* id = 20 */
	INSERT INTO m5f_sous_categorie VALUES ('Javascript',3); /* id = 21 */
	INSERT INTO m5f_sous_categorie VALUES ('Perl',3); /* id = 22 */
	INSERT INTO m5f_sous_categorie VALUES ('VB',3); /* id = 23 */
	INSERT INTO m5f_sous_categorie VALUES ('Fortran',3); /* id = 24 */
	INSERT INTO m5f_sous_categorie VALUES ('PHP',3); /* id = 25 */
	INSERT INTO m5f_sous_categorie VALUES ('MySQL',3); /* id = 26 */
	INSERT INTO m5f_sous_categorie VALUES ('maxDB',3); /* id = 27 */
	INSERT INTO m5f_sous_categorie VALUES ('PostgreSQL',3); /* id = 28 */


/* DOCUMENT */
	INSERT INTO m5f_document VALUES('68JK8','UDP','2014-02-24','A quoi sert un UDP?', 'TRUE', 'Le paquet UDP est encapsulé dans un paquet IP. Il comporte un en-tête suivi des données proprement dites à transporter[...].', 18,'68JK8');
	
	INSERT INTO m5f_document VALUES('VK35M','Paquet','2014-01-13', 'Qu''est ce qu''un paquet?', 'TRUE','Afin de transmettre un message d''une machine à une autre sur un réseau, celui-ci est découpé en plusieurs paquets transmis séparément[...].', 19, 'VK35M');
	
	INSERT INTO m5f_document VALUES('DS3NB','VLAN', '2014-02-14', 'Qu''est ce qu''un VLAN', 'TRUE', 'Un réseau local virtuel, communément appelé VLAN, est un réseau informatique logique indépendant. De nombreux VLAN peuvent coexister sur un même commutateur réseau[...].', 2, 'DS3NB');
	
	INSERT INTO m5f_document VALUES('11K3N','Modèle OSI', '2013-06-04', 'Le modèle OSI', 'TRUE', ' C''est un modèle de communications entre ordinateurs proposé par l''ISO qui décrit les fonctionnalités nécessaires à la communication et l''organisation de ces fonctions[...].', 3, '11K3N');

	INSERT INTO m5f_document VALUES('VG65A','DHCP', '2014-02-15', 'Configuration d''un DHCP', 'TRUE', 'Pour qu’un serveur DHCP puisse servir des adresses IP, il est nécessaire de lui donner un « réservoir » d’adresses dans lequel il pourra puiser : c’est la plage d’adresses (address range).
										Il est possible de définir plusieurs plages, disjointes ou contiguës.
										Les adresses du segment qui ne figurent dans aucune plage mise à la disposition du serveur DHCP ne seront en aucun cas distribuées,
										et peuvent faire l’objet d’affectations statiques (couramment : pour les serveurs nécessitant une adresse IP fixe, les routeurs, les imprimantes réseau…).[...]',
									26, 'VG65A');

	INSERT INTO m5f_document VALUES('ZQC3O','CommandeDOS', '2013-10-18', 'Quelles sont les differentes commande DOS?', 'TRUE', 'Les principales commandes MS DOS sont :
										- CD Changer de répertoire
										- COPY Copier des fichiers
										- DEL Effacer un fichier
										- DELTREE Effacer un répertoire
										- DIR Afficher la liste des dossiers et fichiers
										- EDIT Editer un fichier texte ou batch
										- FDISK Créer et afficher les partitions
										- FORMAT Formater un disque
										- HELP liste les commandes disponibles et les paramètres
										- KEYB Changer le type de clavier (KEYB US ou KEYB FR)
										- MD Créer un répertoire
										- TYPE Afficher un fichier texte
										- XCOPY Copier des fichiers et des répertoires',
									 20, 'ZQC3O');

	INSERT INTO m5f_document VALUES('83FD1','Commande Linux', '2014-02-23', 'Quelles sont les commandes Linux?', 'TRUE',
										'Les principales commande linux sont:
										 - ls --> liste le contenu d''un répertoire
										 - cd --> change de répertoire
										 - cd .. --> répertoire parent
										 - mkdir --> crée un nouveau répertoire
										 - rmdir --> supprime un répertoire
										 - cp --> copie le fichier
										 - mv --> déplace le fichier
										 - rm --> supprime le fichier',
									24, '83FD1');

	INSERT INTO m5f_document VALUES('VE77P','Active directory', '2014-02-25', 'Mettre en place un AD', 'TRUE',
										'Active Directory (AD) est la mise en œuvre par Microsoft des services d''annuaire LDAP pour les systèmes d''exploitation Windows.
										 L''objectif principal d''Active Directory est de fournir des services centralisés d''identification 
										 et d''authentification à un réseau d''ordinateurs utilisant le système Windows.',
									25, 'VE77P');

	INSERT INTO m5f_document VALUES('563LA','HelloWorld', '2014-02-01', '1er fonction en C++', 'TRUE',
										'#include <iostream>
										using namespace std;

										int main ()
										{
											cout << "Hello World!";
											return 0;
										}',
									29, '563LA');

	INSERT INTO m5f_document VALUES('Y453N','TriBulle', '2014-02-01', 'Fonction tri bulle', 'TRUE',
										'public class Mtab2
										{
												// remplir
												// disp
												//méthode tri à bulles
												public static void tribulles(int t[])
												{
														for (int i=0 ;i<=(t.length-2);i++)
																for (int j=(t.length-1);i < j;j--)
																		if (t[j] < t[j-1])
																		{
																				int x=t[j-1];
																				t[j-1]=t[j];
																				t[j]=x;
																		}
												} // fin tri
												// recherche
												public static void main(String  args[])
												{
														TextWindow.print("Entrer la taille du tableau");
														int taille=TextWindow.readInt();
														TextWindow.printLine("\n\n taille="+taille+"\n");
														int []t ;
														t=new int[taille] ;
														remplir(t) ;
														TextWindow.printLine("Avant le tri");
														disp(t) ;
														tribulles(t) ;
														TextWindow.printLine("Après le tri");
														disp(t) ;
														TextWindow.print("Entrer le nb x à chercher");
														int x=TextWindow.readInt() ;
														if(recherche(t,x)) TextWindow.pintLine(x+"est ds t");
														else TextWindow.printLine(x+"n’est pas ds t");
												} // fin main
										} // fin class',
									27, 'Y453N');
	
	INSERT INTO m5f_document VALUES('337LSQ','Calcul en boucle', '2014-03-17', 'Calcul en boucle', 'TRUE',
										'static int CalculSommeIntersection()
										{
											List<int> multiplesDe3 = new List<int>();
											List<int> multiplesDe5 = new List<int>();

											for (int i = 3; i <= 100; i += 3)
											{
												multiplesDe3.Add(i);
											}
											for (int i = 5; i <= 100; i += 5)
											{
												multiplesDe5.Add(i);
											}

											int somme = 0;
											foreach (int m3 in multiplesDe3)
											{
												foreach (int m5 in multiplesDe5)
												{
													if (m3 == m5)
														somme += m3;
												}
											}
											return somme;
										}',
									10, '337LSQ');
	
	INSERT INTO m5f_document VALUES('PRT23','Trier un tableau', '2014-03-03','Trier un tableau', 'TRUE',
											'#include <stdio.h>
											#include <stdlib.h>
 
 
											int triTab(int tableau[] ,int nbCase,int plusPetit,int i,int tour);
 
											int main()
											{
												int tableau[5] = {2,7,3,1,6},i=0;
 
												printf("%ld",triTab(tableau, 5,tableau[0],0,0));
 
												for(i=0;i<5;i++)
													printf("%ld\n", tableau[i]);
											}
 
											int triTab(int tableau[],int nbCase,int plusPetit,int i,int tour)
											{
												if( (tour + i) == nbCase)
												{
													tableau[tour] = plusPetit;
													triTab(tableau,nbCase,tableau[tour++],0,tour++);
												}
 
												if(tour == nbCase)
													return 10;
 
												if(tableau[tour + i] < plusPetit)
												{
													plusPetit = tableau[i];
													triTab(tableau,nbCase,plusPetit,i++,tour);
												}
												else
												{
													triTab(tableau,nbCase,plusPetit,i++,tour);
												}
											}',
										30,'PRT23');
