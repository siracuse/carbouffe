<?php
function mesCommandes() //Recupere les commandes du client
{
	global $bdd;
	$n_client = $_SESSION['n_client'];
	return $bdd->query ('SELECT date_commande, montant_commande 
						FROM commandes 
						WHERE panier_commande = 0 AND n_client = '.$n_client);
}


function mesCommandes2() //pas utiliser
{
	global $bdd;
	$n_client = $_SESSION['n_client'];
	return $bdd->query ('SELECT *
						FROM commandes INNER JOIN composer ON commandes.n_commande = composer.n_commande
						INNER JOIN produits On produits.n_prod = composer.n_prod
						WHERE n_client = '.$n_client);
}
?>