<?php
include ('modeles/m_admin/m_admin_modifier_cat.php');
include('vues/v_admin/v_admin_modifier_catChoix.php');

if (isset($_POST['submit_choix_cat'])) 
{   
    echo '<br> <br>';
    include('vues/v_admin/v_admin_modifier_cat.php');
}
if (isset($_POST['submit']))
{
    cat_modifier();
}

?>