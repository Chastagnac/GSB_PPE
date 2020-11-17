<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$lesVisiteurs = $pdo->getUtilisateursDisponibles();
switch ($action) {

    case 'validerUtilisateur':
        $idVisiteur = filter_input(INPUT_POST, 'idVisiteur', FILTER_SANITIZE_STRING);
        $_SESSION['idUser'] = $idVisiteur;
        $lesMoisVisiteurs = $pdo->getLesMoisDisponibles($idVisiteur);
        include 'vues/v_listeVisiteurs.php';
        break;

    case 'corrigerFrais':
        $moisVisiteur = filter_input(INPUT_POST, 'lstMoisVisiteurs', FILTER_SANITIZE_STRING);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($_SESSION['idUser'], $moisVisiteur);
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $_SESSION['nbJustificatifV'] = $nbJustificatifs;
        $_SESSION['mois'] = $moisVisiteur;

        $lesMoisVisiteurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['idUser'], $moisVisiteur);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['idUser'], $moisVisiteur);

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
        $lesMoisVisiteurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        if (lesQteFraisValides($lesFrais)) {
            $pdo->majFraisForfait($_SESSION['idUser'], $_SESSION['mois'], $lesFrais);
        } else {
            ajouterErreur('Les valeurs des frais doivent être numériques');
            include 'vues/v_erreurs.php';
        }
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['idUser'], $_SESSION['mois']);
        $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['idUser'], $_SESSION['mois']);


        include 'vues/v_listeVisiteurs.php';
        include 'vues/v_etatFraisACorriger.php';
        include 'vues/v_etatFraisHorsForfaitACorriger.php';
        break;
    case 'MajFraisHorsForfait':
        $idFraisHF = filter_input(INPUT_GET, 'idFraisHF', FILTER_SANITIZE_STRING);


        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $date = dateFrancaisVersAnglais($date);
        $montantHF = filter_input(INPUT_POST, 'montant', FILTER_SANITIZE_STRING);
        $libelleHF = filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_STRING);
        
        $pdo->majFraisHorsForfait($idFraisHF, $libelleHF, $date, $montantHF);


        $lesMoisVisiteurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['idUser'], $_SESSION['mois']);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['idUser'], $_SESSION['mois']);

        include 'vues/v_listeVisiteurs.php';
        include 'vues/v_etatFraisACorriger.php';
        include 'vues/v_etatFraisHorsForfaitACorriger.php';
        break;
}
