<!-- Formulaire de modif -->
<div class="container">
  <div class="row">
  <center>
    <h4> Effectuer les modifications de la catégorie </h4> <br><br>
    <form method="post" enctype="multipart/form-data">
      <p>
        <div class="input-field col s12">

          <?php
          $req = cat_aff_modifier();
          while ($donnees = $req->fetch()) 
          {     
          
          echo '<input type="hidden" name="n_cat" value="'.$donnees['n_cat'].'" required readonly="readonly" /> <br /> <br />';
         
          echo ' Image : <input type="file" name="fichier" value="'.$donnees['photo_cat'].'" accept=".jpg, .jpeg, .png, .gif" />'.'<br><br>'; 
          echo ' <img src="images/categories/'.$donnees['photo_cat'].'" height=180 width=180 ><br><br>';
          echo ' Nom catégorie  : <input type="text" name="nom_cat" value="'.$donnees['nom_cat'].'" required />'.'<br />';
          echo ' Description catégorie : <input type="text" name="descrip_cat" value="'.$donnees['descrip_cat'].'" required />'.'<br />';          
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


    