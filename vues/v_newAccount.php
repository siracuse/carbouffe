<!-- Formulaire pour un nouveau compte -->
<br><br><br><br><br><br><br>
<div class="container"> 
	<div class="row">
		<h3 style="color:#4260FF;" class="center-align">
			<i style="margin-right: 10px; font-size: 38px;" class="material-icons">person_add</i>Nouveau compte 
		</h3> <br><br>
		<form class="col m12" method="post">
			<div class="row">
				<div class="input-field col m6">
					<i class="material-icons prefix">account_circle</i>
					<input id="nom" type="text" class="validate" name="nom_client" maxlength="25" autofocus required>
					<label for="nom">Nom :</label>
				</div>
				<div class="input-field col m6">
					<i class="material-icons prefix">account_circle</i>
					<input id="prenom" type="text" name="prenom_client" class="validate" maxlength="25" required>
					<label for="prenom">Prénom :</label>
				</div>

				<div class="input-field col m12">
					<i class="material-icons prefix">location_on</i>
					<input id="adresse" type="text" name="adr_client" class="validate" maxlength="50" required>
					<label for="adresse">Adresse :</label>
				</div>

				<div class="input-field col m6">
					<i class="material-icons prefix">phone</i>
					<input id="tel" type="number" name="tel_client" class="validate" required>
					<label for="tel">Téléphone :</label>
				</div>

				<div class="input-field col m6">
					<i class="material-icons prefix">location_on</i>
					<input id="cp" type="number" name="cp_client" class="validate" required>
					<label for="cp">CP :</label>
				</div>

				<div class="input-field col m12">
					<i class="material-icons prefix">person</i>
					<input id="login" type="text" name="login_client" class="validate" maxlength="25" required>
					<label for="login">Login :</label>
				</div>

				<div class="input-field col m12">
					<i class="material-icons prefix">lock</i>
					<input id="mdp" type="password" name="mdp_client" class="validate" required>
					<label for="mdp">Mot de passe :</label>
				</div>

				<div class="input-field col m12">
					<i class="material-icons prefix">lock</i>
					<input id="mdp2" type="password" name="mdp_client2" class="validate" required>
					<label for="mdp2">Confirmez votre mot de passe :</label>
				</div>

				<!-- <div class="col s12">
					<div class="g-recaptcha" data-sitekey="6LeETzcUAAAAAIl5RVYq1l4-zoA4tc9NuTs041gO"></div>
				</div> -->

				<div class="col m11 ">
					<br>
					<input type="checkbox" id="accepter" required>
					<label for="accepter">J'ai lu et j'accepte les mentions légales et les CGV</label>
					<br><br><br><br>
				</div>
			</div>
			<div class="center-align">
				<button type="submit" class="btn btn-default blue darken-1" name="submit_newAccount">Création du compte</button>
				<button type="reset" class="btn btn-default blue darken-1">Annuler</button><br><br>
				<a href="index.php?page=c_login" style="color:white;"><button type="button" class="btn btn-default blue darken-1" > Retour </button></a>
			</div>
		</div>
	</div>
</form>
</div>
</div>
<br><br><br><br>