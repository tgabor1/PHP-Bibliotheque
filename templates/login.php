<?php $title = "Membres"; ?>

<?php ob_start(); ?>

<h1>Connexion</h1>

<div class="pageContainer">

    <!-- formulaire -->
    <div class="colonneLogin">
        <form action="index.php?action=submitlogin" method="POST">
            <br>
            <input type="text" class="inputEmprunteur" placeholder="Prénom d'utilisateur" name="firstname" required>
            <br>
            <input type="text" class="inputEmprunteur" placeholder="Nom d'utilisateur" name="lastname" required>
            <br>
            <input type="password" class="inputEmprunteur" placeholder="Mot de passe" name="password" required>
            <br>
            <input type="submit" class="btnAjouter" id='submit' value='LOGIN'>
            <br>
            <?php
            if (isset($_SESSION['login_error'])) {
                $err = $_SESSION['login_error'];
                if ($err == 1 || $err == 2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
            ?>
        </form>
    </div>
    <!-- FIN -->

</div>

<?php $content = ob_get_clean(); ?>

<?php require("base.php");