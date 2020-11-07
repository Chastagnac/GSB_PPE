<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$id = $_SESSION['idComptable'];
switch ($action) {
    case 'selectionnerVisiteurs':
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();

        include 'vues/v_listeVisiteurs.php';
        break;
    case 'validerUtilisateur':
        $leVisiteur = filter_input(INPUT_POST, 'lstVistiteurs', FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        $idUtilisateur = $pdo->getIdUtilisateur($leVisiteur);
        $idUtilisateur = $idUtilisateur['id'];
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($idUtilisateur);
        include 'vues/v_listeVisiteurs.php';
        break;
    case 'corrigerFrais':
        $leVisiteur = filter_input(INPUT_POST, 'lstVistiteurs', FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        $moisVisiteur = filter_input(INPUT_POST, 'lstMoisVisiteurs', FILTER_SANITIZE_STRING);
        //je veux récupérer autre chose que le moi car moi == pour tous
        var_dump($leVisiteur);
        //$idUtilisateur = $pdo->getIdByMonth($moisVisiteur);
        $idUtilisateur = $_SESSION['lstVistiteurs'];
        var_dump($idUtilisateur);
        //probleme je recup l'if par le mois il faut autre chose
        $idUtilisateur = $idUtilisateur['id'];
        $leVisiteur = $pdo->getNomById($idUtilisateur);
        $leVisiteur = $leVisiteur['nom'];
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($idUtilisateur);
        include 'vues/v_listeVisiteurs.php';


        $lesFraisForfait = $pdo->getLesFraisForfait($idUtilisateur, $moisVisiteur);


        include 'vues/v_etatFraisACorriger.php';
        break;
}
