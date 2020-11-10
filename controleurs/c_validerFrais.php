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
        var_dump($idVisiteur);
        //changer, recupérer le prenom et le nom pour obtenir l'id
        
        //$idUtilisateur = $pdo->getIdUtilisateur($LeVisiteur);
        //$idUtilisateur = $idUtilisateur['id'];        
        $_SESSION['idUser'] = $idVisiteur;
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($idVisiteur);        
        include 'vues/v_listeVisiteurs.php';
        break;    
    case 'corrigerFrais':
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        $moisVisiteur = filter_input(INPUT_POST, 'lstMoisVisiteurs', FILTER_SANITIZE_STRING);
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($_SESSION['idUser']);
        var_dump($lesMoisUtilisateurs);
        include 'vues/v_listeVisiteurs.php';
        $lesFraisForfait = $pdo->getLesFraisForfait($_SESSION['idUser'], $moisVisiteur);


        include 'vues/v_etatFraisACorriger.php';
        break;
}
