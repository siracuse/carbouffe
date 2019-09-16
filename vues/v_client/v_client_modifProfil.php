<!-- Modification des identifiants client -->
<br><br><br><br><br><br><br>
<div class="container"> 
  <div class="row">
    <h3 style="color:#4260FF;" class="center-align">
      <i style="margin-right: 10px; font-size: 38px;" class="material-icons">face</i>Mon Profil 
    </h3> 
    <hr style="width: 80%;"><br>
    <h5 class="center-align"> Modification de mes identifiants </h5><br><br><br>

    <?php 
    $req = indentifiants();
    $donnees = $req->fetch();
        
        echo '<form class="col m12" method="post">';
        //Login
        echo '<div class="input-field col m12">';
          echo '<i class="material-icons prefix">person</i>';
          echo '<input placeholder="login" id="login" type="text" name="login_client" value="'.$donnees['login_client'].'" autofocus>';
          echo '<label class="active" for="login">Login</label>';
        echo '</div> ';
        //mdp 1
        echo '<div class="input-field col m12">';
          echo '<i class="material-icons prefix">lock</i>';
          echo '<input placeholder="mot de passe" id="nom" type="password" name="mdp_client" required>';
          echo '<label class="active" for="nom">Votre nouveau mot de passe</label>';
        echo '</div>';
        //mdp 2
        echo '<div class="input-field col m12">';
          echo '<i class="material-icons prefix">lock</i>';
          echo '<input placeholder="mot de passe" id="nom" type="password" name="mdp2_client" required>';
          echo '<label class="active" for="nom">Confirmation du mot de passe</label>';
        echo '</div>';
        //bouton de confirmation
        echo '<div class="center-align">';
          echo '<button type="submit" class="btn btn-default blue darken-1" name="submit_modifProfil">Valider</button>';
        echo '</div>';
      echo '</form>';
    
    ?>
  </div>
</div>
<br><br><br><br>