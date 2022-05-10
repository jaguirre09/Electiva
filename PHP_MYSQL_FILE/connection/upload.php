<?php
include "consultaSelect.php";

$file = new consultaSelect();
$target_dir = "../carga/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {

        echo "<script>alert('El archivo no es una imagen. '); location.href = '/'; </script>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<script>alert('El archivo ya existe.'); location.href = '/'; </script>";

    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script>alert('Tamaño de archivo mas grande al especificado.'); location.href = '/'; </script>";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "<script>alert('Solo se permiten archivos de extensión JPG, JPEG, PNG & GIF.'); location.href = '/'; </script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>alert('Ups! Hubo un error, tu archivo no ha sido cargado.'); location.href = '/'; </script>";


// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $nombres = $_FILES["fileToUpload"]["name"];
        $envio = $file->get_files_insert($nombres);

        echo "El archivo" . basename($_FILES["fileToUpload"]["name"]) . " fue cargado con exito :).";
        echo "<script>location.href = '/'; </script>";

    } else {
        echo "<script>alert('Ups! Hubo un error al momento de cargar tu archivo.'); location.href = '/'; </script>";
    }
}
?>