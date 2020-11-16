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
                $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                $date = $unFraisHorsForfait['date'];
                $montant = $unFraisHorsForfait['montant'];
                $id = $unFraisHorsForfait['id'];
                ?>
                <tr>
                    <td><input type="text" value="<?php echo $date ?>" size="10"></td>
                    <td><input type="text" value="<?php echo $libelle ?>" size="50"></td>
                    <td><input type="text" value="<?php echo $montant ?>" size="10"></td>
                    <td><a class="btn btn-success" href="index.php?uc=controlerFrais&action=MajFraisHorsForfait&idFraisHF=<?php echo $id ?>"
                           onclick="return confirm('Voulez-vous vraiment mettre à jours ce frais hors forfait ?');">Corriger</a>
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
            ?>
            <form method="post" 
                  action="index.php?uc=controlerFrais&action=MajFraisHorsForfait&idFraisHF=<?php echo $id ?>" 
                  role="form">
                <tr>
                    <td><input type="text" value="<?php echo $date ?>" name="date" size="10"></td>
                    <td><input type="text" value="<?php echo $libelle ?>"name="libelle" size="50"></td>
                    <td><input type="text" value="<?php echo $montant ?>" size="10"></td>
                    <td>
                        <button class="btn btn-success" href="index.php?uc=controlerFrais&action=MajFraisHorsForfait"
                                type="submit" onclick="return confirm('Voulez-vous vraiment mettre à jours ce frais hors forfait ?');">Corriger</button>
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
