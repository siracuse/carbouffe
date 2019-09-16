<?php
function ajout_cat() 
{
	global $bdd;

	if ($_FILES['fichier']['error'] == 0) 
	{
		//Verification au niveau de la taille
		if ($_FILES['fichier']['size'] > 2097152) //equiv à 2MO
		{  
			$error = "Votre fichier est trop lourd !! 1Mo maximum";
		}
		else 
		{
			//Verification au niveau de l'extension
			$extensionValides = array('.jpg', '.jpeg', '.gif', '.png');
			$extension = strrchr($_FILES['fichier']['name'], '.');
						
			if (!in_array($extension, $extensionValides)) 
			{
				$error = 'Format de fichier incorrect \n Seuls les fichiers .jpg, .jpeg .gif ou .png sont acceptés';
			}		
		}

		if (empty($error))
		{
			move_uploaded_file($_FILES['fichier']['tmp_name'], 'images/categories/'.$_FILES['fichier']['name'] );

			$nom_cat = $_POST['nom_cat'];
			$descrip_cat = $_POST['descrip_cat'];
			$photo_cat = $_FILES['fichier']['name'];
		
			$req = $bdd->prepare('INSERT INTO categories(nom_cat, descrip_cat, photo_cat) 
								VALUES(:nom_cat, :descrip_cat, :photo_cat)');

			$req->execute(array(							
				'nom_cat' => $nom_cat,				
				'descrip_cat' => $descrip_cat,
				'photo_cat' => $photo_cat
			));	
			
			?>
			<script language="JavaScript">
				alert ('Ajout effectué');
			</script>
			<?php
		}
		else
		{							
			?>
			<script language="JavaScript">
				var error = '<?php echo $error ?>';
				alert (error);
			</script>
			<?php
		}
	}	
}

function ajout_sous_cat() 
{
	global $bdd;

	if ($_FILES['fichier']['error'] == 0) 
	{
		//Verification au niveau de la taille
		if ($_FILES['fichier']['size'] > 2097152) //equiv à 2MO
		{  
			$error = "Votre fichier est trop lourd !! 1Mo maximum";
		}
		else 
		{
			//Verification au niveau de l'extension
			$extensionValides = array('.jpg', '.jpeg', '.gif', '.png');
			$extension = strrchr($_FILES['fichier']['name'], '.');
						
			if (!in_array($extension, $extensionValides)) 
			{
				$error = 'Format de fichier incorrect \n Seuls les fichiers .jpg, .jpeg .gif ou .png sont acceptés';
			}		
		}

		if (empty($error))
		{
			move_uploaded_file($_FILES['fichier']['tmp_name'], 'images/sous_categories/'.$_FILES['fichier']['name'] );

			$nom_sous_cat = $_POST['nom_sous_cat'];
			$n_cat = $_POST['n_cat'];
			$photo_sous_cat = $_FILES['fichier']['name'];
						
			$req = $bdd->prepare('INSERT INTO sous_categories(nom_sous_cat, n_cat, photo_sous_cat) 
								VALUES(:nom_sous_cat, :n_cat, :photo_sous_cat)');

			$req->execute(array(							
				'nom_sous_cat' => $nom_sous_cat,
				'n_cat' => $n_cat,
				'photo_sous_cat' => $photo_sous_cat				
			));	
			
			?>
			<script language="JavaScript">
				alert ('Ajout effectué');
			</script>
			<?php
		}
		else
		{							
			?>
			<script language="JavaScript">
				var error = '<?php echo $error ?>';
				alert (error);
			</script>
			<?php
		}
	}	
}
function n_cat()
{
	global $bdd;
	return $bdd->query ('SELECT n_cat, nom_cat FROM categories');
}
function ajout_produits() 
{
	global $bdd;

	if ($_FILES['fichier']['error'] == 0) 
	{
		//Verification au niveau de la taille
		if ($_FILES['fichier']['size'] > 2097152) //equiv à 2MO
		{  
			$error = "Votre fichier est trop lourd !! 1Mo maximum";
		}
		else 
		{
			//Verification au niveau de l'extension
			$extensionValides = array('.jpg', '.jpeg', '.gif', '.png');
			$extension = strrchr($_FILES['fichier']['name'], '.');
						
			if (!in_array($extension, $extensionValides)) 
			{
				$error = 'Format de fichier incorrect \n Seuls les fichiers .jpg, .jpeg .gif ou .png sont acceptés';
			}		
		}

		if (empty($error))
		{
			move_uploaded_file($_FILES['fichier']['tmp_name'], 'images/produits/global/'.$_FILES['fichier']['name'] );

			$nom_prod = $_POST['nom_prod'];
			$prix_prod = $_POST['prix_prod'];
			$descrip_prod = $_POST['descrip_prod'];
			$photo_prod = $_FILES['fichier']['name'];
			$id_sous_cat = $_POST['id_sous_cat'];
			
			$req = $bdd->prepare('INSERT INTO produits(nom_prod, prix_prod, descrip_prod, photo_prod, id_sous_cat) 
								VALUES(:nom_prod, :prix_prod, :descrip_prod, :photo_prod, :id_sous_cat)');

			$req->execute(array(							
				'nom_prod' => $nom_prod,
				'prix_prod' => $prix_prod,
				'descrip_prod' => $descrip_prod,
				'photo_prod' => $photo_prod,
				'id_sous_cat' => $id_sous_cat
			));	
			
			?>
			<script language="JavaScript">
				alert ('Ajout effectué');
			</script>
			<?php
		}
		else
		{							
			?>
			<script language="JavaScript">
				var error = '<?php echo $error ?>';
				alert (error);
			</script>
			<?php
		}
	}	
}
function id_sous_cat()
{
	global $bdd;
	return $bdd->query ('SELECT id_sous_cat, nom_sous_cat FROM sous_categories');
}
?>