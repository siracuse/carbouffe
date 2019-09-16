<?php
include ('modeles/m_client/m_client_modifProfil.php');
include('vues/v_client/v_client_modifProfil.php');

if (isset($_POST['submit_modifProfil'])) 
{   
	$i = modifIdentifiants();
	if ($i == 1)	//Succès
	{
		?> 
		<script language="JavaScript">
			alert(' Modification effectuer');
			window.location.replace("index_client.php?page=c_client_accueil");
		</script> 
		<?php
	}
	else 	//Echec
	{
		?> 
		<script language="JavaScript">
			alert(' Erreur \n Les mots de passe entrés ne correspondent pas');
			window.location.replace("index_client.php?page=c_client_modifProfil");
		</script> 
		<?php
	}
	
}

?>