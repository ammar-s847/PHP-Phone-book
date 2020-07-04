<?php

if (isset($_POST['contact-submit'])) {
    include_once 'config.php';
    $name = mysqli_real_escape_string($conn, $_POST['contact-name']);
    $number = mysqli_real_escape_string($conn, $_POST['contact-number']);
    if (empty($name) || empty($number)) {
        header('Location: ../index.php?status=empty');
        exit();
    } else {
        $insertContact = "INSERT INTO `contacts` (contact_name, contact_number) VALUES ($name, $number)";
        if (mysqli_query($conn, $insertContact)) {
            header('Location: ../index.php?status=success');
            exit();
        } else {
            header('Location: ../index.php?status=error');
            exit();
        }
        /*$query = mysqli_query($conn, $insertContact);
        if ($query == true) {
            header('Location: ../index.php?status=success');
            exit();
        } elseif ($query == false) {
            header('Location: ../index.php?status=error');
            exit();
        }*/
    }
} else {
    header('Location: ../index.php');
    exit();
}

?>