<?php


$sql = "SELECT * FROM posts WHERE id=?";
$query = $pdo->prepare($sql);
$query->execute(array($_POST['idPost']));
$info = $query->fetch();

$sql2 = "SELECT * FROM categories";
$query2 = $pdo->prepare($sql2);
$query2->execute();
$categories = $query2->fetchAll(PDO::FETCH_ASSOC);


?>


<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <h2>Modifier un post</h2>
                </header>


                <?php
                if ($info && $info['owner_id'] == $_SESSION['id']) {

                ?>

                <form method='POST' action='index.php?action=updatePost' enctype='multipart/form-data'>

                    <input type='hidden' name='idPost' value="<?= $info["id"] ?>">
                    <label for="title">Titre :</label>
                    <input type='text' name='title' placeholder='Ecrivez votre titre' value="<?= $info['title'] ?>"
                           required>

                    <input type='hidden' name='owner_id' value='<?= $_SESSION["id"] ?>'>
                    <label for="categorie_id">Catégorie :</label>
                    <select name="categorie_id">
                        <?php
                        foreach ($categories as $line) {

                            echo "<option name='categorie_id' value='" . $line['id'] . "'>" . $line['name'] . "</option>";
                        } ?>
                    </select>
                    <label for="content">Contenu :</label>
                    <textarea type='text' cols='40' rows='2' name='content' id='content'
                              placeholder='Ecrivez votre post' required/><?= $info['content'] ?></textarea>

                    <input type='hidden' name='old_image' value='<?= $info['image_preview'] ?>'>
                    <label for="fileToUploadPost">Image :</label>
                    <input type='file' name='fileToUploadPost'>

                    <input type='submit' value='Publier' name="writeMsgSubmit" class='postMsg' style="float: right">
                </form>
            </div>
        </div>
    </div>

    <?php } else { ?>
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <h2>Aucun post</h2>
                </header>
            </div>
        </div>
    <?php } ?>

</section>