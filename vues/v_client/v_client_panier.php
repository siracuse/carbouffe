<br><br><br><br><br><br>
<div class="container ">
   <h4 class="center-align"> Mon Panier :</h4>
   <hr style="width: 80%;">
   <br><br>   
   <!-- Affichage des produits dans un tableau -->
   <table class="striped centered responsive-table">
      <tr>
         <th class="center-align">  Photo </th>
         <th class="center-align">Libellé</th>
         <th class="center-align" >Quantité</th>
         <th class="center-align">Prix Unitaire</th>
         <th class="center-align">Retirer</th>
      </tr>


      <?php
      if (creationPanier())   //si panier creer
      {
         $nbArticles=count($_SESSION['panier']['libelleProduit']);   //compte le nb d'article dans les var de session
         if ($nbArticles <= 0)   //si il y a aucun article, alors
         echo "<tr><td>Votre panier est vide </ td></tr>";
         else     //sinon affichage des articles
         {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {
               echo "<tr>";
               echo "<td> <img src=\"".htmlspecialchars($_SESSION['panier']['imgProduit'][$i])."\" width=\"50\" height=\"50\"> </td>";
            //echo "<td> ID : ". $_SESSION['panier']['n_prod'][$i]."</td>";
               echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
               echo "<td>".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."</td>";
               echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])." €</td>";
               echo "<td><a class=\"btn-floating btn-large waves-effect red waves-light\" href=\"".htmlspecialchars("index_client.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\"><i class=\"large material-icons\">clear</i></a></td>";
               echo "</tr>";
            }

            echo "<tr><td colspan=\"2\"> </td>";
            echo "<td colspan=\"2\">";
            echo "<b>Total : ".MontantGlobal();
            echo " € </b>";
            echo "</td><td>";
            echo " <a class=\" btn waves-effect waves-light red \" type=\"submit\" name=\"action\" href=\"index_client.php?action=suppressionAll\" onclick=\"Materialize.toast('I am a toast!', 4000, delay=\"500\");\" /> Vider le panier</a>";
            echo "</td></tr>";

            echo "<tr><td colspan=\"6\">";
            //triggers modal de confirmation
            echo "<a class=\"waves-effect waves-light btn modal-trigger\" href=\"#modal1\">Valider ma commande<i class=\"large material-icons\">send</i></a>";
            //modal de confirmation
            echo "<div id=\"modal1\" class=\"modal\">
                  <div class=\"modal-content\">
                  <h4>Attention !</h4>
                  <p>Êtes-vous sûr de vouloir passer votre commande ??</p>
                  </div>
                  <div class=\"modal-footer\">
                  <a type=\" submit \" name=\"action\" href=\"index_client.php?action=ajoutCommande\" class=\"modal-action modal-close waves-effect waves-green btn-flat\">Oui</a>
                  <a href=\"#!\" class=\"modal-action modal-close waves-effect waves-red btn-flat \">Annuler</a>
                  </div>
                  </div>";
            echo "</td></tr>";
   }
}
?>
</table>  
</div>
<br><br><br><br><br>
