<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../includes/class.pdogsb.inc.php';

$pdo = PdoGsb ::getPdoGsb();
?>
<h1> Fichier de test de la BDD <h1>
<?php
if(empty($pdo)){
    echo 'marche';
}
else {
    echo 'marche pas ';
}

