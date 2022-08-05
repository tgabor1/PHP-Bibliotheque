<?php $title = "Catalogue"; ?>

<?php ob_start(); ?>

<h1>Catalogue des ouvrages</h1>
<div class="pageContainer">
    <div class="filters">
        <div class="search">
            <h3>Nouvel ouvrage :</h3>
            <a href="../index.php?action=fichevierge"><button class="btnAjouter">Ajouter un nouvel ouvrage</button></a>
            <!-- <button class="btnSupprimer">Supprimer</button> -->
            <br><br>
            <h3>Recherche par :</h3>
            <label for="titre">Titre</label><br>
            <input type="text" name="titre" class="inputEmprunteur">
            <br><br>
            <label for="auteur">Auteur</label><br>
            <input type="text" name="auteur" class="inputEmprunteur">
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
            <div class="colonneTitreB">
                <strong>Titre</strong>
            </div>
            <div class="colonneStatusB">
                <strong>Status</strong>
            </div>
            <div class="colonneEmprunteurB">
                <strong>Emprunteur</strong>
            </div>
            <div class="colonneEmprunteurB">
                <strong>Action</strong>
            </div>
        </div>

        <?php if (isset($_SESSION['errorDelete'])) : ?>
        <div class="selectStatusE"><?= $_SESSION['errorDelete'] ?></div>
        <?php endif ?>

        <?php foreach ($books as $key => $book) : ?>
        <div class="ligneCatalogueB">
            <div class="colonneTitre">
                <a href="./index.php?action=fiche&id=<?= $book['id'] ?>">
                    <p class="booktitle"><?= $book['Title'] ?></p>
                </a>
            </div>
            <div class="colonneStatus">
                <?php if ($book['available'] == 0) : ?>
                <a href="./index.php?action=fiche&id=<?= $book['id'] ?>">
                    <div class="btnAjouter">Disponible</div>
                </a>
                <?php else : ?>
                <a href="./index.php?action=fiche&id=<?= $book['id'] ?>">
                    <div class="btnSupprimer">Prêté</div>
                </a>
                <?php endif ?>
                <!-- <select name="" class="selectStatusD" id="s1">
                            <option value="Dispo" class="optDispo" selected="selected">Disponible</option>
                            <option value="Prêté" class="optPret">Prêté</option>
                        </select> -->
            </div>

            <?php if ($book['available'] == 0) : ?>
            <div class="colonneEmprunteur">
                <input type="text" value="" class="inputEmprunteur" id="e1" disabled>
            </div>
            <?php else : ?>
            <div class="colonneEmprunteur">
                <input type="text"
                    value="<?= $Loan->findCurrentCustomer($book['id'])['first_name'] ?> <?= $Loan->findCurrentCustomer($book['id'])['last_name'] ?> "
                    class="inputEmprunteur" id="e1" disabled>
            </div>
            <?php endif ?>

            <div class="colonneEmprunteur">
                <a href="index.php?action=deleteBook&id=<?= $book['id'] ?>&status=<?= $book['available'] ?>">
                    <button class="btnSupprimer">Supprimer</button>
                </a>

            </div>

            <!-- <div class="colonneFiche">
                        <a href="./index.php?action=fiche&id=<?= $book['id'] ?>"><button class="btnFiche">Fiche</button></a>
                    </div> -->
        </div>
        <?php endforeach ?>
        <div class="pagination">
            <!-- <nav> -->
            <ul>
                <li class=" page-item <?= ($page == 1) ? "disabled" : "" ?>">
                    <a href="../index.php?page=<?= $page - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for ($i = 1; $i <= $nbrPages; $i++) : ?>
                <li class="page-item <?= ($page == $i) ? "active" : "" ?>">
                    <a href="../index.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
                </li>
                <?php endfor ?>
                <li class="page-item <?= ($page == $nbrPages) ? "disabled" : "" ?>">
                    <a href="../index.php?page=<?= $page + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
            <!-- </nav> -->
        </div>

    </div>

    <?php $content = ob_get_clean(); ?>

    <?php require("base.php");