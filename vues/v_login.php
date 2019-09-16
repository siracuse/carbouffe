<!-- Formulaire de connexion -->
<br><br><br><br><br><br><br>
<div class="container">
  <div class="row">
    <h3 style="color:#4260FF;" class="center-align"> Connexion</h3> 
    <form class="col m12" method="post">
      <div class="row">

        <div class="input-field col m12">
          <i class="material-icons prefix">account_circle</i>
          <input id="nom" type="text" class="validate" name="login_user" maxlength="25" autofocus required>
          <label for="nom">Nom d'utilisateur :</label>
        </div>

        <div class="input-field col m12">
          <i class="material-icons prefix">lock</i>
          <input id="mdp" type="password" name="mdp_user" class="validate"  maxlength="25" required>
          <label for="mdp">Password</label><br><br><br>
        </div>
      </div>
      <div class="row center-align">
        <button type="submit" class="btn btn-default blue darken-1" name="submit_connexion" target="_blank">Se connecter</button>
        <button type="reset" class="btn btn-default blue darken-1">Annuler</button><br><br>
        <a href="index.php?page=c_newAccount" style="color:white;"> <button type="button" class="btn btn-default blue darken-1"> Nouveau Compte </button></a>
      </div>

    </div>
  </form>
</div>
</div>
