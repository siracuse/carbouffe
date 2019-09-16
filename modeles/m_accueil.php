<?php

//Affichage des catégories de produit
function afficher_produits() 
{
	global $bdd;
	return $bdd->query ('SELECT * FROM categories');
}
?>
