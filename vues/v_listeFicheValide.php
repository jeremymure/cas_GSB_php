
<div id="contenu">
      <h2>Les visiteurs</h2>
      <h3>Visiteur à sélectionner : </h3>
      <form action="index.php?uc=suivreFrais&action=voirFiche" method="post">
      <div class="corpsForm">
         
      <p>
	 
        <label for="mois" accesskey="n">Visiteurs ayant des fiches à suivre : </label>
        <select id="mois" name="mois">
            <?php
            
			foreach ($lesFichesVisiteur as $uneFiche)
			{
				$nom =  $uneFiche['nom'];
                $prenom =  $uneFiche['prenom'];
                $Vid = $uneFiche['id'];
                $mois = $uneFiche['mois'];
                $numAnnee =substr( $mois,0,4);
                $numMois =substr( $mois,4,2);


                ?>
				<option value="<?php echo $mois ?>"><?php echo  $nom." ".$prenom. "-". $numMois."/".$numAnnee ?> </option>
				<?php 
	    	}
			
           
		   ?>    
            
        </select>
        <input id="Vid" name="Vid" type="hidden" value="<?php echo $Vid?>">
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>