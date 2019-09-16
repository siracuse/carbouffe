<?php
function deco() 
{
	session_destroy();
	header ('Location: index.php?page=c_accueil');
}
?>
