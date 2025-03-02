-- 1. Création de la base de données
CREATE DATABASE module6;
USE module6;

-- 2. Création de la table "etudiants"
CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    cv TEXT DEFAULT 'CV de l\'étudiant',
    dt_naissance DATE,
    isAdmin BOOLEAN DEFAULT FALSE,
    dt_mis_a_jour DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 3. Insertion de 10 enregistrements dans la table "etudiants"
INSERT INTO etudiants (prenom, nom, email, dt_naissance, isAdmin)
VALUES 
    ('Alice', 'Durand', 'alice.durand@example.com', '1998-05-12', FALSE),
    ('Jean', 'Dupont', 'jean.dupont@example.com', '2000-09-22', FALSE),
    ('Marie', 'Lemoine', 'marie.lemoine@example.com', '1997-07-18', TRUE),
    ('Paul', 'Bernard', 'paul.bernard@example.com', '1995-11-30', FALSE),
    ('Lucie', 'Moreau', 'lucie.moreau@example.com', '2002-03-15', FALSE),
    ('Thomas', 'Roche', 'thomas.roche@example.com', '1999-12-05', TRUE),
    ('Emma', 'Fournier', 'emma.fournier@example.com', '2001-06-25', FALSE),
    ('Hugo', 'Girard', 'hugo.girard@example.com', '1994-08-09', FALSE),
    ('Clara', 'Lefebvre', 'clara.lefebvre@example.com', '1996-04-20', TRUE),
    ('Nathan', 'Perrin', 'nathan.perrin@example.com', '2003-10-14', FALSE);
