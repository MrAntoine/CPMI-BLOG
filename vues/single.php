<?php
FakeConnexion();
$post_id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id=?";
$query = $pdo->prepare($sql);
$query->execute(array($post_id));
$info = $query->fetch();

$user = getUser($info['owner_id']);
$categorie = getCategorie($info['categorie_id']);


$ok = false;
if ($_SESSION) {
    $ok = true;
}
//print_r($resultats);

?>

<!-- One -->
<section id="One" class="wrapper style3" style="background-image: url('uploads/<?= $info['image_preview'] ?>')">
    <div class="inner">
        <header class="align-center">
            <p><a href="index.php?action=user&id=<?= $info['owner_id'] ?>"> <?= $user["username"] ?> </a></p>
            <h2><?= $info['title'] ?></h2>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">

                    <p>
                        <a href="index.php?action=categorie&name=<?= $categorie["name"] ?>"> <?= $categorie["name"] ?> </a>
                    </p>
                    <h2><?= $info['title'] ?></h2>
                </header>
                <p><?= $info['content'] ?></p>
            </div>
        </div>
    </div>

    <?php
    if ($ok == true && $_SESSION["id"] == $info["owner_id"]) {
        include("adminPost.php");
    } ?>

</section>


<section class="wrapper">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <p>Laisse un commentaire</p>
                </header>

                <?php if (isset($_SESSION['id'])) { ?>
                    <form method='POST' action='index.php?action=comment'>
                        <label for="commentMSG">Commentaire : </label>
                        <textarea name="commentMSG" placeholder="Ecris ton commentaire"></textarea>
                        <input type="hidden" value="<?= $_GET['id'] ?>" name="idPost">
                        <input type='submit' name='comment' value='Commenter' class='postMsg'>

                    </form>
                <?php } else { ?>
                    <p class="align-center">Vous devez être connecté pour poster un commentaire </p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php
$sql2 = "SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC";
$query2 = $pdo->prepare($sql2);
$query2->execute(array($post_id));
$commentaires = $query2->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="wrapper style2">
    <div class="inner">


        <?php
        foreach ($commentaires as $commentaire) {

            //var_dump($commentaire);

            $user = getUser($commentaire['owner_id']);

            ?>
            <div class="box">
                <div class="content">
                    <div>

                        <span>De : <?= $user['username'] ?> </span><span
                                style="float: right">Le : <?= $commentaire['created_at'] ?></span>

                        <p style="color: #444444; padding: 10px;"><?= $commentaire['content'] ?></p>

                    </div>
                </div>
            </div>
        <?php } ?>


    </div>
</section>
