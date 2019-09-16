<?php 
function afficher_info()	//Affichage des info d'un produit
{
	global $bdd;
	return $bdd->query ('SELECT * FROM produits 
		WHERE n_prod = '.$_GET['id'].'');
}
?>