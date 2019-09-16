<?php
function deco() 
{
	session_destroy();
	?>
	<script language="JavaScript">
		window.location.replace("index.php?page=c_accueil");
	</script> 
	<?php
	// header ('Location: index.php?page=c_accueil');
}

function numDecommande()	//recupere le n°commande du client    #1 pour panier
{
	global $bdd;

	$n_client = $_SESSION['n_client'];

	$req = $bdd->query('SELECT n_commande FROM commandes 
		WHERE panier_commande = 1 AND n_client = '.$n_client);

	$donnees = $req->fetch();
	$var = intval ($donnees['n_commande']);
	return $var;
	$req->closeCursor();
}

function savePanier()
{
	//Insertion des données dans la table commandes avec panier_commande = 1      #1 pour panier
	global $bdd;
	$montant_commande = MontantGlobal();
	$date_commande = date('Y-m-d H:i:s');
	$panier_commande = '1';
	$n_client = $_SESSION['n_client'];

	$req3 = $bdd->prepare ('INSERT INTO commandes(montant_commande, date_commande, panier_commande, n_client)
		VALUES(:montant_commande, :date_commande, :panier_commande, :n_client) ');
	$req3->execute(array(
		'montant_commande' => $montant_commande,
		'date_commande' => $date_commande,
		'panier_commande' => $panier_commande,
		'n_client' => $n_client
	));
	$req3->closeCursor();

	//Insertion des données dans la table composer 
	$nbarticles=count($_SESSION['panier']['libelleProduit']);
	
	for ($i=0; $i < $nbarticles; $i++) { 
		$qte_prod = $_SESSION['panier']['qteProduit'][$i];
		$n_commande = numDecommande();
		$n_prod = $_SESSION['panier']['n_prod'][$i];

		$req4 = $bdd->prepare ('INSERT INTO composer(qte_prod, n_commande, n_prod)
			VALUES(:qte_prod, :n_commande, :n_prod) ');
		$req4->execute(array(
			'qte_prod' => $qte_prod,
			'n_commande' => $n_commande,
			'n_prod' => $n_prod		
		));
		$req4->closeCursor();
	}	
}

function suppressionPanier() {
	global $bdd;
	//Suppression dans la table composer
	$numero_commande = numDecommande();
	$req = $bdd->prepare('DELETE FROM composer WHERE n_commande = :numero_commande');
	$req->execute(array(
		'numero_commande' => $numero_commande
	));
	$req->closeCursor();
	
	//Suppression dans la table commandes
	$req2 = $bdd->prepare ('DELETE FROM commandes WHERE n_commande = :numero_commande');
	$req2->execute(array (
		'numero_commande' => $numero_commande
	));
	$req2->closeCursor();
}
?>