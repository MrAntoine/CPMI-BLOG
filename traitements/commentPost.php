<?php

FakeConnexion();

if(isset($_SESSION["id"])) {


    $sql = "INSERT INTO comments (content,owner_id,post_id) VALUES(?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['commentMSG'], $_SESSION['id'], $_POST['idPost']));


    header("location:index.php?action=post&id=" . $_POST['idPost']);

}
?>
