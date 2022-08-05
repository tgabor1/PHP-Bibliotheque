<?php $title = "Creation d'un membre"; ?>

<?php ob_start(); ?>

<h1>Création adhérant</h1>
<div class="pageContainer">

    <!-- formulaire -->
    <div class="colonneLogin">
        <form action="index.php?action=submitCreation_membre" method="post">
            <br>
            <input type="text" name="prenom" class="inputEmprunteur" placeholder="Prénom" required="required"
                autocomplete="off">
            <br>
            <input type="text" name="nom" class="inputEmprunteur" placeholder="Nom" required="required"
                autocomplete="off">
            <br>
            <input type="text" name="adresse" class="inputEmprunteur" placeholder="Adresse" required="required"
                autocomplete="off">
            <br>
            <input type="text" name="telephone" class="inputEmprunteur" placeholder="Téléphone" required="required"
                autocomplete="off">
            <br>
            <input type="email" name="email" class="inputEmprunteur" placeholder="Email" required="required"
                autocomplete="off">
            <br>
            <button type="submit" class="btnAjouter">Inscription</button>
            <br>
            <?php
            if (isset($_SESSION['creation_error'])) {
                $err = $_SESSION['creation_error'];
                if ($err == 1) {
                    echo "<p style='color:red'>L'utilisateur existe déja.</p>";
                }
                if ($err == 2) {
                    echo "<p style='color:red'>Email Invalide</p>";
                }
                if ($err == 3) {
                    echo "<p style='color:red'>Le numéro de telephone entré n'est pas conforme</p>";
                }
            }
            ?>
        </form>
    </div>
    <!-- FIN -->

</div>
<?php $content = ob_get_clean(); ?>
<?php require('base.php'); ?>