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
            $date = $unFraisHorsForfait['date'];
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $montant = $unFraisHorsForfait['montant'];
            ?>
            <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td>  <button class="btn btn-success" type="submit">Corriger</button>
                    <button class="btn btn-danger" type="reset">Reset</button></td>
            </tr>
            <?php
        }
        ?>
    </table>  
</div>
<div class="form-group">
    Nombre de justificatifs : <?php echo count($lesFraisHorsForfait)?>
</div>


