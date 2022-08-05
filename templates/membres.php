<?php $title = "Membres"; ?>

<?php ob_start(); ?>

<!-- !!!!!!!!!! -->
<!-- MODIFICATION DES CLASSES SUR LA LISTE DES MEMBRES POUR -->
<!-- COLLER AU CLASSES EXISTANTE -->

<h1>Liste des membres</h1>
<div class="pageContainer">
    <div class="filters">
        <div class="search">
            <h3>Nouvel adhérent :</h3>
            <a href="./index.php?action=creation_membre"><button class="btnAjouter">Ajouter un nouvel adhérent</button></a>
            <!-- <button class="btnSupprimer">Supprimer</button> -->
            <br><br>
            <h3>Recherche par :</h3>
            <label for="numAdherent">Numéro d'adhérent</label><br>
            <input type="text" name="numAdherent" class="inputEmprunteur">
            <br><br>
            <label for="nomAdherent">Nom ou prénom</label><br>
            <input type="text" name="nomAdherent" class="inputEmprunteur">
            <br><br>
            <button class="btnFiche">Rechercher</button>
            <div class="themeSelector">
                <div id="theme1"> </div>
                <div id="theme2"> </div>
            </div>
        </div>
    </div>

    <!-- SECTION CATALOGUE /////////////////////////// -->
    <div class="catalogue">
        <div class="ligneCatalogue">
            <div class="colonneMembre">
                <strong>Nom</strong>
            </div>
            <div class="colonneMembre">
                <strong>Prénom</strong>
            </div>
            <div class="colonneMembre">
                <strong>Adresse</strong>
            </div>
            <div class="colonneMembre">
                <strong>Téléphone</strong>
            </div>
            <div class="colonneMembre">
                <strong>Numéro</strong>
            </div>
            <div class="colonneMembre">
                <strong>Emprunts</strong>
            </div>
            <!-- <div class="colonneFicheB">
                <strong>Infos</strong>
            </div> -->
        </div>

        <!-- EXEMPLE 1 -->
        <?php foreach ($customers as $key => $customer) : ?>
        <div class="ligneCatalogueB">
            <div class="colonneMembreB">
                <p class="booktitle"><?= $customer['last_name'] ?></p>
            </div>
            <div class="colonneMembreB">
                <p class="booktitle"><?= $customer['first_name'] ?></p>
            </div>
            <div class="colonneMembreB">
                <p class="booktitle"><?= $customer['address'] ?></p>
            </div>
            <div class="colonneMembreB">
                <p class="booktitle"><?= $customer['phone'] ?></p>
            </div>
            <div class="colonneMembreB">
                <p class="booktitle"><?= $customer['id_customer'] ?></p>
            </div>
            <div class="colonneMembreB">
                <select name="emprunts" class="selectEmpruntMembre" id="">
                <?php foreach ($Loan->findLoansByCustomerId($customer['id_customer']) as $key => $loan) : ?>
                    <option value="<?= $loan['id_loan'] ?>"><?= $loan['Title'] ?></option>
                <?php endforeach ?>
                </select>
            </div>
            <!-- <div class="colonneFiche">
                <a href="./index.php?fiche_membre.php"><button class="btnFicheMembre">Infos</button></a>
            </div> -->
        </div>
        <?php endforeach ?>
        <!-- FIN -->
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require("base.php");