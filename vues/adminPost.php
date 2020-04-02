
<div class="adm-post">
<form method="post" action="index.php?action=update">
    <input type="hidden" name="idPost" value="<?= $info['id'] ?>">
    <input type="submit" value="Modifier le post">
</form>

<form method="post" action="index.php?action=delete">
    <input type="hidden" name="idPost" value="<?= $info['id'] ?>">
    <input type="submit" value="Supprimer le post">
</form>
</div>