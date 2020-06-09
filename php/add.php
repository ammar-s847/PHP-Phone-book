<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (isset($_POST['contact-submit'])) {
    include_once 'config.php';
    $name = mysqli_real_escape_string($_POST['contact-name']);
    $number = mysqli_real_escape_string($_POST['contact-number']);
    if empty($name) || empty($number) {
        header('Location: ../index.php?status=empty');
        exit();
    } else {
        $insertContact = "INSERT INTO contacts (contact_name, contact_number) VALUES ($name, $number)";
        if (mysqli_query($insertContact)) {
            header('Location: ../index.php?status=success');
            exit();
        } else {
            header('Location: ../index.php?status=error');
            exit();
        }
    }
}

?>