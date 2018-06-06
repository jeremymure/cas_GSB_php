 <div id="contenu">
      <h2>Mes fiches de frais</h2>
      <h3>Mois à sélectionner : </h3>
      <?php if($comptable==1){
              echo"<form action='index.php?uc=validerFrais&action=voirEtatFraisComptable' method='post'>
                    <input id='idVisiteurSuivi' name='idVisiteurSuivi' type='hidden' value='".$idVisiteurSuivi."'>";

      }else{ ?>
      
      <form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">
      <?php } ?>
      <div class="corpsForm">
         
      <p>
	 
        <label for="lstMois" accesskey="n">Mois : </label>
        <select id="lstMois" name="lstMois">
            <?php
			foreach ($lesMois as $unMois)
			{
			    $mois = $unMois['mois'];
				$numAnnee =  $unMois['numAnnee'];
				$numMois =  $unMois['numMois'];
				if($mois == $moisASelectionner){
				?>
				<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
			
			}
           
		   ?>    
            
        </select>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>
