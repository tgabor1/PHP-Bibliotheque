<?php $title = "Catalogue"; ?>

<?php ob_start(); ?>

<h1>Details de l'ouvrage</h1>
<div class="pageContainer">
    <div class="filters">
        <div class="search">
            <h3>Opérations :</h3>
            <a href="./catalogue.html"><button class="btnAjouter">Valider</button></a>
            <a href="./catalogue.html"><button class="btnSupprimer">Supprimer</button></a>


            <h3>Ajouter un emprunt :</h3>

            <?php if ($book['available'] == 1) : ?>
            <div class="selectStatusE">
                <p>Emprunté par n° <?= $currentCustomer['id_customer'] ?></p>
                <h4>Temps restant :</h4>
                <p><?= $remainingTime ?> Jour(s)</p>
                <a href="../index.php?action=returnLoan&id=<?= $book['id'] ?>"><button class="btnAjouter">Rendre
                        l'ouvrage</button></a>
            </div>
            <?php else : ?>
            <form action="index.php?action=loan&id=<?= $book['id'] ?>" method="post">
                <div>
                    <label for="debutPret">Numéro d’identification :</label>
                    <select name="client" id="client" required class="inputEmprunteur">
                        <option value="" selected="true" disabled="disabled">Sélectionner un client</option>
                        <?php foreach ($customers as $key => $customer) : ?>
                        <option value="<?= $customer['id_customer'] ?>"><?= $customer['id_customer'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <label for="finPret">A rendre le :</label>
                    <input type="date" name="finPret" id="finPret" required class="inputEmprunteur">
                </div>

                <input type="submit" id='submitEmprunt' value='Ajouter' class="btnAjouter">

                <?php
                    if (isset($_SESSION['loan_error'])) {
                        $err = $_SESSION['loan_error'];
                        if ($err == 3 ){
                            echo "<div class='selectStatusE'>Client ou date incorrect</div>";
                        }elseif ($err == 2) {
                            echo "<div class='selectStatusE'>Durée Incohérente</div>";
                        }elseif ($err == 1) {
                            echo "<div class='selectStatusE'>Dejà emprunté</div>";
                        }
                    }
                ?>
            </form>
            <?php endif ?>


            <h3>Statut :</h3>
            <?php if ($book['available'] == 0) : ?>
            <h2>Disponible</h2>
            <?php else : ?>
            <h2>Emprunté</h2>
            <?php endif ?>
            <!-- <h3>Emprunteur :</h3>
                <label for="Numéro">Identifiant</label><br>
                <input type="text" name="Numéro">
                <br><br>
                <label for="Nom ou prénom">Nom ou prénom</label><br>
                <input type="text" name="Nom ou prénom">
                <br><br>
                <label for="Adresse">Adresse</label><br>
                <input type="text" name="Adresse">
                <br><br>
                <button class="btnFiche">Rechercher</button> -->
            <div class="themeSelector">
                <div id="theme1"> </div>
                <div id="theme2"> </div>
            </div>
        </div>
    </div>
    <!-- SECTION CATALOGUE /////////////////////////// -->
    <div class="DetailContainer">
        <div class="my2div">
            <label for="InputTitre" class="labelOuvrage">Titre</label>
            <input type="text" name="InputTitre"
                value="<?= (!is_null($book['Title'])) ? $book['Title']  : "Donnée non renseigné" ?>"
                class="InputOuvrage" disabled>
            <br>

            <label for="InputAuteur" class="labelOuvrage">Auteur</label>
            <input type="text" name="InputTitre"
                value="<?= (!is_null($book['author'])) ? $book['author']  : "Donnée non renseigné" ?>"
                class="InputOuvrage" disabled>
            <br>
        </div>
        <div class="my2div">
            <label for="InputDateDePublication" class="labelOuvrage">Publication</label>
            <input type="date" name="InputDateDePublication"
                value="<?= (!is_null($book['p_date'])) ? $book['p_date']  : "Donnée non renseigné" ?>"
                class="InputOuvrage" disabled>
            <br>

            <label for="InputRésumé" class="labelOuvrage">Genre</label>
            <input type="text" name="InputTitre"
                value="<?= (!is_null($book['category'])) ? $book['category']  : "Donnée non renseigné" ?>"
                class="InputOuvrage" disabled>
        </div>
        <div class="my2div">
            <label for="InputPublisher" class="labelOuvrage">Editeur</label>
            <input type="text" name="InputPublisher"
                value="<?= (!is_null($book['publisher'])) ? $book['publisher']  : "Donnée non renseigné" ?>"
                class="InputOuvrage" disabled>
        </div>
        <br>
        <label for="InputRésumé" class="labelOuvrage">Résumé</label>
        <textarea name="InputRésumé" cols="30" rows="10" class="TextAreaOuvrage"
            disabled><?= $book['description'] ?></textarea>
        <br>

        <table class="tableEmprunteur">
            <tr class="tableThead">
                <td>Identifiant</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Adresse</td>
                <td>Téléphone</td>
            </tr>

            <?php if (isset($loans)) : ?>
            <?php foreach ($loans as $key => $loan) : ?>
            <tr class="tableTr">
                <td class="tableTd"><?= $loan['id_customer'] ?></td>
                <td class="tableTd"><?= $loan['last_name'] ?></td>
                <td class="tableTd"><?= $loan['first_name'] ?></td>
                <td class="tableTd"><?= $loan['address'] ?></td>
                <td class="tableTd"><?= $loan['phone'] ?></td>
            </tr>
            <?php endforeach ?>
            <?php else : ?>
            <tr class="tableTr">
                <td colspan="5" class="tableTd">Cet ouvrage n'a jamais été emprunté.</td>
            </tr>
            <?php endif ?>
        </table>
    </div>

</div>

<?php $content = ob_get_clean(); ?>



<?php require("base.php");