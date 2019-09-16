<?php 
session_start();
if (isset($_SESSION['login_admin']) AND isset($_SESSION['mdp_admin'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset = "utf-8" />  <!-- caractère spéciaux -->
		<title>Carbouffe_admin</title>  <!-- titre du site -->
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
		<title>Carbouffe-Admin</title>
		<link rel="icon" type="image/png" href="images/favicon.png" />
	</head>

	<body>	


		<!-- Corps de page -->
		<section>
			<?php
			//Connexion base de donnees
			include ('modeles/m_connexionBDD.php');

			//On inclut le fichier s'il existe et s'il est spécifié
			if (!empty($_GET['page']) && is_file('controleurs/c_admin/'.$_GET['page'].'.php'))
			{
				include ('controleurs/c_admin/'.$_GET['page'].'.php');
			}
			else
			{
				include ('controleurs/c_admin/c_admin_accueil.php');
			}
			?>
		</section>

		
		<!-- boutton flottant -->
		<div class="fixed-action-btn toolbar">
			<a class="btn-floating btn-large red"><i class="large material-icons">menu</i></a>
			<ul>
				<li class="waves-effect waves-light"><a href="index_admin.php?page=c_admin_accueil"><i class="material-icons">home</i></a></li>
				<li class="waves-effect waves-light"><a href="index_admin.php?page=c_admin_deco"><i class="material-icons">power_settings_new</i></a></li>
			</ul>
		</div>
		


		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="materialize/js/touchSwipe.min.js"></script>
		<script type="text/javascript" src="materialize/js/easing.js"></script>
		<script type="text/javascript" src="materialize/js/foundation.min.js"></script>
		<script type="text/javascript" src="materialize/js/foundation/foundation.topbar.js"></script>
		<script type="text/javascript" src="materialize/js/carouFredSel.js"></script>
		<script type="text/javascript" src="materialize/js/scrollTo.js"></script>
		<script type="text/javascript" src="materialize/js/map.js"></script>
		<script type="text/javascript" src="materialize/js/main.js"></script>


	<script>
		$(document).ready(function(){
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

<?php
}
else {
	echo "<center>"."Erreur"."<br />"."Veuillez vous authentifier"."</center>";
	echo $_SESSION['login_admin'];
	
}