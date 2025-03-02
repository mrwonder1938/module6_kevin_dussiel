<?php
include_once 'controller/EtudiantController.php';

$etudiantController = new EtudiantController();
$etudiantController->afficherEtudiants();



if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    
    include_once 'controller/EtudiantController.php';
    $etudiantController = new EtudiantController();
    $etudiantController->afficherEtudiant($id);
} else {
    echo "<p>ID invalide ou manquant.</p>";
}

// Inclure le contrôleur et supprimer l'étudiant
include_once 'controller/EtudiantController.php';
$etudiantController = new EtudiantController();

// Vérifiez si le paramètre 'action' est défini pour supprimer
if (isset($_GET['action']) && $_GET['action'] === 'supprimer') {
    $etudiantController->supprimerEtudiant($id);
} else {
    $etudiantController->afficherEtudiant($id);
}
?>


http://192.168.1.254/module6/index.php