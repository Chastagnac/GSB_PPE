<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$id = $_SESSION['idComptable'];
switch ($action) {
    case 'selectionnerVisiteurs':
        $lesVisiteurs = $pdo->getUtilisateursDisponibles();
        include 'vues/v_suivrefrais.php';
        include 'vues/v_listeVisiteurs.php';
        break;
}
