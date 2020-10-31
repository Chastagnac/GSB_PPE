
<div class="row">
    <div class="row">
        <div class="col-md-4">
            <form action="index.php?uc=controlerFrais&action=validerFrais"
                  method="post" role="form">

                <div class="form-group">
                    <label for="lstVistiteurs" accesskey="n">Choisir le visiteur : </label>
                    <select id="lstVistiteurs" name="lstVistiteurs" class="form-control" style="width:200px;">
                        <?php
                        foreach ($lesVisiteurs as $unVisiteur) {
                            $nom = $unVisiteur['nom'];
                            $prenom = $unVisiteur['prenom'];
                            if ($nom == $visiteurASelectionner) {
                                ?>
                                <option selected value="<?php echo $nom ?>">
                                    <?php echo $nom . '/' . $prenom ?> </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $nom ?>">
                                    <?php echo $nom . '/' . $prenom ?> </option>
                                <?php
                            }
                        }
                        ?> 

                    </select>
                    <label for="lstMoisVisiteurs" accesskey="n">Mois : </label>
                    <select id="lstMoisVisiteurs" name="lstMoisVisiteurs" class="form-control" style="width: 100px">
                    
                    </select>
                </div>
                <h2>Valider la fiche de frais</h2>
            </form>
        </div>
    </div>
