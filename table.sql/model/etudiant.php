<?php
include_once 'Database.php';

class Etudiant {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllEtudiants() {
        $query = 'SELECT * FROM etudiants';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

 
 public function getEtudiantById($id) {
    $query = 'SELECT * FROM etudiants WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC); 


}


 
 public function supprimerEtudiant($id) {
    $query = 'DELETE FROM etudiants WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute(); // Retourne vrai si l'exécution a réussi
}


public function ajouterEtudiant($prenom, $nom, $email, $cv, $dt_naissance, $isAdmin) {
    
    $query = 'INSERT INTO etudiants (prenom, nom, email, cv, dt_naissance, isAdmin) 
              VALUES (:prenom, :nom, :email, :cv, :dt_naissance, :isAdmin)';
    $stmt = $this->conn->prepare($query);

    
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cv', $cv);
    $stmt->bindParam(':dt_naissance', $dt_naissance);
    $stmt->bindParam(':isAdmin', $isAdmin);

    
    $stmt->execute();
}


public function getEtudiantById($id) {
    $query = "SELECT * FROM etudiants WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function updateEtudiant($id, $prenom, $nom, $email, $cv, $dt_naissance, $isAdmin) {
    $query = "UPDATE etudiants SET prenom = :prenom, nom = :nom, email = :email, cv = :cv, dt_naissance = :dt_naissance, isAdmin = :isAdmin WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':cv', $cv, PDO::PARAM_STR);
    $stmt->bindParam(':dt_naissance', $dt_naissance, PDO::PARAM_STR);
    $stmt->bindParam(':isAdmin', $isAdmin, PDO::PARAM_BOOL);
    return $stmt->execute();
}


?>

