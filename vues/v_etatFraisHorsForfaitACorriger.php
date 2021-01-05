<hr>

<div class="panel panel-info comptable">

    <div class="panel-heading comptable1">Descriptif des éléments hors forfait </div>
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
            $estRefuse = $pdo->estRefuse($id);
            $total = 0
            ?>  
        
            <form method="post" 
                  action="index.php?uc=controlerFrais&action=MajFraisHorsForfait&idFraisHF=<?php echo $id ?>">
                <?php if($estRefuse['etatFraisHf'] == 'RE'){
                    ?> <tr  style="background-color: indianred;"><?php
                }else{
                    ?><tr><?php
                }
                ?>
               
                    <td><input type="text" value="<?php echo $date ?>" name="date" size="10"></td>
                    <td><input type="text" value="<?php echo $libelle ?>"name="libelle" size="50"></td>
                    <td><input type="text" value="<?php echo $montant ?>" name="montant" size="10"></td>
                    <td>
                        <button class="btn btn-success"
                                type="submit" onclick="return confirm('Voulez-vous vraiment mettre à jours ce frais hors forfait ?');">Corriger</button>
                    <td><a href="index.php?uc=controlerFrais&action=refuserFrais&idFrais=<?php echo $id ?>" class="btn btn-warning" 
                           onclick="return confirm('Voulez-vous vraiment refuser ce frais?');">Refuser ce frais</a></td>
                </tr>
            </form>
            <?php
        }
        ?>

    </table>  
</div>

<div class="form-group">
    Nombre total en euros : <?php echo round($prixTotal[0], 2) ?> € <br>
    Nombre de justificatifs : <?php echo $_SESSION['nbJustificatifV'] ?>
</div>
<form method="post" 
      action="index.php?uc=controlerFrais&action=ValiderFrais" 
      role="form" style="width:200px;">

    <button class="btn btn-success" type="submit" onclick="return confirm('Voulez-vous vraiment valider la fiche de frais ?');">Valider la fiche de frais</button>
</form>


