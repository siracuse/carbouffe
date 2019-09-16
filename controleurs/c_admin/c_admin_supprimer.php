<?php
include ('modeles/m_admin/m_admin_supprimer.php');
include('vues/v_admin/v_admin_supprimer.php');

if (isset($_POST['submit_cat'])) {    
    sup_cat_photo();  
    sup_cat();  
}

if (isset($_POST['submit_sous_cat'])) {    
    sup_sous_cat_photo();  
    sup_sous_cat();  
}

if (isset($_POST['submit_prod'])) {    
    sup_prod_photo();  
    sup_prod();  
}
?>
