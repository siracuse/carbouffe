<?php

/**
 * Verifie si le panier existe, le créé sinon
 * @return booleen
 */
function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['imgProduit'] = array();
      $_SESSION['panier']['n_prod'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}


/**
 * Ajoute un article dans le panier
 * @param string $libelleProduit
 * @param int $qteProduit
 * @param float $prixProduit
 * @param varchar $imgProduit
 * @param varchar $n_prod
 * @return void
 */
function ajouterArticle($libelleProduit,$qteProduit,$prixProduit,$imgProduit,$n_prod){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
         array_push( $_SESSION['panier']['imgProduit'],$imgProduit);
         array_push( $_SESSION['panier']['n_prod'],$n_prod);
        
         //header("location:".  $_SERVER['HTTP_REFERER']); 
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



/**
 * Modifie la quantité d'un article
 * @param $libelleProduit
 * @param $qteProduit
 * @return void
 */
function modifierQTeArticle($libelleProduit,$qteProduit){
   //Si le panier éxiste
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($libelleProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Supprime un article du panier
 * @param $libelleProduit
 * @return unknown_type
 */
function supprimerArticle($libelleProduit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['libelleProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['imgProduit'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
      {
         if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
         {
            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
            array_push( $tmp['imgProduit'],$_SESSION['panier']['imgProduit'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/**
 * Montant total du panier
 * @return int
 */
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}


/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier(){
   unset($_SESSION['panier']);
}

/**
 * Permet de savoir si le panier est verrouillé
 * @return booleen
 */
function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}

/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['libelleProduit']);
   else
   return 0;
}




function n_commande()   //Recupere le n°commande du client où panier_commande vaut 0
{
   global $bdd;

   $n_client = $_SESSION['n_client'];

   $req = $bdd->query('SELECT n_commande FROM commandes 
                WHERE panier_commande = 0 AND n_client = '.$n_client);
   
   $donnees = $req->fetch();
   $var = intval ($donnees['n_commande']);
   return $var;
   $req->closeCursor();
}

function insert_commande()
{
   //Insertion des données dans la table commandes avec panier_commande = 0
   //panier_commande avec 0 pour une commande
   global $bdd;
   
   $montant_commande = MontantGlobal();
   $date_commande = date('Y-m-d H:i:s');
   $panier_commande = '0';
   $n_client = $_SESSION['n_client'];

   $req = $bdd->prepare ('INSERT INTO commandes(montant_commande, date_commande, panier_commande, n_client)
      VALUES(:montant_commande, :date_commande, :panier_commande, :n_client) ');
   $req->execute(array(
      'montant_commande' => $montant_commande,
      'date_commande' => $date_commande,
      'panier_commande' => $panier_commande,
      'n_client' => $n_client
   ));
   $req->closeCursor();

   //Insertion des données dans la table composer 
   $nbarticles=count($_SESSION['panier']['libelleProduit']);
   
   for ($i=0; $i < $nbarticles; $i++) { 
      $qte_prod = $_SESSION['panier']['qteProduit'][$i];
      $n_commande = n_commande();
      $n_prod = $_SESSION['panier']['n_prod'][$i];

      $req2 = $bdd->prepare ('INSERT INTO composer(qte_prod, n_commande, n_prod)
                     VALUES(:qte_prod, :n_commande, :n_prod) ');
      $req2->execute(array(
         'qte_prod' => $qte_prod,
         'n_commande' => $n_commande,
         'n_prod' => $n_prod     
      ));
      $req2->closeCursor();
   }
   supprimePanier();
}
?>