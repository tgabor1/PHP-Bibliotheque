<!-- MODIF FAITE -->
<!-- CREATION CONTROLLER -->

<?php

require_once("../src/models/Category.php");
require_once("../src/models/Author.php");
require_once("../src/models/Publisher.php");

class CreationBook
{

    public function displayForm()
    {
        $Category = new Category();
        $categorys = $Category->findCategories();

        $Author = new Author();
        $authors = $Author->findAuthors();

        $Publisher = new Publisher();
        $publishers = $Publisher->findPublishers();

        // var_dump($categorys);
        // var_dump($authors);
        // var_dump($publishers);

        require("../templates/fiche_livre_vierge.php");
        unset($_SESSION['creation_error']);
    }

    public function creation()
    {
        require('../src/pdo/PDO.php');
        $Title = $_POST["InputTitre"];
        $Date = $_POST["InputDateDePublication"];
        $Available = 0;
        $Description = $_POST["InputDescription"];
        $Category = $_POST["InputCategory"];
        $Author = $_POST["InputAuteur"];
        $Publisher = $_POST["InputPublisher"];


        $Genre = $_POST["InputCategory"];
        // id_author + id_category + id_publisher a recuperer et remplacer
        $insert = $db->prepare('INSERT INTO books (Title,published_date,available,description,id_category,id_author,id_publisher) VALUES (:titre, :date, :available, :description, :category, :author, :publisher)');
        $insert->execute(array(
            // :titre, :date, :description, :category, :author, :publisher
            'titre' => $Title,
            'date' => $Date,
            'available' => $Available,
            'description' => $Description,
            'category' => $Category,
            'author' => $Author,
            'publisher' => $Publisher
        ));
        header('Location: ../index.php');
    }
}