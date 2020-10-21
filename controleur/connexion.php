<?php
    session_start();
    if(isset($_SESSION['pseudo'])){
        header('location: ../vue/prive/table_billet.php');
    }
    else
    {
        include('infoAdmin.php');
    }
?>