<?php
include_once '../model/Etudiant.php';

class EtudiantController {
    private $etudiantModel;

    public function __construct() {
        $this->etudiantModel = new Etudiant();
    }

    public function afficherEtudiants() {
        $etudiants = $this->etudiantModel->getAllEtudiants();
        include '../view/EtudiantsView.php'; 
    }

        
        public function afficherEtudiant($id) {
            $etudiant = $this->etudiantModel->getEtudiantById($id);
            if ($etudiant) {
                
                include '../view/EtudiantView.php';
            } else {
                
                echo "<p>L'étudiant avec l'ID {$id} n'existe pas dans la base de données.</p>";
            }
        }
    

    
    public function supprimerEtudiant($id) {
        $etudiant = $this->etudiantModel->getEtudiantById($id);
        if ($etudiant) {
            
            $suppression = $this->etudiantModel->supprimerEtudiant($id);
            if ($suppression) {
                echo "<p>Le profil étudiant avec l'ID {$id} a bien été supprimé.</p>";
            } else {
                echo "<p>Erreur lors de la suppression du profil étudiant.</p>";
            }
        } else {
            
            echo "<p>L'étudiant avec l'ID {$id} n'existe pas dans la base de données.</p>";
        }
    }



    
    public function afficherFormulaire() {
        include '../view/FormulaireEtudiant.php'; 
    }

    
    public function ajouterEtudiant() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $cv = $_POST['cv'];
            $dt_naissance = $_POST['dt_naissance'];
            $isAdmin = isset($_POST['isAdmin']) ? 1 : 0; 

        
            if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($dt_naissance)) {
                
                $this->etudiantModel->ajouterEtudiant($prenom, $nom, $email, $cv, $dt_naissance, $isAdmin);
                echo "<p>L'étudiant a bien été ajouté à la base de données.</p>";
            } else {
                echo "<p>Veuillez remplir tous les champs requis.</p>";
            }
        }
    }
  
           
    public function afficherFormulaireModification($id) {
        $etudiant = $this->etudiantModel->getEtudiantById($id);
        if ($etudiant) {
            include '../view/ModifierEtudiantView.php';
        } else {
            echo "L'étudiant n'a pas été trouvé.";
        }
    }

    
    public function modifierEtudiant($id, $prenom, $nom, $email, $cv, $dt_naissance, $isAdmin) {
        if ($this->etudiantModel->updateEtudiant($id, $prenom, $nom, $email, $cv, $dt_naissance, $isAdmin)) {
            echo "L'étudiant a bien été mis à jour.";
        } else {
            echo "Une erreur est survenue lors de la mise à jour de l'étudiant.";
        }
    }


}
?>
