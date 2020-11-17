<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$id = $_SESSION['idComptable'];
switch ($action) {
    case 'choisirVisiteur':
        $lesVisiteursVA = $pdo->getUtilisateursVA();
        $lesVisiteurs = $pdo->getUtilisateursVA();
        $idVisiteur = filter_input(INPUT_POST, 'idVisiteurVA', FILTER_SANITIZE_STRING);
        $_SESSION['idUser'] = $idVisiteur;
        include 'vues/v_suivrefrais.php';
        break;
}
