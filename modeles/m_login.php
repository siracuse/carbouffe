<?php
function connexionAdmin() 
{
	global $bdd;
	$req = $bdd->prepare ('SELECT * 
							FROM admin
							WHERE login_admin = :login_user and mdp_admin = :mdp_user');	
	$login_user = $_POST['login_user'];
	$mdp_user = sha1($_POST['mdp_user']);
	$req->execute(array(
		'login_user' => $login_user,	
		'mdp_user' => $mdp_user	
	));	
	$connexionAdmin = $req->fetch();
	return $connexionAdmin;
}

function connexionClient() 
{
	global $bdd;
	$req = $bdd->prepare ('SELECT * 
							FROM clients
							WHERE login_client = :login_user and mdp_client = :mdp_user');	
	$login_user = $_POST['login_user'];
	$mdp_user = sha1($_POST['mdp_user']);
	$req->execute(array(
		'login_user' => $login_user,	
		'mdp_user' => $mdp_user	
	));	
	$connexionClient = $req->fetch();
	return $connexionClient;
}
?>