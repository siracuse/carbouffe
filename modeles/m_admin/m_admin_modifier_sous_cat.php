<?php

function sous_cat_aff_modifierChoix()
{	
	global $bdd;
	return $bdd->query ('SELECT nom_sous_cat FROM sous_categories');
}

function sous_cat_aff_modifier() 
{
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM sous_categories WHERE nom_sous_cat = :nom_sous_cat');
	$nom_sous_cat = $_POST['nom_sous_cat'];				
	$req->execute(array(
		'nom_sous_cat' => $nom_sous_cat
	));	
	return $req;
}



function sous_cat_modifier() 
{
	global $bdd;		
	if ($_FILES ['fichier']['error'] == 4 ) // si l'input file est vide alors on modifie que les autres champs
	{
		$nom_sous_cat = $_POST['nom_sous_cat'];	
		$id_sous_cat = $_POST['id_sous_cat'];

		$req = $bdd->prepare('UPDATE sous_categories
			SET nom_sous_cat = :nom_sous_cat  									
			WHERE id_sous_cat = :id_sous_cat
			');

		$req->execute(array(					
			'nom_sous_cat' => $nom_sous_cat,						
			'id_sous_cat' => $id_sous_cat					
		));	
		?>
		<script language="JavaScript">
			alert ('Modification effectué');
			window.location.replace("index_admin.php?page=c_admin_modifier_sous_cat");
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
				move_uploaded_file($_FILES['fichier']['tmp_name'], 'images/sous_categories/'.$_FILES['fichier']['name'] );
				
				$nom_sous_cat = $_POST['nom_sous_cat'];								
				$id_sous_cat = $_POST['id_sous_cat'];					

				$req = $bdd->prepare('UPDATE sous_categories
					SET nom_sous_cat = :nom_sous_cat, photo_sous_cat = :photo_sous_cat								
					WHERE id_sous_cat = :id_sous_cat
					');

				$req->execute(array(					
					'nom_sous_cat' => $nom_sous_cat,									
					'photo_sous_cat' => $_FILES['fichier']['name'],
					'id_sous_cat' => $id_sous_cat					
				));	
				?>
				<script language="JavaScript">
					alert ('Modification effectué');
					window.location.replace("index_admin.php?page=c_admin_modifier_sous_cat");
				</script>
				<?php
			}					
			else
			{							
				?>
				<script language="JavaScript">
					var error = '<?php echo $error ?>';
					window.location.replace("index_admin.php?page=c_admin_modifier_sous_cat");
					alert (error);
				</script>
				<?php
			}
		}
	}
}
?>