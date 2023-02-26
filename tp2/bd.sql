CREATE TABLE fournisseur (
    id INT PRIMARY KEY,
    email varchar(100) not null,
    telephone int not null,
    password varchar(50) not null
);
-- Création de la table "Agent"
CREATE TABLE agent (
    id INT PRIMARY KEY auto_increment,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    zone_number INT not null,
    fournisseur_id INT,
    FOREIGN KEY (fournisseur_id) REFERENCES fournisseur(id)
);
-- Création de la table "Client"
CREATE TABLE Client (
    ID INT PRIMARY KEY auto_increment,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    agent_id INT,
    FOREIGN KEY (agent_id) REFERENCES agent(id)
);

-- Création de la table "facture"
CREATE TABLE facture (
    id INT PRIMARY KEY auto_increment,
    client_id INT,
    consommation_monsuelle DECIMAL(10,2) not null,
    mois varchar(255) NOT NULL,
    photo_path VARCHAR(15) not null,
    date_saisie timestamp DEFAULT CURRENT_TIMESTAMP,
    status_f ENUM ('payee','non_payee') not null,
    prix_HT DECIMAL(10,2),
    prix_TTC DECIMAL(10,2),
    FOREIGN KEY (client_id) REFERENCES Client(id)
);

-- Création de la table "Consommation_annuelle"
CREATE TABLE consommation_annuelle (
    id INT PRIMARY KEY auto_increment,
    client_id INT,
    consommation DECIMAL(10,2) not null,
    annee INT NOT NULL,
    agent_ID INT,
    status ENUM ('egale','superieur','inferieur') not null,
    date_saisie timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES Client(id),
    FOREIGN KEY (agent_id) REFERENCES agent(id)
);
Alter table consommation_annuelle add column decalage DECIMAL(10,2);

-- Création de la table "reclamation"
CREATE TABLE reclamation (
    id INT PRIMARY KEY auto_increment,
    client_id INT,
    contenue LONGTEXT not null,
    date_saisie timestamp DEFAULT CURRENT_TIMESTAMP,
    fournisseur_id INT ,
    status ENUM ('false','true') DEFAULT 'false',
	contenue_reponse LONGTEXT not null,
    FOREIGN KEY (client_ID) REFERENCES Client(ID),
	FOREIGN KEY (fournisseur_id) REFERENCES Fournisseur(ID)

);
