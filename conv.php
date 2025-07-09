<?php
    session_start();

    $allowed = ['en', 'de', 'nl'];
    $current_lang = $_SESSION['lang'] ?? 'en';
    if (isset($_GET['lang']) && in_array($_GET['lang'], $allowed, true)) {
        $current_lang = $_GET['lang'];
    }
    include __DIR__ . "/languages/{$current_lang}.php";

    
    include('views/header.php');
    include('views/form.php');
    include('views/nav.php');
    include('views/succes.php');
    include('views/footer.php');
    include('views/cb.php');?>