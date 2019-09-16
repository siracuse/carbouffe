<!-- PARALLAX Bouton rouge de redirection vers le bas-->   
<div class="parallax-container">
  <div class="parallax">
    <img style="width: 15%;" src="images/surgeles.jpg">
  </div>
  <br><br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br><br>
  <div class="top-bar-section center" id="mean_nav">
    <ul>
      <li><a class="btn-floating btn-large waves-effect  red darken-4 z-depth-5 pulse"  href="#prod" ><i class="material-icons">arrow_downward</i></a></li>
    </ul>
  </div>
</div>


<!-- Surgeles --> 
<div class="had-container" id="prod">
  <div class="row center-align">
    <h3 style="color:#4260FF;"> Les Surgelés </h3> 
    <hr style="width: 80%;"><br><br>
    
    <!-- Bouton de sous catégorie -->
    <button class="btn btn-default filter-button" data-filter="all">All</button>
    <?php
    $req2 = bt_sous_cat();
    while ($donnees = $req2->fetch())
    {
      echo '<button style="margin-right:4px;" class="btn btn-default filter-button" data-filter="'.$donnees['nom_sous_cat'].'">'.$donnees['nom_sous_cat'].'</button>';
    }
    ?>
  </div>
  <br><br>

  <!--Affichage des produits -->
  <div class="row">

    <?php 
    $req = afficher_surgeles();
    while ($donnees = $req->fetch())
    {
      echo '<div class="col m3">';
      echo '<form method="post" action="index_client.php?page=c_client_ficheproduits&id='.$donnees['n_prod'].'">';     
      echo '<div class="container grey lighten-1 z-depth-5 center-align filter '.$donnees['nom_sous_cat'].'"><br>';
      echo '<img class="responsive-img" width="400" height="400" src="images/produits/global/'.$donnees['photo_prod'].'">';
      echo '<center><h5> '.$donnees['nom_prod'].'</h5>'.$donnees['prix_prod'].'€<br><br> </center>';
      ?>
      <a class="btn-floating "  onclick="Materialize.toast('Ajouter', 4000)" 
      href="index_client.php?action=ajout&amp;l=<?php echo $donnees['nom_prod']; ?>&amp;q=1&amp;p=<?php echo $donnees['prix_prod']; ?>&amp;img=images/produits/global/<?php echo $donnees['photo_prod']; ?>&amp;id=<?php echo $donnees['n_prod']; ?>
      " >
      <i class="material-icons" style="background-color: #252525;">add_shopping_cart</i></a>
      <button class="btn-floating " type="submit" name="submit" id="info"><i class="material-icons light-blue darken-4">info_outline</i></button>
      <br><br>
    </form>
  </div><br><br>
</div>
<?php
} 
?>
</div>
<Br><Br><Br>