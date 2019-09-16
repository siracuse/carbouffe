<?php
include ('modeles/m_login.php');
include('vues/v_login.php');

if (isset($_POST['submit_connexion'])) { 

	$connexionAdmin = connexionAdmin();
	$connexionClient = connexionClient();

	if ($connexionAdmin) {	
		header ('Location: index_admin.php?page=c_admin_accueil');
		session_start();
		$_SESSION['login_admin'] = $connexionAdmin['login_admin'];
		$_SESSION['mdp_admin'] = $connexionAdmin['mdp_admin'];
	}
	elseif ($connexionClient) {	
		header ('Location: index_client.php?page=c_client_accueil');
		session_start();
		$_SESSION['login_client'] = $connexionClient['login_client'];
		$_SESSION['mdp_client'] = $connexionClient['mdp_client'];
		$_SESSION['n_client'] = $connexionClient['n_client'];
	}
	else {
		?> 
		<script language="JavaScript">
			alert(' Erreur, \n Le login ou le mot de passe est incorrect !');
			window.location.replace("index.php?page=c_login");
		</script> 
		<?php
	}
}
?>