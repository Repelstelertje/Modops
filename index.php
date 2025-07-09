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
    include('views/welcome.php');
    include('views/description.php');
    include('views/benefits.php');
    include('views/nutshell.php');
    include('views/earnings.php');
    include('views/apply.php');
    include('views/faq.php');
    include('views/footer.php');
?>
