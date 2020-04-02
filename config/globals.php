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

function CheckCaptcha($userResponse) {
    $fields_string = '';
    $fields = array(
        'secret' => '6LcdKeYUAAAAAIp6Q-HH_oL3vKXfgS-pZkcwUfNa',
        'response' => $userResponse
    );
    foreach($fields as $key=>$value)
    $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $res = curl_exec($ch);
    curl_close($ch);

    return json_decode($res, true);
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