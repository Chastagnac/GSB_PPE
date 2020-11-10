<link rel="stylesheet" href="../styles/style.css">
<div class="row">
    <div class="row">
        <div class="col-md-4">
            <form action="index.php?uc=controlerFrais&action=validerUtilisateur"
                  method="post" role="form">             
                <div class="form-group">
                    <label for="idVisiteur" accesskey="n">Choisir le visiteur : </label>
                    <select id="idVisiteur" name="idVisiteur" class="form-control" style="width:200px;">
                        <?php
                        foreach ($lesVisiteurs as $unVisiteur) {
                            $selected = '';
                            
                            if (isset($_SESSION['current']) && $_SESSION['current']['id'] == $unVisiteur['id']) {
                                $selected = "selected";
                            }                            
                            echo "<option value ='" . $unVisiteur['id']
                            . "'" . $selected . ";" .$unVisiteur['nom'] . " "
                            . $unVisiteur["prenom"] . "</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <input id="btn" type="submit" value="Valider" class="btn-xs" 
                           role="button">
                    <input id="annuler" type="reset" value="Effacer" class="btn-xs" 
                           role="button">

                </div>
            </form>
            <form action="index.php?uc=controlerFrais&action=corrigerFrais"
                  method="post" role="form">
                <label for="lstMoisVisiteurs" accesskey="n">Mois : </label>
                <select id="lstMoisVisiteurs" name="lstMoisVisiteurs" class="form-control" style="width: 100px">
                    <?php
                    foreach ($lesMoisUtilisateurs as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $moisVisiteur) {
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
                <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                       role="button">
                <input id="annuler" type="reset" value="Effacer" class="btn btn-danger" 
                       role="button">
            </form>
        </div>
    </div>
</div>

