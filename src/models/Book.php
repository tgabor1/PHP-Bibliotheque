<?php


class Book
{
    private INT $idBook;
    private string $title;
    private INT $quantity;
    private bool $available;
    private string $description;
    private string $publishedDate;


    // getters
    public function GetIdBook()
    {
        return $this->idBooks;
    }
    public function GetTitle()
    {
        return $this->title;
    }
    public function GetQuantity()
    {
        return $this->quantity;
    }
    public function GetAvailable()
    {
        return $this->available;
    }
    public function GetDescription()
    {
        return $this->description;
    }
    public function GetPublishedDate()
    {
        return $this->publishedDate;
    }
    public function GetPublisher()
    {
        return $this->publisher;
    }

    //setters
    public function SetIdBook($id)
    {
        return $this->idBooks = $id;
    }
    public function SetTitle($title)
    {
        return $this->title = $title;
    }
    public function SetQuantity($title)
    {
        return $this->title = $title;
    }
    public function SetAvailable($available)
    {
        return $this->available = $available;
    }
    public function SetDescription($available)
    {
        return $this->available = $available;
    }
    public function SetPublisher($publisher)
    {
        return $this->publisher = $publisher;
    }


    public function findBooks($premier, $parPage){
        require('../src/pdo/PDO.php');
        $booksDB = $db -> prepare("SELECT b.id as id,b.Title as Title,b.published_date as p_date,b.available as available,b.description as description,c.name as category,a.author as author,p.name as publisher FROM books b LEFT JOIN category c ON b.id_category = c.id_category LEFT JOIN author a ON b.id_author = a.id_author LEFT JOIN publisher p ON b.id_publisher = p.id_publisher ORDER BY b.id DESC LIMIT " . $premier . ", " . $parPage);
        $booksDB -> execute();
        $books = $booksDB -> fetchAll(); 
        return $books;
    }
    
    public function findBookById($id){
        require('../src/pdo/PDO.php');
        $bookDB = $db -> prepare("SELECT b.id as id,b.Title as Title,b.published_date as p_date,b.available as available,b.description as description,c.name as category,a.author as author,p.name as publisher FROM books b LEFT JOIN category c ON b.id_category = c.id_category LEFT JOIN author a ON b.id_author = a.id_author LEFT JOIN publisher p ON b.id_publisher = p.id_publisher WHERE id = :id");
        $bookDB -> execute(['id' => $id]);
        $book = $bookDB -> fetch(); 
        return $book;
    }

    public function deleteBook($id){
        require('../src/pdo/PDO.php');
        $bookDB = $db -> prepare("DELETE FROM books WHERE id = :id");
        $bookDB -> execute(['id' => $id]);
    }

    public function booksCount(){
        require('../src/pdo/PDO.php');
        $booksDB = $db -> prepare("SELECT COUNT(*) FROM books b LEFT JOIN category c ON b.id_category = c.id_category LEFT JOIN author a ON b.id_author = a.id_author LEFT JOIN publisher p ON b.id_publisher = p.id_publisher ORDER BY b.id DESC");
        $booksDB -> execute();
        $booksNumber = $booksDB -> fetch(); 
        return $booksNumber[0];
    }
}




