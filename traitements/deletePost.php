<?php

FakeConnexion();

if(isset($_SESSION["id"])) {


// Verifions si on est amis avec cette personne
    $sql = "SELECT owner_id FROM posts WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['idPost']));
    $line = $query->fetch();

    /*if($line == $_SESSION['id']){*/
    if ($_SESSION["id"] == $line["owner_id"]) {

        $sql2 = "DELETE FROM posts WHERE id=?";
        $query2 = $pdo->prepare($sql2);
        $query2->execute(array($_POST['idPost']));

        /*header("Location:index.php?action=mur");*/
        header("location:index.php?action=list");
        //header('Location: ' . $_SERVER['HTTP_REFERER'] );

    } else {
        echo "Vous n'avez pas écrit cette publication";
    }

}
?>