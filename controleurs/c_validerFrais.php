<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {
    case 'selectionnerVisiteurs':
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        include 'vues/v_listeVisiteurs.php';
        break;
    case 'validerUtilisateur':
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        
        $LeVisiteur = filter_input(INPUT_POST, 'lstVistiteurs', FILTER_SANITIZE_STRING);
 
        //changer, recupérer le prenom et le nom pour obtenir l'id
        
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        $idUtilisateur = $pdo->getIdUtilisateur($LeVisiteur);
        $idUtilisateur = $idUtilisateur['id'];        
        $_SESSION['idUser'] = $idUtilisateur;
        $lesMoisUtilisateurs = $pdo->getLesMoisDisponibles($idUtilisateur);        
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
