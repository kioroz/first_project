<?php


$dsn = "mysql:host=localhost;dbname=site_noha;charset=utf8"; // J'utilise tp_users comme dans votre code précédent
$dbUser = "root";
$dbPass = "mysql";

// Options PDO recommandées
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];


 try {
        $pdo = new PDO($dsn, $dbUser, $dbPass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (PDOException $e) {
        die("Connexion échouée : " . $e->getMessage());
    }
?>