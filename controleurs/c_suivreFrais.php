<?php
include("vues/v_sommaire.php");
$idVisiteur = $_SESSION['idVisiteur'];
$comptable = $_SESSION['comptable'];
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$action = $_REQUEST['action'];
switch($action){
	case 'selectionnerFicheValides':{
        $lesFichesVisiteur = $pdo->getLesFichesValidesVisiteur();
        include("vues/v_listeFicheValide.php");
		break;
	}
	case 'voirFiche':{
        $idVisiteurSuivi = $_REQUEST['Vid'];
        $leMois = $_REQUEST['mois'];
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteurSuivi,$leMois);

		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteurSuivi,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteurSuivi,$leMois);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("vues/v_etatFraisValide.php");
		break;
    }
    case 'misePaiement':{
        $idVisiteurSuivi = $_REQUEST['Vid'];
        $leMois = $_REQUEST['mois'];
        $etat = 'MP';
        $pdo->majEtatFicheFrais($idVisiteurSuivi,$leMois,$etat);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteurSuivi,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteurSuivi,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteurSuivi,$leMois);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("vues/v_etatFraisValide.php");
		break;


    }
}

?>