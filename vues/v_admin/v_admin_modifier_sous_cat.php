<!-- Formulaire de modif -->
<div class="container">
  <div class="row">
    <center>
      <h4> Effectuer les modifications de la sous catégorie </h4> <br><br>
      <form method="post" enctype="multipart/form-data">
        <p>
          <div class="input-field col s12">

            <?php
            $req = sous_cat_aff_modifier();
            while ($donnees = $req->fetch()) 
            {     

              echo '<input type="hidden" name="id_sous_cat" value="'.$donnees['id_sous_cat'].'" required readonly="readonly" /> <br /> <br />';

              echo ' Image : <input type="file" name="fichier" value="'.$donnees['photo_sous_cat'].'" accept=".jpg, .jpeg, .png, .gif" />'.'<br><br>'; 
              echo ' <img src="images/sous_categories/'.$donnees['photo_sous_cat'].'" height=180 width=180 ><br><br>';
              echo ' Nom sous catégorie  : <input type="text" name="nom_sous_cat" value="'.$donnees['nom_sous_cat'].'" required />'.'<br />';               
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
