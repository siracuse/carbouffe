<?php

function cat_aff_modifierChoix()
{	
	global $bdd;
	return $bdd->query ('SELECT nom_cat FROM categories');
}

function cat_aff_modifier() 
{
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM categories WHERE nom_cat = :nom_cat');
	$nom_cat = $_POST['nom_cat'];				
	$req->execute(array(
		'nom_cat' => $nom_cat
	));	
	return $req;
}



function cat_modifier() 
{
	global $bdd;		
	if ($_FILES ['fichier']['error'] == 4 ) // si l'input file est vide alors on modifie que les autres champs
	{
		$nom_cat = $_POST['nom_cat'];
		$descrip_cat = $_POST['descrip_cat'];
		$n_cat = $_POST['n_cat'];
		
		$req = $bdd->prepare('UPDATE categories
			SET nom_cat = :nom_cat, descrip_cat = :descrip_cat 									
			WHERE n_cat = :n_cat
			');

		$req->execute(array(					
			'nom_cat' => $nom_cat,
			'descrip_cat' => $descrip_cat,			
			'n_cat' => $n_cat					
		));	
		?>
		<script language="JavaScript">
			alert ('Modification effectué');
			window.location.replace("index_admin.php?page=c_admin_modifier_cat");
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
				move_uploaded_file($_FILES['fichier']['tmp_name'], 'images/categories/'.$_FILES['fichier']['name'] );
				
				$nom_cat = $_POST['nom_cat'];
				$descrip_cat = $_POST['descrip_cat'];				
				$n_cat = $_POST['n_cat'];					

				$req = $bdd->prepare('UPDATE categories
					SET nom_cat = :nom_cat, descrip_cat = :descrip_cat, photo_cat = :photo_cat								
					WHERE n_cat = :n_cat
					');

				$req->execute(array(					
					'nom_cat' => $nom_cat,
					'descrip_cat' => $descrip_cat,					
					'photo_cat' => $_FILES['fichier']['name'],
					'n_cat' => $n_cat					
				));	
				?>
				<script language="JavaScript">
					alert ('Modification effectué');
					window.location.replace("index_admin.php?page=c_admin_modifier_cat");
				</script>
				<?php
			}					
			else
			{							
				?>
				<script language="JavaScript">
					var error = '<?php echo $error ?>';
					window.location.replace("index_admin.php?page=c_admin_modifier_cat");
					alert (error);
				</script>
				<?php
			}
		}
	}
}
?>