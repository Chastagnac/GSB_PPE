<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING); 
switch ($action) {
    case 'choisirVisiteur':
        $lesVisiteursVA = $pdo->getUtilisateursVA();
        $idVisiteur = filter_input(INPUT_POST, 'idVisiteurVA', FILTER_SANITIZE_STRING);
        $_SESSION['idUser'] = $idVisiteur;
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponiblesVA($idVisiteur);
        
        include 'vues/v_suivrefrais.php';
        break;
    case 'choisirFicheFrais':
         $lesVisiteursVA = $pdo->getUtilisateursVA();
        $idVisiteur =$_SESSION['idUser'];
        $leMois = filter_input(INPUT_POST, 'lstMoisVisiteurs', FILTER_SANITIZE_STRING);
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponiblesVA($idVisiteur);
        $moisASelectionner = $leMois;
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
        include 'vues/v_suivrefrais.php';
        include 'vues/v_choisirFicheFrais.php';
        break;
    case 'miseEnPaiement':
        include 'vues/v_miseEnPaiement/php';
}
