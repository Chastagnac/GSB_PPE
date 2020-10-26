<h2>Valider la fiche de frais</h2>
<div class="row">
    <div class="row">
        <div class="col-md-4">
            <form action="index.php?uc=controlerFrais&action=validerFrais" 
                  method="post" role="form">
                <div class="form-group">
                    <label for="lstVistiteurs" accesskey="n">Choisir le visiteur : </label>
                    <select id="lstVistiteurs" name="lstVistiteurs" class="form-control">
                        <?php
                        foreach ($lesVisiteurs as $unVisiteur) {
                            $nom = $unNom['nom'];
                            $prenom = $unNom['prenom'];
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
                </div>
                <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                       role="button">
                <input id="annuler" type="reset" value="Effacer" class="btn btn-danger" 
                       role="button">
            </form>
        </div>
    </div>