<?php 
//Affichage des informations du produit sélectionner
function afficher_info()
{
	global $bdd;
	return $bdd->query ('SELECT * FROM produits 
		WHERE n_prod = '.$_GET['id'].'');
	$donnees = $req->fetch();
}
?>