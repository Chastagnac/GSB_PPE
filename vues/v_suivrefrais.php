<link rel="stylesheet" href="../styles/style.css">
<div class="row">
    <div class="row">
        <div class="col-md-4">
            <form action="index.php?uc=suivreFrais&action=choisirVisiteur"
                  method="post" role="form">             
                <div class="form-group">
                    <label for="idVisiteurVA" accesskey="n">Choisir le visiteur : </label>
                    <select id="idVisiteur" name="idVisiteurVA" class="form-control" style="width:200px;">
                        <?php
                        foreach ($lesVisiteursVA as $unVisiteur) {
                            $idVi = $unVisiteur['idVisiteurVA'];
                            $nom = $unVisiteur['nom'];
                            $prenom = $unVisiteur['prenom'];
                            if ($idVi == $idVisiteur) {
                                ?>
                                <option selected value="<?php echo $idVi ?>">
                                    <?php echo $nom . ' ' . $prenom ?> </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $idVi ?>">
                                    <?php echo $nom . ' ' . $prenom ?> </option>
                                <?php
                            }
                        }
                        ?> 
                    </select>
                    <br>
                    <input id="btnVA" type="submit" value="Valider" class="btn btn-success" 
                           role="button">
                </div>
            </form>
            <form action="index.php?uc=suivreFrais&action=choisirFicheFrais"
                  method="post" role="form">
                <label for="lstMoisVisiteurs" accesskey="n">
                    Choisir la fiche de frais validée  :
                </label>
                <select id="lstMoisVisiteurs" name="lstMoisVisiteurs" class="form-control" style="width: 100px">
                    <?php
                    foreach ($lesMoisUtilisateurs as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $_SESSION['mois']) {
                            ?>
                            <option selected value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        }
                    }
                    ?>  
                </select>
                <br>
                <input id="ok" type="submit" value="Afficher Détails" class="btn btn-success" 
                       role="button">
            </form>
        </div>
    </div>
</div>

