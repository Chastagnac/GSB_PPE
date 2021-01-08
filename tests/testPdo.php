<?php
require_once '../includes/class.pdogsb.inc.php';

$pdo = PdoGsb::getPdoGsb();
$login = 'lchastagnac';
$mdp = 'mdp';
?>
<h1 style="text-align: center;">Fichier de test de la BDD</h1>
<br>
<br>
<br>
<?php
if ($pdo) {
    echo 'getPdoGsb marche';
    ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
} else {
    echo 'marche pas ';
    ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
}
?>
<br>
<br>
<?php
try {
    $pdo->getInfosVisiteur('lvillachane', 'jux7g');
    echo 'getInfosVisiteur marche';
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
    $pdo->getNomPrenomVisiteur('a131');
    echo 'getNomPrenomVisiteur marche';
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
    $pdo->getLesFraisHorsForfait('a131', '02');
    echo 'getLesFraisHorsForfait marche';
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
    $pdo->getFraisHorsForfait('3');
    echo 'getFraisHorsForfait marche';
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
    $pdo->getLesFraisForfait('a131','11');
    echo 'getLesFraisForfait marche';
    ?> <img src="../images/validation.png" width="50px" height="50px" alt="alt"/><?php
} catch (Exception $ex) {
    echo 'marche pas ';
    ?> <img src="../images/defectueux.png" width="50px" height="50px" alt="alt"/><?php
}
