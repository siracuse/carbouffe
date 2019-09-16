<?php
//Recupere les info du client
function infoClient()
{	
	global $bdd;
	$n_client = $_SESSION['n_client'];
	return $bdd->query ('SELECT n_client, nom_client, prenom_client, adr_client, cp_client, tel_client, login_client 
							FROM clients
							WHERE n_client = '. $n_client);
}
?>