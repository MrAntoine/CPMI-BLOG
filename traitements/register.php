<?php

if(isset($_POST['g-recaptcha-response'])) {

    $vide = $_POST['g-recaptcha-response'];

}else{
    $erreur = 1;
}


if($vide !== "") {
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $privateKey = "6LcdKeYUAAAAAIp6Q-HH_oL3vKXfgS-pZkcwUfNa";
    $response = file_get_contents($url."?secret=".$privateKey."&response=".$_POST['g-recaptcha-response']);
    $data = json_decode($response);
    if (isset($data->success) AND $data->success==true) {
        $error = 0;

    } else {
        $erreur = 1;
    }
}else {
    $erreur = 1;
}


if(isset($_POST["login"]) && isset($_POST['email']) && isset($_POST['mdp']) && $erreur == 0) {
    $sql = "INSERT INTO users(username,password,email) VALUES(?,PASSWORD(?),?)";

   // $avatar = "default-avatar.jpg";


    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['login'], $_POST['mdp'], $_POST['email']));
    /*$query ->execute(array(
        'login'=> $_POST['login'],
        'mdp' => $_POST['mdp'],
        'email' => $_POST['email'],
    ));*/
    //$line = $query->fetch();

    //session_start();
    $id = $pdo->lastInsertId();
    $_SESSION['id'] = $id;
    $_SESSION['login'] = $_POST['login'];
    header("Location: index.php?action=list");
}else {
    header("location:".  $_SERVER['HTTP_REFERER']); 
}

?>