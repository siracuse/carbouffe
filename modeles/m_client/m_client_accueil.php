<?php
function afficher_produits() //Affichage des cat
{
	global $bdd;
	return $bdd->query ('SELECT * FROM categories');
}
?>
