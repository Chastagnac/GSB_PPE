<hr>
<form method="post" 
      action="index.php?uc=controlerFrais&action=MajFraisHorsForfait" 
      role="form">
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
                $id = $unFraisHorsForfait['id'];
                $_SESSION['idFraisHorsForfait'] = $id;
                $date = $unFraisHorsForfait['date'];

                $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                $montant = $unFraisHorsForfait['montant'];
                ?>
                <tr>
                    <td><input type="text" name="date" value="<?php echo $date ?>" size="10"></td>
                    <td><input type="text" name="libelle" value="<?php echo $libelle ?>" size="50"></td>
                    <td><input type="text" name="montant" value="<?php echo $montant ?>" size="10"></td>
                    <td><button class="btn btn-success" type="submit">Corriger</button>
                        <button class="btn btn-danger" type="reset">Reset</button></td>
                </tr>
                <?php
            }
            ?>
        </table>  
    </div>
</form>
<div class="form-group">
    Nombre de justificatifs : <?php echo $_SESSION['nbJustificatifV'] ?>
</div>


