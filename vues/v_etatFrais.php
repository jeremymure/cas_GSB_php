<?php if($comptable ==1){?>
  <div id='contenu'>
      <h2>Valider une fiche de frais du mois <?php echo $numMois.'-'.$numAnnee ?></h2>
      <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?>
              
                     
    </p>
         
      <form method='POST'  action="index.php?uc=validerFrais&action=validerMajFraisForfait&leMois=<?php echo $leMois ?>&idVisiteurSuivi=<?php echo $idVisiteurSuivi?>">
      <div class='corpsForm'>
          
          <fieldset>
            <legend>Eléments forfaitisés
            </legend>
			<?php
				foreach ($lesFraisForfait as $unFrais)
				{
					$idFrais = $unFrais['idfrais'];
					$libelle = $unFrais['libelle'];
					$quantite = $unFrais['quantite'];
					?><p>
						<label for='idFrais'><?php echo $libelle ?></label>
						<input type='text' id='idFrais' name='lesFrais[<?php echo $idFrais?>]' size='10' maxlength='5' value='<?php echo $quantite?>' >
					</p>
			<?php
        } 
        echo"
          </fieldset>
      </div>
      <div class='piedForm'>
      <p>
        <input id='ok' type='submit' value='Valider' size='20' />
        <input id='annuler' type='reset' value='Effacer' size='20' />
      </p> 
      </div>
        
      </form>";

}else{?>
<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>
              
                     
    </p>
  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
        <tr>
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) 
		 {
			$libelle = $unFraisForfait['libelle'];
		?>	
			<th> <?php echo $libelle?></th>
		 <?php
        }
		?>


		</tr>
        <tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
		  {
				$quantite = $unFraisForfait['quantite'];
		?>
                <td class="qteForfait"><?php echo $quantite?> </td>
		 <?php
          }
        }
		?>
		</tr>
    </table>
    <table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait
       </caption>
             <tr>
                <th class="date">Date</th>
				<th class="libelle">Libellé</th>  
                <th class="montant">Montant</th>  
                <th class="action">&nbsp;</th>              
             </tr>
       
        <?php    
	    foreach( $lesFraisHorsForfait as $unFraisHorsForfait) 
		{
			$libelle = $unFraisHorsForfait['libelle'];
			$date = $unFraisHorsForfait['date'];
			$montant=$unFraisHorsForfait['montant'];
			$id = $unFraisHorsForfait['id'];
	?>		
            <tr>
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <?php if($comptable==1){?> 

                <td><a href="index.php?uc=validerFrais&action=supprimerFrais&idFrais=<?php echo $id ?>&leMois=<?php echo $leMois ?>&idVisiteurSuivi=<?php echo $idVisiteurSuivi ?>" 
				onclick="return confirm('Voulez-vous vraiment refuser ce frais?');">Refuser ce frais</a></td>

             <?php }?> 
             </tr>
	<?php		 
          
          }
	?>	  
                                          
    </table>
  </div>
  </div>









