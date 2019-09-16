<?php

function produit_aff_modifierChoix()
{	
	global $bdd;
	return $bdd->query ('SELECT nom_prod FROM produits');
}

function produit_aff_modifier() 
{
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM produits WHERE nom_prod = :nom_prod');
	$nom_prod = $_POST['nom_prod'];				
	$req->execute(array(
		'nom_prod' => $nom_prod
	));	
	return $req;
}



function produit_modifier() 
{
	global $bdd;		
	if ($_FILES ['fichier']['error'] == 4 ) // si l'input file est vide alors on modifie que les autres champs
	{
		$nom_prod = $_POST['nom_prod'];
		$prix_prod = $_POST['prix_prod'];		
		$descrip_prod = $_POST['descrip_prod'];		
		$n_prod = $_POST['n_prod'];
		
		$req = $bdd->prepare('UPDATE produits
			SET nom_prod = :nom_prod, prix_prod = :prix_prod, descrip_prod = :descrip_prod 									
			WHERE n_prod = :n_prod
			');

		$req->execute(array(					
			'nom_prod' => $nom_prod,			
			'prix_prod' => $prix_prod,
			'descrip_prod' => $descrip_prod,			
			'n_prod' => $n_prod					
		));	
		?>
		<script language="JavaScript">
			alert ('Modificationnnn effectué');
			window.location.replace("index_admin.php?page=c_admin_modifier_produits");
		</script>
		<?php
	}
	else
	{
		if ($_FILES['fichier']['error'] == 0) 
		{
			//Verification au niveau de la taille
			if ($_FILES['fichier']['size'] > 2097152) //equiv à 2MO 
			{  
				$error = "Votre fichier est trop lourd !! 1Mo maximum";
			}
			//Verification au niveau de l'extension
			else 
			{
				$extensionValides = array('.jpg', '.jpeg', '.gif', '.png');
				$extension = strrchr($_FILES['fichier']['name'], '.');

				if (!in_array($extension, $extensionValides)) {
					$error = 'Format de fichier incorrect \n Seuls les fichiers .jpg .jpeg .gif ou .png sont acceptés';
				}		
			}

			// si il y a pas d'erreur
			if (empty($error))
			{
				move_uploaded_file($_FILES['fichier']['tmp_name'], 'images/produits/global/'.$_FILES['fichier']['name'] );
				
				$nom_prod = $_POST['nom_prod'];
				$descrip_prod = $_POST['descrip_prod'];				
				$n_prod = $_POST['n_prod'];					

				$req = $bdd->prepare('UPDATE produits
					SET nom_prod = :nom_prod, descrip_prod = :descrip_prod, photo_prod = :photo_prod								
					WHERE n_prod = :n_prod
					');

				$req->execute(array(					
					'nom_prod' => $nom_prod,
					'descrip_prod' => $descrip_prod,					
					'photo_prod' => $_FILES['fichier']['name'],
					'n_prod' => $n_prod					
				));	
				?>
				<script language="JavaScript">
					alert ('Modification effectué');
					window.location.replace("index_admin.php?page=c_admin_modifier_produits");
				</script>
				<?php
			}					
			else
			{							
				?>
				<script language="JavaScript">
					var error = '<?php echo $error ?>';
					window.location.replace("index_admin.php?page=c_admin_modifier_produits");
					alert (error);
				</script>
				<?php
			}
		}
	}
}
?>