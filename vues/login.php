





<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">


        <div class="box">
            <div class="content">
                <header class="align-center">
                    <h2>Se connecter</h2>
                </header>

                <form action="index.php?action=connexion" method="POST">
                    <label for="login">Username :</label>
                    <input type="text" placeholder="Login" name="login" required>
                    <label for="mdp">Password :</label>
                    <input type="password" placeholder="Password" name="mdp" required>
                    <input type="submit" value="Se connecter" style="float: right">
                </form>

            </div>
        </div>

        <div class="box">
            <div class="content">
                <header class="align-center">
                    <h2>S'enregistrer</h2>
                </header>

                <form method="post" action="index.php?action=register" name="creation">
                    <label for="login">Username :</label>
                    <input type="text" required name="login" placeholder="Entrez votre nom">
                    <label for="email">Email :</label>
                    <input type="email" required name="email" placeholder="Entrez votre adresse e-mail">
                    <label for="mdp">Password :</label>
                    <input type="password" required name="mdp" placeholder="Entrez votre mot de passe">
                    <label for="mdp-confirm">Confirm Password :</label>
                    <input type="password" required name="mdp-confirm" placeholder="Confirmez votre mot de passe">
                    <input type="submit" name="send" value="S'enregistrer" style="float: right">
                </form>

            </div>
        </div>


    </div>

</section>