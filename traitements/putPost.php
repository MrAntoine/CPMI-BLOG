<?php

FakeConnexion();

if (isset($_SESSION["id"])) {


//var_dump($_FILES);
    $imageUpload = false;
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUploadPost"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["writeMsgSubmit"])) {
        $check = getimagesize($_FILES["fileToUploadPost"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUploadPost"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUploadPost"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUploadPost"]["name"]) . " has been uploaded.";

            $imageUpload = true;


        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    if ($imageUpload == true) {

        $image = $_FILES["fileToUploadPost"]["name"];

    } else {
        $image = "default.jpg";
    }


    if (isset($_POST['content'], $_POST['title'], $_POST['writeMsgSubmit'])) {


        $sql = "INSERT INTO posts (title,content,owner_id,categorie_id, image_preview)VALUES(?,?,?,?,?)";
        $query = $pdo->prepare($sql);
        $query->execute(array($_POST['title'], $_POST['content'], $_SESSION['id'], $_POST['categorie_id'], $image));

        header("location:index.php?action=list");


    }

}else {
    ?>
    <section class="wrapper style3">

            <header class="align-center">
                <p><a href="index.php?action=login" class="alerte"> Vous devez être connecté !</a></p>
            </header>

    </section>

    <?php
}
?>

<!--
ok now() pour la date
-->
