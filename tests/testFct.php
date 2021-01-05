<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../includes/fct.inc.php';

$idVisiteur = 'a131';
$nom = 'Villechalane';
$prenom = 'Louis';

$idComptable = '1';
$nom1 = 'Chastagnac';
$prenom2 = 'Léo';
$valeur = 5;
$maDate = '22/12/2020';
$date = '12/02/2020';
$dateTestee = '12/12/2019';
$lesFrais = [3, 5, 6];

$dateFrais = '22/12/2020';
$libelle = 'Fleurs';
$montant = '24';
$msg = "Erreur";
?>
<h1 style="text-align : center;"> Fichier de test des fonctions poir l'application GSB ! <h1>
        <br>
        <br>
        <br>
        <?php
        if (empty(estConnecte())) {
            echo 'estConnecte marche';
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } else {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        if (empty(comptableEstConnecte())) {
            echo 'comptableEstConnecte marche';
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } else {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        if (empty(connecter($idVisiteur, $nom, $prenom))) {
            echo 'connecter marche avec pour paramettre ' . $idVisiteur . ' ' . $nom . ' ' . $prenom;
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } else {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        if (empty(comptableConnecter($idComptable, $nom1, $prenom2))) {
            echo 'comptableConnecter marche avec pour paramettre ' . $idComptable . ' ' . $nom1 . ' ' . $prenom2;
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } else {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        session_start();
        try {
            deconnecter();
            echo 'deconnecter marche';
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } catch (Exception $ex) {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        try {
            dateFrancaisVersAnglais($maDate);
            echo 'dateFrancaisVersAnglais marche avec ' . dateFrancaisVersAnglais($maDate);
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } catch (Exception $ex) {

            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        try {
            dateAnglaisVersFrancais($maDate);
            echo 'dateAnglaisVersFrancais marche avec ' . dateAnglaisVersFrancais($maDate);
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } catch (Exception $ex) {

            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        try {
            getMois($date);
            echo 'getMois marche avec ' . getMois($date);
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } catch (Exception $ex) {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        if (estDateDepassee($dateTestee)) {
            echo 'estDateDepassee marche avec ' . $dateTestee;
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } else {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        if (lesQteFraisValides($lesFrais)) {
            echo 'lesQteFraisValides marche';
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } else {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        if (empty(valideInfosFrais($dateFrais, $libelle, $montant))) {
            echo 'valideInfosFrais marche';
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } else {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        if (empty(ajouterErreur($msg))) {
            echo 'ajouterErreur marche';
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } else {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>
        <br>
        <br>
        <?php
        if (nbErreurs()) {
            echo 'ajouterErreur marche';
            ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
        } else {
            echo 'marche pas ';
            ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
        }
        ?>








