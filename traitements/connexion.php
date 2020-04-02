
<?php

$sql = "SELECT * FROM users WHERE username=? AND password=PASSWORD(?)";

$query=$pdo->prepare($sql);
$query->execute(array($_POST['login'], $_POST['mdp']));
$line = $query->fetch();

if($line==false){
    header("Location: index.php?action=login");
} else {
    $_SESSION['id'] = $line['id'];
    $_SESSION['login'] = $line['login'];
    header("Location: index.php?action=list");

}

?>