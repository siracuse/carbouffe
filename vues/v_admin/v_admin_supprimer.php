<div class="dashboard">
  <div class="row">
    <div class="col s12">
      <div class="card teal lighten-1 lighten-1 white-text valign-wrapper">
        <div class="   icon valign-wrapper">
          <i class="material-icons medium valign">account_box</i>
        </div>
        <div class="card-content">
          <div class="row">
            <h3 class="card-stats-number">Gestionnaire des Suppressions</h3>                    
          </div>
        </div>
      </div>
    </div>  

          <!-- DEBUT FORMULAIRE AJOUT -->
          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion">

              <!-- Suppression d'une catégorie -->
              <li>
                <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><i class="material-icons">add</i>Supprimer une catégorie</div>
                <div class="collapsible-body">
                  <div class="row">                
                    <form class="col s12" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">account_circle</i>
                          <select name="nom_cat" required>
                            <option value="" disabled selected>--- Catégories ---</option>
                            <?php 
                            $req = nom_cat();
                            while ($donnees = $req->fetch()) 
                            {   
                              echo "<option value=".$donnees['nom_cat'].">".$donnees['nom_cat']."</option>";
                            }
                            $req->closeCursor();
                            ?>
                          </select>
                          <label>Nom de la catégorie</label>
                        </div>   
                      </div>
                      <div class="col s4"><br>
                        <button class="btn waves-effect waves-light green" type="submit" name="submit_cat" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"> Supprimer la catégorie<i class="material-icons right">send</i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </li>

              <!-- Suppression d'une sous cat -->
              <li>
                <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><i class="material-icons">add</i>Supprimer une sous catégorie</div>
                <div class="collapsible-body">
                  <div class="row">                
                    <form class="col s12" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">account_circle</i>
                          <select name="nom_sous_cat" required>
                            <option value="" disabled selected>--- Sous catégories ---</option>
                            <?php 
                            $req = nom_sous_cat();
                            while ($donnees = $req->fetch()) 
                            {   
                              echo "<option value=".$donnees['nom_sous_cat'].">".$donnees['nom_sous_cat']."</option>";
                            }
                            $req->closeCursor();
                            ?>
                          </select>
                          <label>Nom de la sous catégorie</label>
                        </div>   
                      </div>
                      <div class="col s4"><br>
                        <button class="btn waves-effect waves-light green" type="submit" name="submit_sous_cat" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">Supprimer la sous catégorie<i class="material-icons right">send</i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </li>


              <!-- Suppression d'un article -->
              <li>
                <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><i class="material-icons">add</i>Supprimer un article</div>
                <div class="collapsible-body">
                  <div class="row">                
                    <form class="col s12" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">account_circle</i>
                          <select name="nom_prod" required>
                            <option value="" disabled selected>--- Article ---</option>
                            <?php 
                            $req = nom_prod();
                            while ($donnees = $req->fetch()) 
                            {   
                              echo "<option value=".$donnees['nom_prod'].">".$donnees['nom_prod']."</option>";
                            }
                            $req->closeCursor();
                            ?>
                          </select>
                          <label>Nom de l'article</label>
                        </div>   
                      </div>
                      <div class="col s4"><br>
                        <button class="btn waves-effect waves-light green" type="submit" name="submit_prod" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">Supprimer l'article<i class="material-icons right">send</i></button>
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
