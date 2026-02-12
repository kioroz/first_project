<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>inscription</title>
</head>
<body>
<nav>
        <a href="index.html">Acceuil</a>
        <a href="inscription.html">Inscription</a>
        <a href="connexion.html">Connexion</a>
        <a href="formcontact.html">Contact</a>
    
    </nav>
<?php
$dsn = "mysql:host=localhost;dbname=site_noha;charset=utf8";
$dbUser = "root";
$dbPass = "mysql";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Récupération des données
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = trim($_POST['email']);

    // 2. Vérifications simples
    if (empty($username) || empty($password) || empty($email)) {
        die("Tous les champs sont obligatoires.");
    }

    if ($password !== $password2) {
        die("Les mots de passe ne correspondent pas.");
    }

    // 3. Hash du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 4. Connexion DB
    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (PDOException $e) {
        die("Connexion échouée : " . $e->getMessage());
    }

    // 5. Insertion
    $sql = "INSERT INTO inscription (username, pass, email) VALUES (:username, :pass, :email)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([
        ':username' => $username,
        ':pass' => $hashedPassword,
        ':email' => $email,
    ])) {
        echo "<p>Inscription réussie !</p>";
    } else {
        echo "<p>Erreur lors de l'inscription.</p>";
    }
}

?>
    
</body>
</html>