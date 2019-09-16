<?php
//Connexion BDD
try
{
	$bdd = new PDO('mysql:host=mysql-siracuseharichandra.alwaysdata.net;dbname=siracuseharichandra_carbouffe;charset=utf8', '155686', 'wvkajk75a097');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>