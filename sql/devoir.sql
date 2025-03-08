create database Classe;

use Classe;

 create table Enseignants
 (
    id int unsigned auto_increment primary key,
    nom char(20) not null,
    prenom char(20),
    email char(50) not null unique,
    telephone char(20),
    adresse char(30)
 )engine=innodb;

 create table Cours
 (
    id int unsigned auto_increment primary key,
    id_enseignant int unsigned not null,
    nom char(100) not null,
    volume_horaire tinyint unsigned not null,

    foreign key(id_enseignant) references Enseignants(id) on delete cascade on update cascade
 )engine=innodb;

 create table Etudiant
 (
    id int unsigned auto_increment primary key,
    matricule char(10) not null unique,
    nom char(20) not null,
    prenom char(20),
    email char(50) not null unique,
    telephone char(20),
    adresse char(30)
 )engine=innodb;

 create table Fiche
 (
    id int unsigned auto_increment primary key,
    id_cours int unsigned not null,
    id_etudiant int unsigned not null,
    nbr_heures tinyint unsigned not null,
    eligibilite boolean default 0,

   foreign key(id_cours) references Cours(id) on delete cascade on update cascade,
   foreign key(id_etudiant) references Etudiant(id) on delete cascade on update cascade
 )engine=innodb;
