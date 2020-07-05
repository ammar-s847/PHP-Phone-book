<?php

if (isset($_POST['contact-submit'])) {
    include 'config.php';
    $name = mysqli_real_escape_string($conn, $_POST['contact-name']);
    $number = mysqli_real_escape_string($conn, $_POST['contact-number']);
    if (empty($name) || empty($number)) {
        header('Location: ../index.php?status=empty');
        exit();
    } else {
        $uniqueId = uniqid();
        $insertContact = "INSERT INTO contacts (id, contact_name, contact_number) VALUES ('$uniqueId', '$name', '$number')";
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