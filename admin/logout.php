<?php
    unset($_SESSION['user']);

    if(!($_SESSION['user'])){
        header('location: login.php');
    }
?>