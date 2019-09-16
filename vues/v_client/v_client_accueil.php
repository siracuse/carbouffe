<!-- PARALLAX !-->   
<div class="parallax-container">
  <div class="parallax"><img src="images/caf.jpg">
  </div>
  <br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br>
  <div class="top-bar-section center" id="mean_nav">
    <ul>
      <li><a class="btn-floating btn-large waves-effect  red darken-4 z-depth-5 pulse"  href="#prod" ><i class="material-icons">arrow_downward</i></a></li>
    </ul>
  </div>
</div>

<!-- RECHERCHE !-->
  
<div class="row grey darken-4">
  <br><br>  
  <form action="search/searchclient.php" method="post">    
    <div class="col m8 offset-m2">
      <h5 class="center-align prod" style="color:#f1f1f1;"> Recherche d'un produit : </h5>  <br>
      <input type="text" name="produit" id="produit" class="form-control" placeholder="Entrer le nom d'un produit" autocomplete="off" style="color:white;"/>
      <div id="produitList" style="color:white;"></div> <br>
      <input type="submit" class="btn btn-default blue darken-3 right" id="submit" value="Rechercher"><br><br><br>
    </div>
  </form>
</div> <br>

<!-- CATEGORIE -->
<div class="row" id="prod" style="margin-bottom:0px;">
  <div class="col m12">

    <center> <h3 style="color:#4260FF;"> Nos produits </h3> </center>
    <hr style="width: 80%;"><br><br>

    <?php
    $req = afficher_produits();

    while ($donnees = $req->fetch())  
    {
      echo '<div class="col m3">';
      echo '<div class="card transparent darken-1">';
      echo '<div class="card-image ">';
      echo '<a href="index_client.php?page=c_client_'.$donnees['nom_cat'].'"> <img src="images/categories/'.$donnees['photo_cat'].'" width="800" /> </a>';
      echo '</div>';
      echo '<div class="card-content blak-text">';
      echo '<a style="color:#B71C1C;" href="index_client.php?page=c_client_'.$donnees['nom_cat'].'"> <span class="card-title center-align">'.$donnees['nom_cat'].'</span> </a>';
      echo '<hr>';
      echo '<p>'.$donnees['descrip_cat'].'</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    ?>

  </div>
</div>  