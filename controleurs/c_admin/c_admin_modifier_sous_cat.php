<?php
include ('modeles/m_admin/m_admin_modifier_sous_cat.php');
include('vues/v_admin/v_admin_modifier_sous_catChoix.php');

if (isset($_POST['submit_choix_sous_cat'])) 
{   
    echo '<br> <br>';
    include('vues/v_admin/v_admin_modifier_sous_cat.php');
}
if (isset($_POST['submit']))
{
    sous_cat_modifier();
}

?>