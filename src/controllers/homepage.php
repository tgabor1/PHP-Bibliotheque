<?php

require_once("../src/models/Book.php");
require_once("../src/models/Loan.php");


class Homepage {
    
    public function index(){

        $Book = new Book();
        $Loan = new Loan();

        if (isset($_GET["page"]) && !empty($_GET["page"])) {
            $page = strip_tags($_GET["page"]);
        }else {
            $page = 1;
        }

        $nbrBooks = $Book->booksCount();
        // var_dump($nbrBooks);
        $parPage = 20;
        // $debut = ($page-1) * $nbrElements;
        $nbrPages = ceil($nbrBooks/$parPage);

        // var_dump($nbrPages);
        $premier = ($page * $parPage) -$parPage;
        
        $books = $Book->findBooks($premier ,$parPage);

        // for ($i=1 ; $i<=$nbrPages ; $i++){
        //     if($page!=$i)
        //     echo "<a href="?page = $i"> $i </a>&nbsp";
        //     else
        //     echo "<a>$i</a>$nbsp";
        //     }

        
        require("../templates/homepage.php");
        unset($_SESSION['errorDelete']);
    }

    public function deleteLoanedBook(){
        
        $Book = new Book();

        if ($_GET['status'] == 0) {
            $Book->deleteBook($_GET["id"]);
            header("location: ../index.php");
        }
        else {
            header("location: ../index.php");
            $_SESSION["errorDelete"] = "Le livre est actuellement emprunté";
        }
    }

}
