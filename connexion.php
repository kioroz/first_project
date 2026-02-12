<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>connexion</title>
</head>

<body>
    <nav>
        <a href="index.html">Acceuil</a>
        <a href="inscription.html">Inscription</a>
        <a href="connexion.html">Connexion</a>
        <a href="formcontact.html">Contact</a>

    </nav>
    

<?php
// login_final.php - Script de connexion
session_start();

// --- Configuration BDD ---
// VÉRIFIEZ : Est-ce la bonne base de données pour cette table 'users'?
$dsn = "mysql:host=localhost;dbname=site_noha;charset=utf8"; // J'utilise tp_users comme dans votre code précédent
$dbUser = "root";
$dbPass = "mysql";

// Options PDO recommandées
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// CONNEXION à la base de Données
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données. (" . $e->getMessage() . ")";
    exit;
}

// 1. Récupération des données du formulaire (Input)
// Note : J'assume que le formulaire envoie 'username' et 'password'.
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// 2. Validation
if ($username === '' || $password === '') {
    echo "Échec d'authentification : Veuillez remplir tous les champs.";
    exit;
}

// 3. Préparation de la requête de vérification
// On sélectionne l'ID et le mot de passe (colonne 'pass') pour l'utilisateur
// NOTE IMPORTANTE : J'assume que la table s'appelle 'users'
$sql = "SELECT id, pass FROM inscription WHERE username = ? LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username]);
$row = $stmt->fetch();

// 4. Vérification du mot de passe
// La colonne BDD s'appelle 'pass', on l'utilise ici -> $row['pass']
if ($row && password_verify($password, $row['pass'])) {
    
    // Connexion réussie : Initialisation de la session
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $username;
    
    echo "<p>✅ Connexion réussie ! Bienvenue,  . $username </p>. .";
    // Vous pouvez rediriger l'utilisateur ici : header('Location: accueil.php');
    
} else {
    // Échec de l'authentification (utilisateur non trouvé ou mot de passe incorrect)
    echo "<p>❌ Échec d'authentification : Nom d'utilisateur ou mot de passe incorrect.</p>";
}
?>

</body>

</html>