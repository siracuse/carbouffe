<?php
include ('modeles/m_admin/m_admin_modifier_produit.php');
include('vues/v_admin/v_admin_modifier_produitChoix.php');

if (isset($_POST['submit_choix_produit'])) 
{   
    echo '<br> <br>';
    include('vues/v_admin/v_admin_modifier_produit.php');
}
if (isset($_POST['submit']))
{
    produit_modifier();
}

?>