<?php
class Loan
{

    private int $idLoan;
    private string $loanDate;
    private string $endDate;

    //getter
    public function getIdLoan()
    {
        return $this->idLoan;
    }

    public function getLoanDate()
    {
        return $this->loanDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    //setter
    public function setIdLoan($id)
    {
        return $this->idLoan = $id;
    }

    public function setLoanDate($date)
    {
        return $this->loanDate = $date;
    }

    public function setEndDate($eDate)
    {
        return $this->endDate = $eDate;
    }


    public function findLoansByBookId($bookId){
        require('../src/pdo/PDO.php');
        $loansDB = $db -> prepare("SELECT c.id_customer, c.first_name, c.last_name, c.email, c.address, c.phone  FROM loans l INNER JOIN books b ON l.id_book = b.id INNER JOIN customer c ON l.id_customer = c.id_customer  WHERE id = :id ORDER BY l.id_loan DESC");
        $loansDB -> execute(['id' => $bookId]);
        $loans = $loansDB -> fetchAll(); 
        return $loans;
    }

    public function findCurrentCustomer($bookId){
        require('../src/pdo/PDO.php');
        $loansDB = $db -> prepare("SELECT c.id_customer, c.first_name, c.last_name  FROM loans l INNER JOIN books b ON l.id_book = b.id INNER JOIN customer c ON l.id_customer = c.id_customer  WHERE id = :id AND b.available = 1 ORDER BY l.id_loan DESC");
        $loansDB -> execute(['id' => $bookId]);
        $customer = $loansDB -> fetch(); 
        return $customer;
    }

    public function findLoansByCustomerId($CustomerId){
        require('../src/pdo/PDO.php');
        $loansDB = $db -> prepare("SELECT l.id_loan, b.Title FROM loans l INNER JOIN books b ON l.id_book = b.id INNER JOIN customer c ON l.id_customer = c.id_customer  WHERE c.id_customer = :idCustomer ORDER BY l.id_loan DESC");
        $loansDB -> execute(['idCustomer' => $CustomerId]);
        $loans = $loansDB -> fetchAll(); 
        return $loans;
    }

    public function remainingLoanTime($bookId, $customerId){
        require('../src/pdo/PDO.php');
        $loansDB = $db -> prepare("SELECT l.loan_date as dateB, l.end_date as dateF FROM loans l INNER JOIN books b ON l.id_book = b.id INNER JOIN customer c ON l.id_customer = c.id_customer WHERE b.id = :id AND c.id_customer = :id_customer ORDER BY l.id_loan DESC;");
        $loansDB -> execute([
            'id' => $bookId,
            'id_customer' => $customerId
        ]);
        $loanDate = $loansDB -> fetch(); 

        $dateB = new DateTime($loanDate['dateB']);
        $dateF = new DateTime($loanDate['dateF']);

        $diff = $dateB->diff($dateF)->format("%r%a");
        return $diff;
    }
}
