<nav>
    <ul>
        <?php if (isset($_SESSION['loggedUser'])) : ?>
        <li><a href="./">Catalogue</a></li>
        <li><a href="index.php?action=membres">Membres</a></li>
        <li><a href="/index.php?action=logout" class="selectedLink">Déconnexion</a></li>
        <?php endif ?>
    </ul>
</nav>