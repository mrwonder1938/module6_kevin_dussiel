<?php
include_once '../controller/EtudiantController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id']; 
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $cv = $_POST['cv'];
    $dt_naissance = $_POST['dt_naissance'];
    $isAdmin = isset($_POST['isAdmin']) ? 1 : 0; 

    $etudiantController = new EtudiantController();
    $etudiantController->modifierEtudiant($id, $prenom, $nom, $email, $cv, $dt_naissance, $isAdmin);
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $etudiantController = new EtudiantController();
        $etudiantController->afficherFormulaireModification($id);
    } else {
        echo "Aucun étudiant sélectionné.";
    }
}
?>
