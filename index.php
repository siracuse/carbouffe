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
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link type="text/css" rel="stylesheet" href="materialize/css/mycss.css"/>
	<title>Carbouffe</title>
	<link rel="icon" type="image/png" href="images/favicon.png" />
</head>

<body>

	<!-- BOUTON NAV -->
	<nav class="nav-extended" style="background-color: #252525;">
		<div class="nav-wrapper">
			<a href="index.php?page=c_accueil" class="brand-logo center"> <img src="images/carbouffe.png" width="70%" ></a>
			<a href="index.php?page=c_accueil" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul id="nav-mobile" class="left hide-on-med-and-down">
				<li><a href="index.php?page=c_accueil"><i style="margin-right: 5px;" class="material-icons left">home</i>Accueil</a></li>
			</ul>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="index.php?page=c_login" target="_blanck"><i style="margin-right: 5px;" class="material-icons left">perm_identity</i>Espace client</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="index.php?page=c_accueil">Accueil</a></li>
				<li><a href="index.php?page=c_login">Escpace client</a></li>
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
						url:"search/search.php",  
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

	<section>
		<?php
		//Connexion base de donnees
		include ('modeles/m_connexionBDD.php');

		//On inclut le fichier s'il existe et s'il est spécifié
		if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php'))
		{
			include ('controleurs/'.$_GET['page'].'.php');
		}
		else
		{
			include ('controleurs/'.'c_accueil.php');
		}
		?>
	</section>
	
	<!-- Pied de page -->
	<footer class="page-footer" style="background-color: #252525;">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Description sur Carbouffe</h5>
					<p class="grey-text text-lighten-4">Carbouffe c'est de la bouffe pour pas cher.</p>
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
					<a href="index.php?page=c_mentions"> Mentions légales </a> |
					<a href="index.php?page=c_cgv"> CGV</a>
				</div>
			</div>
		</div>
	</div>
</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="materialize/js/touchSwipe.min.js"></script>
<script type="text/javascript" src="materialize/js/easing.js"></script>
<script type="text/javascript" src="materialize/js/foundation.min.js"></script>
<script type="text/javascript" src="materialize/js/foundation/foundation.topbar.js"></script>
<script type="text/javascript" src="materialize/js/carouFredSel.js"></script>
<script type="text/javascript" src="materialize/js/scrollTo.js"></script>
<script type="text/javascript" src="materialize/js/map.js"></script>
<script type="text/javascript" src="materialize/js/main.js"></script>
<script type="text/javascript" src="materialize/js/ac_prod.js"></script>

<script>
	$(document).ready(function(){
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
		// $('.filter[filter-item="'+value+'"]').removeClass('hidden');
		// $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
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
			$('ul.tabs').tabs('select_tab', 'tab_id');
			$('ul.tabs').tabs();
			Materialize.updateTextFields();
			$('select').material_select();
		});
	</script>
</body>
</html>