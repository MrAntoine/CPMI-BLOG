<?php
FakeConnexion();
$owner_id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE owner_id=? ORDER BY created_at DESC";
$query = $pdo->prepare($sql);
$query->execute(array($owner_id));
$resultats = $query->fetchAll(PDO::FETCH_ASSOC);

$ok = false;
if ($_SESSION) {
    $ok = true;
}

//print_r($resultats);

?>


<div id="main" class="container">
    <h2>Mes Posts</h2>
    <div class="table-wrapper">

    <?php if($resultats == true){ ?>

        <table class="alt">
            <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Extrait</th>
                <th>Date de création</th>


                <?php if($ok == true){ ?>
                <th>Modifier</th>
                <th>Supprimer</th>
                <?php } ?>
                
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($resultats as $row => $info) {
                $user = getUser($info['owner_id']);
                $categorie = getCategorie($info['categorie_id']);
                ?>

                <tr>
                    <td> <img src='uploads/<?= $info['image_preview'] ?> ' alt='Image de post' class="miniature"/></td>
                    <td><a class="article"
                           href="index.php?action=post&id=<?= $info['id'] ?>"><?= htmlspecialchars($info['title']) ?></a>
                    </td>
                    <td>
                        <a href="index.php?action=categorie&name=<?= $categorie["name"] ?>"> <?= $categorie["name"] ?> </a>
                    </td>

                    <td> <p><?=substr($info['content'],0,50);?> </p></td>

                    <td> <p><?= $info['created_at'];?> </p></td>

                    <?php
                    if ($ok == true && $_SESSION["id"] == $info["owner_id"]) {
                        ?>
                        <td>
                            <form method="post" action="index.php?action=update">
                                <input type="hidden" name="idPost" value="<?= $info['id'] ?>">
                                <input type="submit" value="Modifier le post">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="index.php?action=delete">
                                <input type="hidden" name="idPost" value="<?= $info['id'] ?>">
                                <input type="submit" value="Supprimer le post">
                            </form>
                        </td>

                    <?php } ?>

                </tr>

            <?php } ?>

            </tbody>


        </table>

    <?php }else{ ?>

        <p>Vous n'avez aucune publications</p>

   <?php } ?>
    </div>
</div>


