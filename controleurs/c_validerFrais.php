<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'selectionnerVisiteurs':
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        include 'vues/v_listeVisiteurs.php';
        break;
    case 'validerUtilisateur':
        $leVIsiteur = filter_input(INPUT_POST, 'lstVistiteurs', FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        $idUtilisateur = $pdo->getIdUtilisateur($leVIsiteur);
        $idUtilisateur = $idUtilisateur['id'];
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($idUtilisateur);
        var_dump($leVIsiteur);
        var_dump($idUtilisateur);
        var_dump($lesMoisUtilisateurs);
        include 'vues/v_listeVisiteurs.php';
}