<nav id="menu">
    <ul class="links">

        <li>
            <form method="POST" action="index.php?action=searchProfile">
                <input type="text" name="search_profile" placeholder="Rechercher">
                <input type="submit" name="" value="GO !" id="searchGo">
            </form>
        </li>

        <li><a href="index.php?action=AddPost">Ajouter un Poste</a></li>
        <li><a href="index.php?action=list">Les publications</a></li>
        <li><a href="index.php?action=user&id=<?= $_SESSION['id'] ?>">Mes publications</a></li>
        <?php
        if (isset($_SESSION['id'])) {
            echo "<li><a href='index.php?action=deconnexion'>Deconnexion</a></li>";
        } else {
            echo "<li><a href='index.php?action=login'>Connexion</a></li>";
        }
        ?>
    </ul>
</nav>





