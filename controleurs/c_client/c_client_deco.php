<?php	
	include('modeles/m_client/m_client_deco.php');
	
	//Si le panier est vide alors on vide la bdd et deco
	if (count($_SESSION['panier']['libelleProduit']) <= 0)
	{
		suppressionPanier();
		deco();
	}
	else
	{	
		//sinon si le panier n'est pas vide alors on sauvegarde
		if (numDecommande() == '')
		{
			savePanier();
			deco();
		}
		//sinon on vide le panier de la bdd, on ajout les new article et on deco
		else
		{
			suppressionPanier();
			savePanier();
			deco();
		}
	}	
?>