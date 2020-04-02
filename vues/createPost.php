<?php

$sql = "SELECT * FROM categories";
$query = $pdo->prepare($sql);
$query->execute();
$resultats = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <h2>Créer un post</h2>
                </header>


                <form method='POST' action='index.php?action=putPost' enctype='multipart/form-data'>
                    <label for="title">Titre :</label>
                    <input type='text' name='title' placeholder='Ecrivez votre titre' required>
                    <label for="categorie_id">Catégorie :</label>
                    <select name="categorie_id">
                        <?php
                        foreach ($resultats as $row => $line) {

                            echo "<option name='categorie_id' value='" . $line['id'] . "'>" . $line['name'] . "</option>";
                        } ?>
                    </select>
                    <label for="content">Contenu :</label>
                    <textarea type='text' cols='40' rows='2' name='content' id='content' value='' class='margin'
                              placeholder='Ecrivez votre post' required/></textarea>
                    <input type='hidden' name='owner_id' value='<?php $_SESSION["id"] ?>'>
                    <label for="fileToUploadPost">Image :</label>
                    <input type='file' name='fileToUploadPost'>
                    <input type='submit' name='writeMsgSubmit' value='Publier' class='postMsg' style="float: right"></form>

            </div>
        </div>
    </div>

</section>