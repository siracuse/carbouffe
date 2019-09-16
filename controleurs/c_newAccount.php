<?php
include ('modeles/m_newAccount.php');
include('vues/v_newAccount.php');

if (isset($_POST['submit_newAccount']))
{
	require('/../recaptcha/autoload.php');
	//$recaptcha = new \ReCaptcha\ReCaptcha('6LeETzcUAAAAAONLg2fHAo9oSf6khIjDi5JGd7rC');
	//$resp = $recaptcha->verify($_POST['g-recaptcha-response']);
	
	$test = verifPassword();
	
	//Verif du captcha
	//if ($resp->isSuccess()) {
		
		//Verif des mdp
		if ($test == "true")
		{
			$i = ajout_client();
			//Verif d'un login déjà existant
			if ($i == 0)
			{
				?> 
				<script language="JavaScript">
					alert('Le login que vous avez saisie n\'est plus disponible');
					window.location.replace("index.php?page=c_newAccount");
				</script> 
				<?php
			}
			else
			{
				?> 
				<script language="JavaScript">
					alert('Votre compte a bien été crée');
					window.location.replace("index.php?page=c_login");
				</script> 
				<?php
			}
		}
		else 
		{
			?> 
			<script language="JavaScript">
				alert('Les mots de passe que vous avez entrez ne correspondent pas');
				window.location.replace("index.php?page=c_newAccount");
			</script> 
			<?php
		}
	}
	/*else
	{
		$errors = $resp->getErrorCodes();
		?> <script language="JavaScript">
			alert('Erreur Captcha');
			window.location.replace("index.php?page=c_newAccount");
			</script> <?php
		}
	} */

	?>