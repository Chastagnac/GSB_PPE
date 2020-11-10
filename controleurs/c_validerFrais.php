<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$lesVisiteurs = $pdo->getUtilisateursDisponibles();
switch ($action) {

    case 'validerUtilisateur':
        $idVisiteur = filter_input(INPUT_POST, 'idVisiteur', FILTER_SANITIZE_STRING);
        $_SESSION['idUser'] = $idVisiteur;
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($idVisiteur);
        include 'vues/v_listeVisiteurs.php';
        break;

    case 'corrigerFrais':
        $moisVisiteur = filter_input(INPUT_POST, 'lstMoisVisiteurs', FILTER_SANITIZE_STRING);
        $_SESSION['mois'] = $moisVisiteur;
        $idVisiteur = $_SESSION['idUser'];
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($idVisiteur);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $moisVisiteur);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $moisVisiteur);
        if (count($lesFraisForfait) == 0) {
            include 'vues/v_listeVisiteurs.php';
            include 'vues/v_aucuneFiche.php';
        } else {
            include 'vues/v_listeVisiteurs.php';
            include 'vues/v_etatFraisACorriger.php';
            include 'vues/v_etatFraisHorsForfaitACorriger.php';
        }
        break;

    case 'MajFraisForfait':
        $lesFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['idUser'], $_SESSION['mois']);
        $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['idUser'], $_SESSION['mois']);
        if (lesQteFraisValides($lesFrais)) {
            $pdo->majFraisForfait($_SESSION['idUser'], $_SESSION['mois'], $lesFrais);
        } else {
            ajouterErreur('Les valeurs des frais doivent être numériques');
            include 'vues/v_erreurs.php';
        }
        include 'vues/v_listeVisiteurs.php';
        include 'vues/v_etatFraisACorriger.php';
        include 'vues/v_etatFraisHorsForfaitACorriger.php';
        break;
    case 'MajFraisHorsForfait':
        $lesFrais = filter_input(INPUT_POST, 'lesFrais', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['idUser'], $_SESSION['mois']);
        $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['idUser'], $_SESSION['mois']);
        
        
        include 'vues/v_listeVisiteurs.php';
        include 'vues/v_etatFraisACorriger.php';
        include 'vues/v_etatFraisHorsForfaitACorriger.php';
        break;
}
