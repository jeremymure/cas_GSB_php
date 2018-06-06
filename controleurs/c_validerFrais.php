<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$comptable = $_SESSION['comptable'];
switch($action){
	case 'selectionnerVisiteurFiche':{
		if($comptable==1){
		$lesVisiteurs = $pdo->getLesVisiteurs();


		include("vues/v_listeVisiteurs.php");}
		break;
	}
	case 'selectionnerMoisComptable':{
        $idVisiteurSuivi = $_POST['lesVisiteurs'];
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteurSuivi);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		include("vues/v_listeMois.php");
		break;
	}
	case 'voirEtatFraisComptable':{
        $leMois = $_REQUEST['lstMois'];
        $idVisiteurSuivi = $_REQUEST['idVisiteurSuivi'];
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteurSuivi,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteurSuivi,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteurSuivi,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
        include("vues/v_etatFrais.php");


		break;
    }
    case 'supprimerFrais':{
        $idFrais = $_REQUEST['idFrais'];
        $leMois = $_REQUEST['leMois'];
        $idVisiteurSuivi = $_REQUEST['idVisiteurSuivi'];
        $pdo->refuserFraisHorsForfait($idFrais);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteurSuivi,$leMois);
        $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteurSuivi,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteurSuivi,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
        include("vues/v_etatFrais.php");

        
        break;
        
    }
    case 'validerMajFraisForfait':{
        $idVisiteurSuivi = $_REQUEST['idVisiteurSuivi'];
        $leMois = $_REQUEST['leMois'];
        $lesFrais = $_REQUEST['lesFrais'];
        $etat = 'VA';
		if(lesQteFraisValides($lesFrais)){
               $pdo->majFraisForfait($idVisiteurSuivi,$leMois,$lesFrais);
               $pdo->majEtatFicheFrais($idVisiteurSuivi,$leMois,$etat);
               $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteurSuivi,$leMois);
               $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteurSuivi,$leMois);
               $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteurSuivi,$leMois);
               $numAnnee =substr( $leMois,0,4);
               $numMois =substr( $leMois,4,2);
               $libEtat = $lesInfosFicheFrais['libEtat'];
               $montantValide = $lesInfosFicheFrais['montantValide'];
               $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
               $dateModif =  $lesInfosFicheFrais['dateModif'];
               $dateModif =  dateAnglaisVersFrancais($dateModif);
               include("vues/v_etatFrais.php");
		}
		else{
			ajouterErreur("Les valeurs des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}
	  break;
	}
}
?>