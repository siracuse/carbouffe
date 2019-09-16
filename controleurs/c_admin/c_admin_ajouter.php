<?php
include ('modeles/m_admin/m_admin_ajout.php');
include('vues/v_admin/v_admin_ajout.php');

if (isset($_POST['submit_cat'])) {    
    ajout_cat();    
}

if (isset($_POST['submit_sous_cat'])) {    
    ajout_sous_cat();    
}

if (isset($_POST['submit_produits'])) {    
    ajout_produits();    
}

?>
