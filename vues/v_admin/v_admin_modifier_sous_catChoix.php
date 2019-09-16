  <div class="dashboard">
  <div class="row">
    
    <div class="col s12">
      <div class="card teal lighten-1 lighten-1 white-text valign-wrapper">
        <div class="   icon valign-wrapper">
          <i class="material-icons medium valign">account_box</i>
        </div>
        <div class="card-content">
          <div class="row">
            <h3 class="card-stats-number">Gestionnaire des Modifications</h3>                    
          </div>
        </div>
      </div>
    </div> 
      <a href="index_admin.php?page=c_admin_accueil">
      <div class="col m12">
        <div class="card blue  white-text valign-wrapper">
          <div class="  icon valign-wrapper">
            <i class="material-icons small valign">replay</i>
          </div>
          <div class="card-content">
            <div class="row">
              <h5 class="card-stats-number">Retour à l'accueil</h5>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>
<br><br>
  <!-- Formulaire de modif -->
  <div class="container">
<div class="row">
    <div class="form-style-6">
  <center>

    <h4> Choisir la sous catégorie à modifier </h4>
    <form method="post">
      <div class="input-field col s12">
        <select name="nom_sous_cat">
          <?php
            $req = sous_cat_aff_modifierChoix();
            while ($donnees = $req->fetch()) 
            {   
              echo "<option value=".$donnees['nom_sous_cat'].">".$donnees['nom_sous_cat']."</option>";
            }
            $req->closeCursor();
          ?>
          <br /><br />  
        </select>
      </div>
      <input type="submit" value="Valider votre choix" name="submit_choix_sous_cat" />  
    </form>       
    <br><br><br><br><br><br><br>
  </center>
</div>
</div>
</div>