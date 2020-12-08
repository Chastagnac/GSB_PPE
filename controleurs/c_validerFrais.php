<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$lesVisiteurs = $pdo->getUtilisateursDisponibles();
switch ($action) {

    case 'validerUtilisateur':
        if (count($lesVisiteurs) == 0) {
            include 'vues/v_listeVisiteurs.php';
            include 'vues/v_aucuneFiche.php';
        } else {
            $idVisiteur = filter_input(INPUT_POST, 'idVisiteur', FILTER_SANITIZE_STRING);
            $_SESSION['idUser'] = $idVisiteur;
            $lesMoisVisiteurs = $pdo->getLesMoisDisponibles($idVisiteur);
            include 'vues/v_listeVisiteurs.php';
        }

        break;

    case 'corrigerFrais':
        $moisVisiteur = filter_input(INPUT_POST, 'lstMoisVisiteurs', FILTER_SANITIZE_STRING);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($_SESSION['idUser'], $moisVisiteur);
        $prixTotal = $pdo->getPrixFicheFrais($_SESSION['idUser'], $moisVisiteur, $_SESSION['prixKLM']);
        $lesMoisVisiteurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['idUser'], $moisVisiteur);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['idUser'], $moisVisiteur);

        $_SESSION['mois'] = $moisVisiteur;


        if (count($lesFraisForfait) == 0) {
            include 'vues/v_listeVisiteurs.php';
            include 'vues/v_aucuneFiche.php';
        } else {
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $prixKLM = $pdo->getPrixKLM($_SESSION['idUser']);
            $_SESSION['nbJustificatifV'] = $nbJustificatifs;
            $_SESSION['prixKLM'] = $prixKLM;
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
        $prixTotal = $pdo->getPrixFicheFrais($_SESSION['idUser'], $_SESSION['mois'], $_SESSION['prixKLM']);
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
        $prixTotal = $pdo->getPrixFicheFrais($_SESSION['idUser'], $_SESSION['mois'], $_SESSION['prixKLM']);
        $lesMoisVisiteurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['idUser'], $_SESSION['mois']);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['idUser'], $_SESSION['mois']);

        include 'vues/v_listeVisiteurs.php';
        include 'vues/v_etatFraisACorriger.php';
        include 'vues/v_etatFraisHorsForfaitACorriger.php';
        break;
    case 'ValiderFrais':
        $pdo->majEtatFicheFrais($_SESSION['idUser'], $_SESSION['mois'], 'VA');
        $lesMoisVisiteurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['idUser'], $_SESSION['mois']);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_SESSION['idUser'], $_SESSION['mois']);
        $prixTotal = $pdo->getPrixFicheFrais($_SESSION['idUser'], $_SESSION['mois'], $_SESSION['prixKLM']);
        $pdo->majPrixFicheFrais($_SESSION['idUser'], $_SESSION['mois'], $prixTotal[0]);
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        include 'vues/v_successful.php';
        include 'vues/v_listeVisiteurs.php';
        break;
}
