<nav>
    <ul>
        <?php
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            ?>

            <?php
            if (isAdmin($userId)) {

                echo '<li><a class="navbar-link" href="/MecaChrysalide/backoffice/backoffice.php">Administration</a></li>';
            }
        }
        ?>

        <li id="current-time"></li>
        <li><a class="navbar-link" href="/MecaChrysalide/index.php">Home</a></li>
        <li><a class="navbar-link" href="/MecaChrysalide/apropos.php">A Propos</a></li>
        <li><a class="navbar-link" href="/MecaChrysalide/boutique.php">Boutique</a></li>
        <li><a class="navbar-link" href="/MecaChrysalide/events.php">Evènements</a></li>

        <?php if (!isConnected()) { ?>
            <li><a class="navbar-link" href="/MecaChrysalide/user/register.php">S'inscrire</a></li>
            <li><a class="navbar-link" href="/MecaChrysalide/user/login.php">Se connecter</a></li>
        <?php } else { ?>
            <li><a class="navbar-link" href="/MecaChrysalide/user/profil.php">Mon profil</a></li>
            <li><a class="navbar-link" href="/MecaChrysalide/user/logout.php">Se déconnecter</a></li>
        <?php } ?>

    </ul>
    <script src="/MecaChrysalide/js/currenttime.js"></script>
</nav>