<?php
//Recupere le login et mdp du client
function indentifiants()
{	
	global $bdd;
	$n_client = $_SESSION['n_client'];
	return $bdd->query ('SELECT login_client 
		FROM clients
		WHERE n_client = '. $n_client);
}
//Modification des identifiants
function modifIdentifiants()
{
	global $bdd;
	$n_client = $_SESSION['n_client'];
	$login_client = $_POST['login_client'];
	$mdp_client = sha1($_POST['mdp_client']);
	$mdp2_client = sha1($_POST['mdp2_client']);

	if ($mdp_client == $mdp2_client && $mdp_client != '' && $mdp2_client != '')
	{
		$req = $bdd->prepare('UPDATE clients
			SET login_client = :login_client, mdp_client = :mdp_client 
			WHERE n_client = '.$n_client);

		$req->execute(array(					
			'login_client' => $login_client,			
			'mdp_client' => $mdp_client,			
		));
		$i = 1;		
	}
	else
	{
		$i = 0;
	}
	return $i;	//Retourne var $i : 1 pour succès et 0 pour échec
}