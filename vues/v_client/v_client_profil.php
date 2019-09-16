<!-- Affichage des info client -->
<br><br><br><br><br><br><br>
<div class="container"> 
  <div class="row">
    <h3 style="color:#4260FF;" class="center-align">
      <i style="margin-right: 10px; font-size: 38px;" class="material-icons">face</i>Mon Profil 
    </h3> 
    <hr style="width: 80%;"><br><br><br><br>

    <?php 
    $req = infoClient();
    while ($donnees = $req->fetch())
    {
      echo '<form class="col m12" method="post">';
        //Nom
        echo '<div class="input-field col m6">';
          echo '<i class="material-icons prefix">account_circle</i>';
          echo '<input placeholder="nom" id="nom" type="text" name="nom_client" value="'.$donnees['nom_client'].'" readonly="readonly">';
          echo '<label class="active" for="nom">Nom</label>';
        echo '</div>';
        //Prenom
        echo '<div class="input-field col m6">';
          echo '<i class="material-icons prefix">account_circle</i>';
          echo '<input placeholder="prenom" id="prenom" type="text" name="prenom_client" value="'.$donnees['prenom_client'].'" readonly="readonly">';
          echo '<label class="active" for="prenom">Prénom</label>';
        echo '</div>';
        //Adresse
        echo '<div class="input-field col m12">';
          echo '<i class="material-icons prefix">location_on</i>';
          echo '<input placeholder="adresse" id="adresse" type="text" name="adr_client" value="'.$donnees['adr_client'].'" readonly="readonly">';
          echo '<label class="active" for="adresse">Adresse</label>';
        echo '</div>';
        //Tel
        echo '<div class="input-field col m6">';
          echo '<i class="material-icons prefix">phone</i>';
          echo '<input placeholder="tel" id="tel" type="text" name="tel_client" value="'.$donnees['tel_client'].'" readonly="readonly">';
          echo '<label class="active" for="tel">Téléphone</label>';
        echo '</div>';
        //CP
        echo '<div class="input-field col m6">';
          echo '<i class="material-icons prefix">location_on</i>';
          echo '<input placeholder="cp" id="cp" type="text" name="cp_client" value="'.$donnees['cp_client'].'" readonly="readonly">';
          echo '<label class="active" for="cp">Code Postal</label>';
        echo '</div>';
        //Login
        echo '<div class="input-field col m12">';
          echo '<i class="material-icons prefix">person</i>';
          echo '<input placeholder="login" id="login" type="text" name="login_client" value="'.$donnees['login_client'].'" readonly="readonly">';
          echo '<label class="active" for="login">Login</label> <br><br><br><br>';
        echo '</div> ';
        echo '<div class="center-align">';
          echo '<button type="submit" class="btn btn-default blue darken-1" name="submit_modifProfil">Modifier mes identifiants</button>';
        echo '</div>';
      echo '</form>';
    }
    ?>
  </div>
</div>
<br><br><br><br>