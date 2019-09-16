<?php
// AFFICHER INFO SUR LE PRODUIT


	$req = afficher_info();
	$donnees = $req->fetch();

?>

<br><br><br><br><br><br>
<div class="cotainer">
	<div class="row">
		<div class="col m6">
			<div class="center-align item">
				<?php echo '<img class="responsive-img" src="images/produits/global/'.$donnees['photo_prod'].'">'; ?>
			</div>
		</div>
		<div class="col m5">
			<br><br>
			<h4><?php echo $donnees['nom_prod']; ?></h4>
			<hr>
			<p><?php echo $donnees['descrip_prod']; ?></p><br>
			<h5>Prix : <?php echo $donnees['prix_prod']; ?> €</h5><br><br><br>
		</div>
	</div>
</div>
<br><br><br><br>