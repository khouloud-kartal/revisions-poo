<?php

function getConnection(){

    try {
        
        $host = "localhost";
        $dbname = "revisions-poo";
        $user = "root";
        $password = "";

        $conn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $pdo = new PDO($conn, $user, $password, $options);
        return $pdo;


    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        return null;
    }

}



?>