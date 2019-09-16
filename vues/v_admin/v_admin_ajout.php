<div class="dashboard">
  <div class="row">
    <div class="col s12">
      <div class="card teal lighten-1 lighten-1 white-text valign-wrapper">
        <div class="   icon valign-wrapper">
          <i class="material-icons medium valign">account_box</i>
        </div>
        <div class="card-content">
          <div class="row">
            <h3 class="card-stats-number">Gestionnaire des Ajout</h3>                    
          </div>
        </div>
      </div>
    </div>  

    <!-- DEBUT FORMULAIRE AJOUT -->
    <div class="col s12">
      <ul class="collapsible" data-collapsible="accordion">

        <!-- Ajout d'une nouvelle catégorie -->
        <li>
          <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><i class="material-icons">add</i>Ajouter une nouvelle catégorie</div>
          <div class="collapsible-body">
            <div class="row">                
              <form class="col s12" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="N_de_devis" type="text" class="validate" name="nom_cat" required>
                    <label>Nom de la catégorie</label>
                  </div>   
                  <div class="input-field col s12"> 
                    <i class="material-icons prefix">account_circle</i>           
                    <textarea id="textarea1" class="materialize-textarea" name="descrip_cat" required> </textarea>
                    <label>Description de la catégorie</label>
                  </div>
                </div>
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Photo de la catégorie</span>
                    <input type="file" name="fichier" readonly>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Choisir au moins une photo">
                  </div>
                </div>

                <div class="col s4"><br>
                  <button class="btn waves-effect waves-light green" type="submit" name="submit_cat">Ajout de la catégorie<i class="material-icons right">send</i></button>
                </div>
              </form>
            </div>
          </div>
        </li>

        <!-- Ajout d'une sous catégorie -->
        <li>
          <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><i class="material-icons">add</i>Ajouter une nouvelle sous catégorie</div>
          <div class="collapsible-body">
            <div class="row">                
              <form class="col s12" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="N_de_devis" type="text" class="validate" name="nom_sous_cat" required>
                    <label>Nom de la sous catégorie</label>
                  </div> 
                  <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <select name="n_cat">
                      <option value="" disabled selected>--- Catégories ---</option>
                      <?php 
                      $req = n_cat();
                      while ($donnees = $req->fetch()) 
                      {   
                        echo "<option value=".$donnees['n_cat'].">".$donnees['nom_cat']."</option>";
                      }
                      $req->closeCursor();
                      ?>
                    </select>
                    <label>Sélectionnez la catégorie associée</label>
                  </div>                                        
                </div>
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Photo de la sous catégorie</span>
                    <input type="file" name="fichier" readonly>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Choisir au moins une photo">
                  </div>
                </div>

                <div class="col s4"><br>
                  <button class="btn waves-effect waves-light green" type="submit" name="submit_sous_cat">Ajout de la sous catégorie<i class="material-icons right">send</i></button>
                </div>
              </form>
            </div>
          </div>
        </li>


        <!-- Ajout d'un produit -->
        <li>
          <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><i class="material-icons">add</i>Ajouter un nouveau produit</div>
          <div class="collapsible-body">
            <div class="row">                
              <form class="col s12" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="N_de_devis" type="text" class="validate" name="nom_prod">
                    <label>Nom du produit</label>
                  </div>   
                  <div class="input-field col s6"> 
                    <i class="material-icons prefix">account_circle</i>           
                    <input id="Nom_client" type="number" class="validate" name="prix_prod">
                    <label>Prix du produit</label>
                  </div>
                  <div class="input-field col s6"> 
                    <i class="material-icons prefix">account_circle</i>           
                    <select name="id_sous_cat">
                      <option value="" disabled selected>--- Sous catégories ---</option>
                      <?php 
                      $req = id_sous_cat();
                      while ($donnees = $req->fetch()) 
                      {   
                        echo "<option value=".$donnees['id_sous_cat'].">".$donnees['nom_sous_cat']."</option>";
                      }
                      $req->closeCursor();
                      ?>
                    </select>
                    <label>Sous catégorie associée</label>
                  </div>
                  <div class="input-field col s12"> 
                    <i class="material-icons prefix">account_circle</i>           
                    <textarea id="textarea1" class="materialize-textarea" name="descrip_prod"></textarea>
                    <label>Description du produit</label>
                  </div>
                </div>
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Photo du produit</span>
                    <input type="file" name="fichier" readonly>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Choisir au moins une photo">
                  </div>
                </div>
                <div class="col s12"><br>
                  <button class="btn waves-effect waves-light green" type="submit" name="submit_produits">Ajout du produit<i class="material-icons right">send</i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </li>

    </ul>
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
