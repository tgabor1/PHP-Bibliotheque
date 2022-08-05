<?php

require_once("../src/models/Book.php");
require_once("../src/models/Customer.php");
require_once("../src/models/Loan.php");

class Fiche{
    
    public function displayficheBook(){
        $bookId = $_GET['id'];


        $Book = new Book();
        $Customer = new Customer();
        $Loan = new Loan();

        $book = $Book->findBookById($bookId);
        $customers = $Customer->findCustomers();
        $loans = $Loan->findLoansByBookId($bookId);
        $currentCustomer = $Loan->findCurrentCustomer($bookId);

        if ($book['available'] == 1) {
            $remainingTime = $Loan->remainingLoanTime($bookId, $currentCustomer['id_customer']);
        }

        // $test = (!is_null($book['publisher'])) ? $book['publisher']  : "Donnée non renseigné" ;
        // var_dump($test);

        require("../templates/fiche_livre.php");
        unset($_SESSION['loan_error']);
    }

    public function submitLoan(){
        require('../src/pdo/PDO.php');

        
        
        
        $idCustomer = htmlspecialchars($_POST['client']);
        $dateDebut = date('Y-m-d');
        $dateFin = htmlspecialchars($_POST['finPret']);
        $idBook = strip_tags($_GET['id']);
        
        $Loan = new Loan();
        
        

        if (isset($idCustomer) && isset($dateFin)) {
            $customerLoanDB = $db->prepare('SELECT b.available as available, l.id_customer as idCustomer,   id_book as idBook FROM loans l INNER JOIN books b ON l.id_book = b.id WHERE l.id_customer = :id_customer AND l.id_book = :id_book ORDER BY l.id_loan DESC');
            $customerLoanDB->execute([
                "id_customer" => $idCustomer,
                "id_book" => $idBook
            ]);
            $customerLoan = $customerLoanDB->fetch();

            if (!isset($customerLoan) || $customerLoan['available'] == 0) {

            
                $insert = $db->prepare('INSERT INTO loans(loan_date, end_date, id_book, id_customer) VALUES(:loan_date, :end_date, :id_book, :id_customer)');
                $insert->execute([
                    'loan_date' => $dateDebut,
                    'end_date' => $dateFin,
                    "id_customer" => $idCustomer,
                    "id_book" => $idBook
                ]);
            
                $remainingTime = $Loan->remainingLoanTime($idBook, $idCustomer);

                if ($remainingTime <= 0) {
                    $bookDB = $db -> prepare("DELETE FROM loans WHERE loan_date = :loan_date AND end_date = :end_date AND id_customer = :id_customer AND id_book = :id_book");
                    $bookDB -> execute([
                        'loan_date' => $dateDebut,
                        'end_date' => $dateFin,
                        "id_customer" => $idCustomer,
                        "id_book" => $idBook
                    ]);
                    header('Location:  ../index.php?action=fiche&id=' . $idBook);
                    $_SESSION['loan_error'] = 3;
                }
                else {
                    $update = $db->prepare('UPDATE books SET available = 1 WHERE id = :id');
                    $update->execute([
                        'id' => $idBook
                    ]);
                    header('Location:  ../index.php?action=fiche&id=' . $idBook);
                }

            }
            else {
                header('Location:  ../index.php?action=fiche&id=' . $idBook);
                $_SESSION['loan_error'] = 2;
            }
        }
        else {
            header('Location:  ../index.php?action=fiche&id=' . $idBook);
            $_SESSION['loan_error'] = 1;
        }
    }

    public function returnLoan(){
        require('../src/pdo/PDO.php');

        $idBook = strip_tags($_GET['id']);

        $update = $db->prepare('UPDATE books SET available = 0 WHERE id = :id');
        $update->execute([
            'id' => $idBook
        ]);

        header('Location:  ../index.php?action=fiche&id=' . $idBook);
    }
}
