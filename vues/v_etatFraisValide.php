<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?>               
                     
    </p>

  	<table class="listeLegere">
      <tr><th>&nbsp;</th><th><a href="index.php?uc=suivreFrais&action=misePaiement&mois=<?php echo $leMois ?>&Vid=<?php echo $idVisiteurSuivi ?>">Mettre en paiement</a></th></tr>
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
             </tr>
	<?php		 
          
          }
	?>	  
                                          
    </table>

  </div>
  </div>
