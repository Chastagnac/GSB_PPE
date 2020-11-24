<hr>

<div class="panel panel-info">

    <div class="panel-heading">Descriptif des éléments hors forfait </div>
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>  
            <th></th>
        </tr>
        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $date = $unFraisHorsForfait['date'];
            $montant = $unFraisHorsForfait['montant'];
            $id = $unFraisHorsForfait['id'];
            $total = 0
            ?>
            <form method="post" 
                  action="index.php?uc=controlerFrais&action=MajFraisHorsForfait&idFraisHF=<?php echo $id ?>">
                <tr>
                    <td><input type="text" value="<?php echo $date ?>" name="date" size="10"></td>
                    <td><input type="text" value="<?php echo $libelle ?>"name="libelle" size="50"></td>
                    <td><input type="text" value="<?php echo $montant ?>" name="montant" size="10"></td>
                    <td>
                        <button class="btn btn-success"
                                type="submit" onclick="return confirm('Voulez-vous vraiment mettre à jours ce frais hors forfait ?');">Corriger</button>
                        <button class="btn btn-danger" type="reset">Reset</button></td>
                </tr>
            </form>
            <?php
        }
        ?>

    </table>  
</div>

<div class="form-group">
    Nombre de justificatifs : <?php echo $_SESSION['nbJustificatifV'] ?>
</div>
<form method="post" 
      action="index.php?uc=controlerFrais&action=ValiderFrais" 
      role="form" style="width:200px;">
    
    <button class="btn btn-success" type="submit">Valider la fiche de frais</button>
</form>


