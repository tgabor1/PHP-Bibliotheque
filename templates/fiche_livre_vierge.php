<?php $title = "Catalogue"; ?>

<?php ob_start(); ?>
<h1>Nouvel ouvrage</h1>
<div class="pageContainer">
    <div class="filters">
        <div class="search">

            <h3>Opérations :</h3>
            <form action="./index.php?action=creationlivre" method="POST">
                <input type="submit" name=createBook class="btnAjouter" value="Valider le nouveau livre">
                <!-- <a href="./index.php?action=creationlivre"><button class="btnAjouter">Valider</button></a> -->
                <!-- <a href="./catalogue.html"><button class="btnSupprimer">Supprimer</button></a> -->

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
            <input type="text" name="InputTitre" value="inconnu" class="InputOuvrage">
            <br>

            <label for="InputAuteur" class="labelOuvrage">Auteur</label>
            <!-- <input type="text" name="InputAuteur" value="inconnu" class="InputOuvrage"> -->
            <select name="InputAuteur" class="InputOuvrage">

                <!-- VOIR CONTROLER AUTEUR !!!!!!!!!!!!!!!!!!!!!! -->
                <?php foreach ($authors as $key => $author) : ?>
                <option value="<?= $author['id_author'] ?>"><?= $author['author'] ?></option>
                <?php endforeach ?>
            </select>
            <br>
        </div>
        <div class="my2div">
            <label for="InputDateDePublication" class="labelOuvrage">Publication</label>
            <input type="date" name="InputDateDePublication" value="inconnu" class="InputOuvrage">
            <br>

            <label for="InputCategory" class="labelOuvrage">Genre</label>
            <select name="InputCategory" class="InputOuvrage">

                <!-- VOIR CONTROLER CATEGORY !!!!!!!!!!!!!!!!!!!!!! -->
                <?php foreach ($categorys as $key => $category) : ?>
                <option value="<?= $category['id_category'] ?>"><?= $category['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="my2div">
            <label for="InputPublisher" class="labelOuvrage">Editeur</label>
            <select name="InputPublisher" class="InputOuvrage">
                <?php foreach ($publishers as $key => $publisher) : ?>
                <option value="<?= $publisher['id_publisher'] ?>"><?= $publisher['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <br>
        <label for="InputDescription" class="labelOuvrage">Résumé</label>
        <textarea name="InputDescription" cols="30" rows="10" class="TextAreaOuvrage">inconnu</textarea>
        <br>

    </div>
    </form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require("base.php");