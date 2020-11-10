<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'selectionnerVisiteurs':
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        include 'vues/v_listeVisiteurs.php';
        break;
    case 'validerUtilisateur':
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        $idVisiteur = filter_input(INPUT_POST, 'idVisiteur', FILTER_SANITIZE_STRING);
        
        $_SESSION['idUser'] = $idVisiteur;
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($idVisiteur);
        include 'vues/v_listeVisiteurs.php';
        break;
    case 'corrigerFrais':
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        $moisVisiteur = filter_input(INPUT_POST, 'lstMoisVisiteurs', FILTER_SANITIZE_STRING);
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        $idVisiteur = $_SESSION['idUser'];
        include 'vues/v_listeVisiteurs.php';
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $moisVisiteur);
        include 'vues/v_etatFraisACorriger.php';
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $moisVisiteur);
        include 'vues/v_etatFraisHorsForfaitACorriger.php';
        break;
    
}
