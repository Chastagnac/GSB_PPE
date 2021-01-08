<?php
/**
 * Vue État de Frais
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
?>
<hr>
<link href="../styles/style.css" rel="stylesheet" type="text/css"/>
<div class="panel panel-primary">
    <div class="panel-heading">Fiche de frais du mois 
        <?php echo $numMois . '-' . $numAnnee ?> : </div>
    <div class="panel-body">
        <strong><u>Etat :</u></strong> <?php echo $libEtat ?>
        depuis le <?php echo $dateModif ?> <br> 

        <strong><u>Montant validé :</u></strong> <?php echo $montantValide ?>
        <?php if ($libEtat == 'Validée et mise en paiement') {
            ?><a href="./includes/ficheFraisPdf.php" target="_blank">
                <img class="pdfstyle" src="./images/pdf"  alt="pdf"/></a>
        <?php } ?>
    </div>
</div>
<div class="panel panel-info">
    <div class ="panel-heading">Eléments forfaitisés</div>
    <table class="table table-bordered table-responsive">
        <tr>
            <?php
            foreach ($lesFraisForfait as $unFraisForfait) {
                $libelle = $unFraisForfait['libelle'];
                ?>
                <th> <?php echo htmlspecialchars($libelle) ?></th>
                <?php
            }
            ?>
        </tr>
        <tr>
            <?php
            foreach ($lesFraisForfait as $unFraisForfait) {
                $quantite = $unFraisForfait['quantite'];
                ?>
                <td class="qteForfait"><?php echo $quantite ?> </td>
                <?php
            }
            ?>
        </tr>
    </table>
</div>
<div class="panel panel-info">
    <div class="panel-heading">Descriptif des éléments hors forfait - 
        <?php echo $nbJustificatifs ?> justificatifs reçus  
        <?php
        $i = 0;  
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $estRefuse = $pdo->estRefuse($unFraisHorsForfait['id']);
            if ($estRefuse['etatFraisHf'] == 'RE') {
                $i++;
            }
        }
        if ($i > 0) {
            echo ' - ' . $i . ' Refusé';
            if ($i > 1) {
                echo 's';
            }
            ?> </div><?php
    } else {
        ?></div><?php
    }
    ?>
<table class="table table-bordered table-responsive">
    <tr>
        <th class="date">Date</th>
        <th class="libelle">Libellé</th>
        <th class='montant'>Montant</th>                
    </tr>
    <?php
    foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
        $date = $unFraisHorsForfait['date'];
        $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
        $montant = $unFraisHorsForfait['montant'];
        $id = $unFraisHorsForfait['id'];
        $estRefuse = $pdo->estRefuse($id);
        ?>
        <?php
        if ($estRefuse['etatFraisHf'] == 'RE') {
            ?> <tr  style="background-color: indianred;"><?php
            } else {
                ?><tr><?php }
            ?>
            <td><?php echo $date ?></td>
            <td><?php echo $libelle ?></td>
            <td><?php echo $montant ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</div>
