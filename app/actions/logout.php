<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    session_start();
    session_unset();
    header("Location: /app/login.php");
    die();
?>