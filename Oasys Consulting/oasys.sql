CREATE TABLE Intervenant(
   matricule_intervenant VARCHAR(50),
   nom_intervenant VARCHAR(50),
   prénom_intervenant VARCHAR(50),
   type_intervenant VARCHAR(50),
   email_intervenant VARCHAR(50),
   numéro_intervenant VARCHAR(50),
   mdp_intervenant VARCHAR(50),
   PRIMARY KEY(matricule_intervenant)
);

CREATE TABLE Client(
   id_client VARCHAR(50),
   nom_client VARCHAR(50),
   prénom_client VARCHAR(50),
   numéro_client VARCHAR(50),
   email_client VARCHAR(50),
   adresse_client VARCHAR(50),
   PRIMARY KEY(id_client)
);

CREATE TABLE Domaine(
   id_domaine VARCHAR(50),
   nom_domaine VARCHAR(50),
   PRIMARY KEY(id_domaine)
);

CREATE TABLE Tarif_sous_traitance(
   id_tarif VARCHAR(50),
   prix_sous_traitance_journalier VARCHAR(50),
   matricule_intervenant VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_tarif),
   UNIQUE(matricule_intervenant),
   FOREIGN KEY(matricule_intervenant) REFERENCES Intervenant(matricule_intervenant)
);

CREATE TABLE Projet(
   id_projet VARCHAR(50),
   libellé_projet VARCHAR(50),
   Date_début_projet VARCHAR(50),
   Date_fin_projet VARCHAR(50),
   Domaine_projet VARCHAR(50),
   tarif_journalier_projet VARCHAR(50),
   id_domaine VARCHAR(50) NOT NULL,
   id_client VARCHAR(50) NOT NULL,
   matricule_intervenant VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_projet),
   FOREIGN KEY(id_domaine) REFERENCES Domaine(id_domaine),
   FOREIGN KEY(id_client) REFERENCES Client(id_client),
   FOREIGN KEY(matricule_intervenant) REFERENCES Intervenant(matricule_intervenant)
);

CREATE TABLE Etapes(
   id_étape VARCHAR(50),
   début_étape VARCHAR(50),
   fin_étape VARCHAR(50),
   etat_avancement VARCHAR(50),
   commentaires_intervenants VARCHAR(50),
   id_projet VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_étape),
   FOREIGN KEY(id_projet) REFERENCES Projet(id_projet)
);

CREATE TABLE Affecter(
   id_étape VARCHAR(50),
   matricule_intervenant VARCHAR(50),
   Nombre_heure VARCHAR(50),
   PRIMARY KEY(id_étape, matricule_intervenant),
   FOREIGN KEY(id_étape) REFERENCES Etapes(id_étape),
   FOREIGN KEY(matricule_intervenant) REFERENCES Intervenant(matricule_intervenant)
);
