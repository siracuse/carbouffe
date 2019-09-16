<?php
include ('modeles/m_client/m_client_profil.php');
include('vues/v_client/v_client_profil.php');

//Redirection vers la page modifProfil lors du clic bouton
if (isset($_POST['submit_modifProfil'])) 
{   
	?> 
	<script language="JavaScript">
		window.location.replace("index_client.php?page=c_client_modifProfil");
	</script> 
	<?php
}
?>