<?php
// AFFICHER INFO DES PRODUITS
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
			<div class="input-field col m2" style="margin-top: -10px;">
				<input id="qte" type="number" value="1" readonly="readonly">
				<label for="qte" class="active">Quantité(s) : </label>
			</div>
			<div class="col m10">
				<a href="index_client.php?action=ajout&amp;l=<?php echo $donnees['nom_prod']; ?>&amp;q=1&amp;p=<?php echo $donnees['prix_prod']; ?>&amp;img=images/produits/global/<?php echo $donnees['photo_prod']; ?>
					" class="waves-effect waves-light btn"><i class="material-icons left">add_shopping_cart</i>Ajouter au panier
				</a>
			</div>
		</div>
	</div>
</div>
<br><br><br><br>