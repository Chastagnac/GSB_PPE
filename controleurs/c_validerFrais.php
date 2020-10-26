<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);


switch ($action) {
    case 'validerFrais':
        $leVIsiteur = filter_input(INPUT_POST, 'lstVistiteurs', FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getLesUtilisateursDisponibles();
        $visiteurASelectionner = $leVIsiteur;
        $lesCles = array_keys($lesVisiteurs);
        $visiteurASelectionnerr = $lesCles[0];
        include 'vues/v_listeVisiteurs.php';
}