<?php
session_start();
if (isset($_SESSION['login_client']) AND isset($_SESSION['mdp_client'])) {
//panier ------------------------------
	//Connexion base de donnees
	include ('modeles/m_connexionBDD.php');
	//Modele panier
	include ('modeles/m_client/m_client_panier.php');
	creationPanier();
	$erreur = false;

	$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
	if($action !== null)
	{
		if(!in_array($action,array('ajout', 'suppression', 'refresh', 'ajoutCommande', 'suppressionAll')))
			$erreur=true;

   //récuperation des variables en POST ou GET
		$l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
		$p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
		$q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
		$img = (isset($_POST['img'])? $_POST['img']:  (isset($_GET['img'])? $_GET['img']:null )) ;
		$id = (isset($_POST['id'])? $_POST['id']:  (isset($_GET['id'])? $_GET['id']:null )) ;

   //Suppression des espaces verticaux
		$l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
		$p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier

		if (is_array($q)){
			$QteArticle = array();
			$i=0;
			foreach ($q as $contenu){
				$QteArticle[$i++] = intval($contenu);
			}
		}
		else
			$q = intval($q);

	}

	if (!$erreur){
		switch($action){
			Case "ajout":
			ajouterArticle($l,$q,$p,$img,$id);
			//header("location:".  $_SERVER['HTTP_REFERER']);	
			?> 
			<script> 
				alert('Votre produit a été ajouté au panier');
				javascript:history.back()
			</script> 
			<?php   
			break;

			Case "suppression":
			supprimerArticle($l);
			header("location:".  $_SERVER['HTTP_REFERER']);
			break;

			Case "refresh" :
			for ($i = 0 ; $i < count($QteArticle) ; $i++)
			{
				modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
			}
			break;

			Case "ajoutCommande":				
			insert_commande();
			header("location:".  $_SERVER['HTTP_REFERER']);		
			break;

			Case "suppressionAll":
			supprimePanier();
			header("location:".  $_SERVER['HTTP_REFERER']);		
			break;

			Default:
			break;
		}
	}



	?>

	<!DOCTYPE html>
	<html>

	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="stylesheet" href="materialize/css/foundation.min.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
		<link type="text/css" rel="stylesheet" href="materialize/css/mycss.css"/>
		<title>Carbouffe-Client</title>
		<link rel="icon" type="image/png" href="images/favicon.png" />
	</head>

	<body>

		<!-- Drop Down -->
		<ul id="dropdown1" class="dropdown-content">
			<li><a href="index_client.php?page=c_client_profil"><i class="material-icons left">face</i>Profil</a></li>
			<li class="divider"></li>
			<li><a href="index_client.php?page=c_client_deco"><i class="material-icons left">power_settings_new</i>Quitter</a></li>
		</ul>
		<ul id="dropdownMobile" class="dropdown-content">
			<li><a href="index_client.php?page=c_client_profil">Profil</a></li>
			<li class="divider"></li>
			<li><a href="index_client.php?page=c_client_deco">Déconnexion</a></li>
		</ul>
		<!-- BOUTON NAV -->
		<nav class="nav-extended" style="background-color: #252525;">
			<div class="nav-wrapper">
				<a href="index_client.php?page=c_client_accueil" class="brand-logo center"> <img src="images/carbouffe.png" width="70%" ></a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<!--Menu Droit -->
				<ul id="nav-mobile" class="right hide-on-med-and-down">					
					<li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i style="margin-right: 5px;" class="material-icons left">settings</i>Paramètre<i class="material-icons right">arrow_drop_down</i></a></li>
				</ul>
				<!-- Menu gauche -->
				<ul id="nav-mobile" class="left hide-on-med-and-down">					
					<li><a href="index_client.php?page=c_client_accueil"><i class="material-icons left">home</i>Accueil</a></li>
					<li><a href="index_client.php?page=c_client_panier"><i style="margin-right: 5px;" class="material-icons left">shopping_cart</i>Mon Panier</a></li>
					<li><a href="index_client.php?page=c_client_commande"><i style="margin-right: 5px;" class="material-icons left">shopping_basket</i>Ma commande</a></li>
				</ul>
				<!--Menu Mobile -->
				<ul class="side-nav" id="mobile-demo">
					<li><a href="index_client.php?page=c_client_accueil">Accueil</a></li>
					<li><a href="index_client.php?page=c_client_panier">Mon Panier</a></li>
					<li><a href="index_client.php?page=c_client_commande">Mes commandes</a></li>					
					<li><a class="dropdown-button" href="#!" data-activates="dropdownMobile"><i style="margin-right: 5px;" class="material-icons left">settings</i>Paramètre<i class="material-icons right">arrow_drop_down</i></a></li>
				</ul>
			</div>
		</nav>


		<!-- AJAX TEST -->
		<script>  
			$(document).ready(function(){  
				$('#produit').keyup(function(){  
					var query = $(this).val();  
					if(query != '')  
					{  
						$.ajax({  
							url:"search/searchclient.php",  
							method:"POST",  
							data:{query:query},  
							success:function(data)  
							{  
								$('#produitList').fadeIn();  
								$('#produitList').html(data);  
							}  
						});  
					}  
				});  
				$(document).on('click', 'li', function(){  
					$('#produit').val($(this).text());  
					$('#produitList').fadeOut();  
				});  
			});  
		</script>  
		<!-- -->
		
		<div id="test1" class="col s12">
			<section>
				<?php


		//On inclut le fichier s'il existe et s'il est spécifié
				if (!empty($_GET['page']) && is_file('controleurs/c_client/'.$_GET['page'].'.php'))
				{
					include ('controleurs/c_client/'.$_GET['page'].'.php');
				}
				else
				{
					include ('controleurs/c_client/c_client_accueil.php');
				}
				?>
			</section>


			<script type="text/javascript" src="materialize/js/touchSwipe.min.js"></script>
			<script type="text/javascript" src="materialize/js/easing.js"></script>
			<script type="text/javascript" src="materialize/js/foundation.min.js"></script>
			<script type="text/javascript" src="materialize/js/foundation/foundation.topbar.js"></script>
			<script type="text/javascript" src="materialize/js/carouFredSel.js"></script>
			<script type="text/javascript" src="materialize/js/scrollTo.js"></script>
			<script type="text/javascript" src="materialize/js/map.js"></script>
			<script type="text/javascript" src="materialize/js/main.js"></script>
			<script src="materialize/js/nouislider.min.js"></script>
			<script>
				$(document).ready(function(){
					$('.modal').modal();
			//Trieur
			$(".filter-button").click(function(){
				var value = $(this).attr('data-filter');

				if(value == "all")
				{
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
$(".filter").not('.'+value).hide('3000');
$('.filter').filter('.'+value).show('3000');

}
});

			if ($(".filter-button").removeClass("active")) {
				$(this).removeClass("active");
			}
			$(this).addClass("active");




			$('.parallax').parallax();
			$(".dropdown-button").dropdown();
			$('.button-collapse').sideNav();
			$('.carousel').carousel();
			$('.fixed-action-btn').openFAB();
			$('.fixed-action-btn').closeFAB();
			$('.fixed-action-btn.toolbar').openToolbar();
			$('.fixed-action-btn.toolbar').closeToolbar();
			$('select').material_select();
			$('select').material_select('destroy');
			$('.modal').modal();
		});
	</script>

	<script>
		$(document).ready(function(){
			$('.modal').modal();
			$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true, // Choose whether you can drag to open on touch screens,
      onOpen: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is opened
      onClose: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is closed
  });
			 // Show sideNav
			 $('.button-collapse').sideNav('show');
  // Hide sideNav
  $('.button-collapse').sideNav('hide');
  // Destroy sideNav
  $('.button-collapse').sideNav('destroy');
  
});
</script>




</body>

<footer class="page-footer" style="background-color: #252525;">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Description sur Carbouffe</h5>
				<p class="grey-text text-lighten-4">Carbouffe c'est la bouffe pour pas cher.</p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Informations utiles</h5>
				<ul>
					<li><a class="grey-text text-lighten-3" href="#!"></a><i class="material-icons">place</i>&nbsp;&nbsp; 18 allée de la bouffe, St Denis</li>
					<li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons">mail_outline</i>&nbsp;&nbsp; carbouffe@gmail.com</a></li>
					<li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons">settings_phone</i>&nbsp;&nbsp; 06 92 06 06 06</a></li>

				</ul>
			</div>
		</div>
	</div>
	<iframe width="100%" height="300px" frameBorder="0" 
	src="http://umap.openstreetmap.fr/fr/map/carte-sans-nom_181123?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false%22%3E">
</iframe>
<div class="footer-copyright grey darken-3">
	<div class="container center-align">
		<div class="row">
			<div class="col m8">
				2017 Site web de GAUTIER Romain, CONTINI Thomas et SIRACUSE Harichandra
			</div>
			<div class="col m4">
				<a href="index_client.php?page=c_client_mentions"> Mentions légales </a> |
				<a href="index_client.php?page=c_client_cgv"> CGV</a>
			</div>
		</div>
	</div>
</div>
</footer>


</html>
<?php
}
else {
	echo "<center>"."Erreur"."<br />"."Veuillez vous authentifier"."</center>";
}
?>