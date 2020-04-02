<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 28/11/2018
 * Time: 10:28
 */



function FakeConnexion (){
   //  $_SESSION["id"] = 56789;
    // $_SESSION["login"] = "gilles";
}


function getUser($id) {
    global $pdo;
    $sql = "select * from users where id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id));
    $user = $query->fetch();

    return $user;
}


function getCategorie($id) {
    global $pdo;
    $sql = "select * from categories where id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id));
    $categorie = $query->fetch();

    return $categorie;
}



function affichePost($id) {
    echo "
    
    
    
    
    ";
}



function creerPost($id) {
    // poster une publication
    echo "<div class='wrapper'>";
    echo " <div class='article margin'>";
    echo "<form method='POST' action='index.php?action=addPost' enctype='multipart/form-data'>";
    echo "<input type='text' name='titrepost' placeholder='Ecrivez votre titre' required>";
    echo "<input type='text' cols='40' rows='2' style='width:100%; height:50px;' name='Text1' id='Text1' value='' maxlength='150' class='margin' placeholder='Ecrivez votre post' required/>";
    echo "<input type='hidden' name='idAmi' value='$id'>";
    echo "<input type='file' name='fileToUploadPost'>";
    echo "<input type='submit' name='writeMsgSubmit' value='Publier' class='postMsg' ></form>";
    echo "</div><br/>";
}


function CheckString ($text){
    $text = htmlspecialchars(trim($text), ENT_QUOTES);
    if (1 === get_magic_quotes_gpc())
    {
        $text = stripslashes($text);
    }
    /*$text = nl2br($text);*/
    return $text;
}




?>