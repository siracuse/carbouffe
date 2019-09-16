<?php

function afficher_fruits()	//recupere les produits de la cat
{
	global $bdd;
	return $bdd->query ('SELECT n_prod, nom_prod, prix_prod, photo_prod, nom_sous_cat 
						 FROM produits INNER JOIN sous_categories
						 ON produits.id_sous_cat = sous_categories.id_sous_cat
						 WHERE produits.id_sous_cat IN (3, 4)');
}

function bt_sous_cat()  //recupere le nom de la sous cat
{
	global $bdd;
	return $bdd->query ('SELECT nom_sous_cat
						 FROM sous_categories
						 WHERE n_cat = 2');
}
?>