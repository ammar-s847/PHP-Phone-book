<?php

if (isset($_POST['contact-submit'])) {
    # include_once 'config.php';
    $DBServer = "localhost";
    $DBUsername = "root";
    $DBPassword = "password";
    $DBName = "phone-book";

    $conn = mysqli_connect($DBServer, $DBUsername, $DBPassword, $DBName);

    if (mysqli_connect_error()) {
        # die("Connection failed:" . mysqli_connect_error());
        header('Location: ../index.php?status=sqlerror');
        exit();
    }
    $name = mysqli_real_escape_string($conn, $_POST['contact-name']);
    $number = mysqli_real_escape_string($conn, $_POST['contact-number']);
    if (empty($name) || empty($number)) {
        header('Location: ../index.php?status=empty');
        exit();
    } else {
        $insertContact = "INSERT INTO contacts (contact_name, contact_number) VALUES ($name, $number)";
        if (mysqli_query($conn, $insertContact)) {
            header('Location: ../index.php?status=success');
            exit();
        } else {
            header('Location: ../index.php?status=error');
            exit();
        }
    }
} else {
    header('Location: ../index.php');
    exit();
}

?>