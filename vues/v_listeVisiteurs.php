<div id="contenu">
      <h2>Les visiteurs</h2>
      <h3>Visiteur à sélectionner : </h3>
      <form action="index.php?uc=validerFrais&action=selectionnerMoisComptable" method="post">
      <div class="corpsForm">
         
      <p>
	 
        <label for="lesVisiteurs" accesskey="n">Visiteurs : </label>
        <select id="lesVisiteurs" name="lesVisiteurs">
            <?php
            
			foreach ($lesVisiteurs as $unVisiteur)
			{
			    $Vid = $unVisiteur['id'];
				$Vnom =  $unVisiteur['nom'];
                $Vprenom =  $unVisiteur['prenom'];
                ?>
				<option value="<?php echo $Vid ?>"><?php echo  $Vnom."/".$Vprenom ?> </option>
				<?php 
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