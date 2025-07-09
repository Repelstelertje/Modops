<?php
    session_start();

    $allowed = ['en', 'de', 'nl'];
    $current_lang = $_SESSION['lang'] ?? 'en';
    if (isset($_GET['lang']) && in_array($_GET['lang'], $allowed, true)) {
        $current_lang = $_GET['lang'];
        $_SESSION['lang'] = $current_lang;
    }
    include __DIR__ . "/languages/{$current_lang}.php";
    
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
