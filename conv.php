<?php
    session_start();

    if (isset($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];
    }

    $current_lang = $_SESSION['lang'] ?? 'en';

    include "languages/$current_lang.php";

    
    include('views/header.php');
    include('views/form.php');
    include('views/nav.php');
    include('views/succes.php');
    include('views/footer.php');
    include('views/cb.php');
?>