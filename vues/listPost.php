<?php
FakeConnexion();

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$query = $pdo->prepare($sql);
$query->execute();
$resultats = $query->fetchAll(PDO::FETCH_ASSOC);

$ok = false;
if($_SESSION){
    $ok = true;
}

//print_r($resultats);

?>

<section id="one" class="wrapper style2">
    <div class="inner">
        <div class="grid-style">

            <?php
            foreach ($resultats as $row => $info) {

            $user = getUser($info['owner_id']);
            $categorie = getCategorie($info['categorie_id']);

            ?><div>
                <div class="box">
                    <div class="image fit">
                        <img src='uploads/<?= $info['image_preview'] ?> ' alt='Image de post' />
                    </div>
                    <div class="content">
                        <header class="align-center">
                            <p> Auteur : <a href="index.php?action=user&id=<?= $info['owner_id'] ?>"> <?= $user["username"] ?> </a></p>
                            <p> Catégorie : <a href="index.php?action=categorie&name=<?= $categorie["name"] ?>"> <?= $categorie["name"] ?> </a></p>
                            <h2><?= htmlspecialchars($info['title']) ?></h2>
                        </header>
                        <p><?=substr($info['content'],0,150);?></p>
                        <footer class="align-center">
                            <a href="index.php?action=post&id=<?= $info['id'] ?>" class="button alt">Lire Plus</a>
                        </footer>
                    </div>

                    <?php /*
                    if ($ok == true && $_SESSION["id"] == $info["owner_id"]) {
                        include("adminPost.php");
                    } */ ?>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section>
