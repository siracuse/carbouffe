<?php
// Suppression d'une catégorie
function nom_cat()
{
	global $bdd;
	return $bdd->query ('SELECT * FROM categories');	
}

function sup_cat_photo() //Supression de la photo
{
	global $bdd;
	$req = $bdd->prepare ('SELECT photo_cat FROM categories
						WHERE nom_cat = :nom_cat');

	$nom_cat = $_POST ['nom_cat'];

	$req->execute(array(
		'nom_cat' => $nom_cat								
		));	

	$donnees = $req->fetch();	
	unlink('images/categories/'.$donnees['photo_cat']);
		
	$req->closeCursor();
}

function sup_cat() //Supression dans la bdd
{
	global $bdd;

	//traitement de la suppression	
	$req = $bdd->prepare ('DELETE FROM categories
						WHERE nom_cat = :nom_cat');	

	$nom_cat = $_POST ['nom_cat'];					
	
	$req->execute(array(
		'nom_cat' => $nom_cat								
		));	

	$req->closeCursor();	
	?>	
	<script language="JavaScript">
		alert('suppression effectuée');
		window.location.replace("index_admin.php?page=c_admin_supprimer");
	</script>	
<?php 
}

//Suppression d'une sous cat
function nom_sous_cat()
{
	global $bdd;
	return $bdd->query ('SELECT nom_sous_cat FROM sous_categories');	
}

function sup_sous_cat_photo() //Supression de la photo
{
	global $bdd;
	$req = $bdd->prepare ('SELECT photo_sous_cat FROM sous_categories
						WHERE nom_sous_cat = :nom_sous_cat');

	$nom_sous_cat = $_POST ['nom_sous_cat'];

	$req->execute(array(
		'nom_sous_cat' => $nom_sous_cat								
		));	

	$donnees = $req->fetch();	
	unlink('images/sous_categories/'.$donnees['photo_sous_cat']);
		
	$req->closeCursor();
}

function sup_sous_cat() //Supression dans la bdd
{
	global $bdd;

	//traitement de la suppression	
	$req = $bdd->prepare ('DELETE FROM sous_categories
						WHERE nom_sous_cat = :nom_sous_cat');	

	$nom_sous_cat = $_POST ['nom_sous_cat'];					
	
	$req->execute(array(
		'nom_sous_cat' => $nom_sous_cat								
		));	

	$req->closeCursor();	
	?>	
	<script language="JavaScript">
		alert('suppression effectuée');
		window.location.replace("index_admin.php?page=c_admin_supprimer");
	</script>	
<?php 
}

//Suppression d'un prod
function nom_prod()
{
	global $bdd;
	return $bdd->query ('SELECT nom_prod FROM produits');	
}

function sup_prod_photo() //Supression de la photo
{
	global $bdd;
	$req = $bdd->prepare ('SELECT photo_prod FROM produits
						WHERE nom_prod = :nom_prod');

	$nom_prod = $_POST ['nom_prod'];

	$req->execute(array(
		'nom_prod' => $nom_prod								
		));	

	$donnees = $req->fetch();	
	unlink('images/produits/global/'.$donnees['photo_prod']);
		
	$req->closeCursor();
}

function sup_prod() //Supression dans la bdd
{
	global $bdd;

	//traitement de la suppression	
	$req = $bdd->prepare ('DELETE FROM produits
						WHERE nom_prod = :nom_prod');	

	$nom_prod = $_POST ['nom_prod'];					
	
	$req->execute(array(
		'nom_prod' => $nom_prod								
		));	

	$req->closeCursor();	
	?>	
	<script language="JavaScript">
		alert('suppression effectuée');
		window.location.replace("index_admin.php?page=c_admin_supprimer");
	</script>	
<?php 
}
?>
