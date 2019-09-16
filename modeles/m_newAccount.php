<?php
function ajout_client()
{
	global $bdd;

	$nom_client = $_POST['nom_client'];
	$prenom_client = $_POST['prenom_client'];
	$adr_client = $_POST['adr_client'];
	$cp_client = $_POST['cp_client'];
	$tel_client = $_POST['tel_client'];
	$login_client = $_POST['login_client'];
	$mdp_client = sha1($_POST['mdp_client']);

	//Recupere le login client dans la bdd
	$verifAccount = $bdd->prepare ('SELECT login_client
		FROM clients
		WHERE login_client = :login_client');

	$verifAccount->execute(array(
		'login_client' => $login_client,	
	));
	$donnees = $verifAccount->fetch();

	//Recupere le login admin dans la bdd
	$verifAccount2 = $bdd->prepare ('SELECT login_admin
		FROM admin
		WHERE login_admin = :login_admin');

	$verifAccount2->execute(array(
		'login_admin' => $login_client,	
	));
	$donnees2 = $verifAccount2->fetch();

	//Si le login entré est le meme que l'admin ou le client, alors erreur
	if ($donnees['login_client'] == $login_client || $donnees2['login_admin'] == $login_client)
	{
		$i = 0;
	}
	//Sinon on l'ajoute
	else {
		$req = $bdd->prepare('INSERT INTO clients(nom_client, prenom_client, adr_client, cp_client, tel_client, login_client, mdp_client) 
			VALUES(:nom_client, :prenom_client, :adr_client, :cp_client, :tel_client, :login_client, :mdp_client)'
		);

		$req->execute(array(					
			'nom_client' => $nom_client,
			'prenom_client' => $prenom_client,
			'adr_client' => $adr_client,
			'cp_client' => $cp_client,
			'tel_client' => $tel_client,
			'login_client' => $login_client,
			'mdp_client' => $mdp_client
		));
		$i = 1;	
	}
	return $i;
}

function verifPassword() //controle sur les deux mdp entrer
{
	$mdp1 = $_POST['mdp_client'];
	$mdp2 = $_POST['mdp_client2'];
	if ($mdp1 == $mdp2)
	{
		return "true";
	}
	else
	{
		return "false";
	}
}
?>