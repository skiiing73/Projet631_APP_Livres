<div class="nav">
    <div class="logo">
        <span class="stars">★</span>
        <span class="name">SuperLivres</span>
        <span class="stars">★</span>
    </div>

    <div class="links">
        <a href="./livres.php?pages=welcome" class="nav-link">Accueil</a>
        <a href="./livres.php?pages=books" class="nav-link">Nos livres</a>
        <a href="./livres.php?pages=welcome" class="nav-link">Contact</a>
    </div>

    <div id="login_signin">
        <?php
        if ($_SESSION["id_user"] == "") {
        ?>
            <a href="./livres.php?pages=login" class="nav-link" id="login">Connexion</a>
            <a href="./livres.php?pages=register" class="nav-link" id="signin">Creé mon compte</a>
        <?php
        } else {
        ?>
            <a href="./livres.php?pages=profile" class="nav-link" id="login">Profil</a>
            <a href="./livres.php?pages=disconnect" class="nav-link" id="signin">Deconnexion</a>
        <?php
        }
        ?>
    </div>
</div>