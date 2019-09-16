<!-- Formulaire de modif -->
<div class="container">
  <div class="row">
    <center>
      <h4> Effectuer les modifications du produit </h4> <br><br>
      <form method="post" enctype="multipart/form-data">
        <p>
          <div class="input-field col s12">
            <?php
            $req = produit_aff_modifier();
            while ($donnees = $req->fetch()) 
            {     
              echo '<input type="hidden" name="n_prod" value="'.$donnees['n_prod'].'" required readonly="readonly" /> <br /> <br />';

              echo ' Image : <input type="file" name="fichier" value="'.$donnees['photo_prod'].'" accept=".jpg, .jpeg, .png, .gif" />'.'<br><br>'; 
              echo ' <img src="images/produits/global/'.$donnees['photo_prod'].'" height=180 width=180 ><br><br>';
              echo ' Nom du produit  : <input type="text" name="nom_prod" value="'.$donnees['nom_prod'].'" required />'.'<br />';
              echo ' Prix du produit  : <input type="text" name="prix_prod" value="'.$donnees['prix_prod'].'" required />'.'<br />';
              echo ' Description du produit  : <input type="text" name="descrip_prod" value="'.$donnees['descrip_prod'].'" required />'.'<br />';               
            }
            $req->closeCursor();
            ?>

            <br /><br />  
            <input type="submit" value="Modifier" name="submit"/>
          </div>
        </p>
      </form>
    </center>
  </div>
</div>
