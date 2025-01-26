<?php
    session_start();

    $allowed_types = ["png", "jpg"];
    $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if(empty($_FILES['file']['name'])) {
        $_SESSION['error'] = "Загрузите файл.";
        header("Location: photo_gallery.php");
        exit;
        }

    if(!in_array($file_extension, $allowed_types)) {
        $_SESSION['error'] = "Можно загружать файлы только в формате: jpg, png";
        header("Location: photo_gallery.php");
        exit;
        }

    $filename = uniqid() . "." . $file_extension;

    move_uploaded_file($_FILES['file']['tmp_name'], "Gallery/" . $filename);
    $_SESSION['success'] = "Изображение загружено";

    header("Location: photo_gallery.php");
    exit;
?>

