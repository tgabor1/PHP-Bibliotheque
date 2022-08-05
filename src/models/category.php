<?php
class Category{

    private INT $idCategory;
    private string $name;


    //getters
    public function getIdCatgeory(){
        return $this -> idCategory ;
    }

    public function getName(){
        return $this -> name ;
    }


    //setters
    public function setIdCategory($idCategory){
        return $this -> idCategory = $idCategory;
    }

    public function setName($name){
        return $this -> name = $name;
    }

    public function findCategories()
    {
        require('../src/pdo/PDO.php');
        $categoriesDB = $db->prepare("SELECT c.name, c.id_category FROM  category c ");
        $categoriesDB->execute();
        $categories = $categoriesDB->fetchAll();
        return $categories;
    }
}