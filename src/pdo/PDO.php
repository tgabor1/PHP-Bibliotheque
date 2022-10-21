<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=PHP-Bibliotheque;charset=utf8', 'root', '');
}

catch (\Exception $e) {
    die('Erreur : ' . $e -> getMessage());
}