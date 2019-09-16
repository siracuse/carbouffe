<?php

function afficher_boissons1()
{
	global $bdd;
	return $bdd->query ('SELECT n_prod, nom_prod, prix_prod, photo_prod, nom_sous_cat 
						 FROM produits INNER JOIN sous_categories
						 ON produits.id_sous_cat = sous_categories.id_sous_cat
						 WHERE produits.id_sous_cat IN (1, 2)');
}

//Bouton de trie par sous catégories
function bt_sous_cat()
{
	global $bdd;
	return $bdd->query ('SELECT nom_sous_cat
						 FROM sous_categories
						 WHERE n_cat = 1');
}

function nom_boissons()
{
	global $bdd;
	return $bdd->query ('SELECT nom_prod
						 FROM produits
						 WHERE produits.id_sous_cat IN (1,2)');
}

?>