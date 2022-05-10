<?php
require "connection/consultaSelect.php";
$File = new consultaSelect();
$valor = $File->get_files();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<header class="header">
    <div class="logo">T5S</div>
    <div class="recargar">
        <button type="button" onclick="window.location.reload()" class="btn">Refresh</button>
    </div>
</header>

<form action="connection/upload.php" method="post" enctype="multipart/form-data" class="stil">
    Seleccione archivo a cargar
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<div class="structure">
<?php
foreach ($valor as $items) {
    ?>
    <div class="img">
        <img src="carga/<?= $items['nombre'] ?>" alt="" class="img1">
    </div>
    <?php
}
?>
</div>

</body>
</html>
