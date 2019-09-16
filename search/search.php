 <?php  

 $connect = mysqli_connect("mysql-siracuseharichandra.alwaysdata.net", "155686", "wvkajk75a097", "siracuseharichandra_carbouffe");
 if(isset($_POST["query"]))  
 {  
 	$output = '';  
 	$query = "SELECT * FROM produits WHERE nom_prod LIKE '%".$_POST["query"]."%'";  
 	$result = mysqli_query($connect, $query);  
 	$output = '<ul class="list-unstyled">';  
 	if(mysqli_num_rows($result) > 0)  
 	{  
 		while($row = mysqli_fetch_array($result))  
 		{  
 			$output .= '<li>'.$row["nom_prod"].'</li>';  
 		}  
 	}  
 	else  
 	{  
 		$output .= '<li>Produits introuvable</li>';  
 	}  
 	$output .= '</ul>';  
 	echo $output;  
 }  

 if (isset($_POST["produit"]))
 {

 	$produit = $_POST["produit"];

//Connexion BDD
 	try
 	{
 		$bdd = new PDO('mysql:host=mysql-siracuseharichandra.alwaysdata.net;dbname=siracuseharichandra_carbouffe;charset=utf8', '155686', 'wvkajk75a097');
 	}
 	catch (Exception $e)
 	{
 		die('Erreur : ' . $e->getMessage());
 	}


 	$req = $bdd->query("SELECT * FROM produits where nom_prod ='".$_POST["produit"]."'");
 	$donnees = $req->fetch();


 	if ($donnees['n_prod'] =="")
 	{
 		header('Location:../index.php?page=c_accueil');
 	}
 	else 
 	{
 		header('Location:../index.php?page=c_ficheproduits&id='.$donnees['n_prod'].'');
 	}



 }
 ?> 