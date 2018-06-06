    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				  Visiteur :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
			</li>

           <?php if($_SESSION['comptable']==1){
          echo" <li class='smenu'>
              <a href='index.php?uc=validerFrais&action=selectionnerVisiteurFiche' title='Valider fiches'>Validation des Fiches</a>
          </li>
          <li class='smenu'>
              <a href='index.php?uc=suivreFrais&action=selectionnerFicheValides' title='Suivre Fiches'>Suivis des Fiches</a>
          </li>
          ";}else{
            echo"<li class='smenu'>
            <a href='index.php?uc=gererFrais&action=saisirFrais' title='Saisie fiche de frais '>Saisie fiche de frais</a>
         </li>
         <li class='smenu'>
            <a href='index.php?uc=etatFrais&action=selectionnerMois' title='Consultation de mes fiches de frais'>Mes fiches de frais</a>
         </li>";
          }
          ?>
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>

         </ul>
        
    </div>
    